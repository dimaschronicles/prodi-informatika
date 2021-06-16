<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['userCount'] = $this->admin->getCountDosen();
        $data['jmlPengumuman'] = $this->admin->getCountPengumuman();
        $data['jmlArsip'] = $this->admin->getCountArsip();

        // template view / tampilan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-super', $data);
        $this->load->view('templates/topbar-super', $data);
        $this->load->view('super/index', $data);
        $this->load->view('templates/footer');
    }

    // data admin
    public function adminPage()
    {
        $data['title'] = 'Data Admin';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['admin'] = $this->admin->getDataAdmin();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-super', $data);
        $this->load->view('templates/topbar-super', $data);
        $this->load->view('super/admin-page', $data);
        $this->load->view('templates/footer');
    }

    // data dosen
    public function dosen()
    {
        $data['title'] = 'Data Dosen';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['dosen'] = $this->admin->getAllDosen();

        if ($this->input->post('keyword')) {
            $data['dosen'] = $this->admin->searchDosen();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-super', $data);
        $this->load->view('templates/topbar-super', $data);
        $this->load->view('admin/dosen', $data);
        $this->load->view('templates/footer');
    }

    public function pengumuman()
    {
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['announcement'] = $this->admin->getAllPengumuman();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-super', $data);
        $this->load->view('templates/topbar-super', $data);
        $this->load->view('super/pengumuman', $data);
        $this->load->view('templates/footer');
    }

    public function arsip()
    {
        $data['title'] = 'Pengarsipan';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['arsip'] = $this->admin->getAllArsip();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-super', $data);
        $this->load->view('templates/topbar-super', $data);
        $this->load->view('super/arsip', $data);
        $this->load->view('templates/footer');
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        // rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            // template view / tampilan
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/edit-profile-admin', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->editProfileAdmin();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your profile has been updated!</div>');
            redirect('admin');
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
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/change-password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong current password!</div>');
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        New password cannot be the same as current password!</div>');
                    redirect('admin/changepassword');
                } else {
                    // password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nidn', $this->session->userdata('nidn'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Password changed!</div>');
                    redirect('admin/changepassword');
                }
            }
        }
    }
}
