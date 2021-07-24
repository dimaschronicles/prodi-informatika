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
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        // rules
        $this->form_validation->set_rules('name', 'Nama', 'required|trim', ['required' => 'Nama harus diisi!']);
        $this->form_validation->set_rules('pob', 'Tempat Lahir', 'required|trim', ['required' => 'Tempat Lahir harus diisi!',]);
        $this->form_validation->set_rules('dob', 'Tanggal Lahir', 'required|trim', ['required' => 'Tanggal Lahir harus diisi!',]);
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi!',]);
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim', ['required' => 'Jenis Kelamin harus diisi!',]);
        $this->form_validation->set_rules('religion', 'Agama', 'required|trim', ['required' => 'Agama harus diisi!',]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Email tidak valid!'
        ]);
        $this->form_validation->set_rules('telephone', 'Nomor HP', 'required|trim|numeric|min_length[11]|max_length[13]', [
            'required' => 'Nomor HP harus diisi!',
            'numeric' => 'Nomor HP harus angka!',
            'min_length' => 'NIDN minimal 11 digit!',
            'max_length' => 'NIDN maksimal 13 digit!'
        ]);

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
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required|trim', ['required' => 'Password Saat Ini harus diisi!',]);
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[8]|matches[new_password2]', [
            'required' => 'Password Baru harus diisi!',
            'min_length' => 'Password Baru minimal 8 karakter!',
            'matches' => 'Password Baru tidak sama dengan Konfirmasi Password!'
        ]);
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[8]|matches[new_password1]', [
            'required' => 'Konfirmasi Password Baru harus diisi!',
            'min_length' => 'Password Baru minimal 8 karakter!',
            'matches' => 'Konfirmasi Password Baru tidak sama dengan Password Baru!',
        ]);

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
                    Password baru harus tidak sama dengan password saat ini!</div>');
                    redirect('user/changepassword');
                } else {
                    // password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nidn', $this->session->userdata('nidn'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diganti!</div>');
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
        $data['title'] = 'Berita';
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
        $data['title'] = 'Detail Berita';
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
        force_download($fileName, $data, null);
    }
}
