<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // jika tidak login
        is_logged_in();

        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->user->getDosenByNidn();

        // template view / tampilan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-user', $data);
        $this->load->view('templates/topbar-user', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        // rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|trim|numeric');

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('pob', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('dob', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email is already registered!'
        ]);
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|trim|numeric');


        if ($this->form_validation->run() == false) {
            // template view / tampilan
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-user', $data);
            $this->load->view('templates/topbar-user', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->user->editProfile();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            // template view / tampilan
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-user', $data);
            $this->load->view('templates/topbar-user', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nidn', $this->session->userdata('nidn'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function pengumuman()
    {
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->user->getDosenByNidn();
        $data['announcement'] = $this->user->getAllPengumuman();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-user', $data);
        $this->load->view('templates/topbar-user', $data);
        $this->load->view('user/pengumuman', $data);
        $this->load->view('templates/footer');
    }

    public function detailPengumuman($id)
    {
        $data['title'] = 'Detail Pengumuman';
        $data['user'] = $this->user->getDosenByNidn();
        $data['announcement'] = $this->user->getDetailPengumuman($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-user', $data);
        $this->load->view('templates/topbar-user', $data);
        $this->load->view('user/detail-pengumuman', $data);
        $this->load->view('templates/footer');
    }

    function download($fileName = null)
    {
        $data = file_get_contents(FCPATH . 'assets/pengumuman/file/' . $fileName);
        force_download($fileName, $data);
    }

    public function arsip()
    {
        $data['title'] = 'Pengarsipan';
        $data['user'] = $this->user->getDosenByNidn();
        $data['arsip'] = $this->user->getArsip();

        // var_dump($data['arsip']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-user', $data);
        $this->load->view('templates/topbar-user', $data);
        $this->load->view('user/arsip', $data);
        $this->load->view('templates/footer');
    }

    public function detailArsip($id)
    {
        $data['title'] = 'Detail Pengarsipan';
        $data['user'] = $this->user->getDosenByNidn();
        $data['arsip'] = $this->user->getDetailArsip($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-user', $data);
        $this->load->view('templates/topbar-user', $data);
        $this->load->view('user/detail-arsip', $data);
        $this->load->view('templates/footer');
    }

    public function downloadArsip($fileName = null)
    {
        $data = file_get_contents(FCPATH . 'assets/arsip/file/' . $fileName);
        force_download($fileName, $data);
    }
}
