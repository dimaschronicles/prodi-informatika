<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct() // method default
    {
        parent::__construct();
        // import library
        $this->load->library('form_validation');
    }

    public function index()
    {
        // jika sudah ada session atau belum
        if ($this->session->userdata('nidn')) {
            redirect('user');
        }

        $this->form_validation->set_rules('nidn', 'NIDN', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            // templating
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $nidn = $this->input->post('nidn');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nidn' => $nidn])->row_array();
        // var_dump($user);
        // die;

        // jika usernya ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data  = [
                    'nidn' => $user['nidn'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 1) {
                    redirect('super');
                } else if ($user['role'] == 3) {
                    redirect('user');
                } else {
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Cek username atau password anda!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Cek username atau password anda!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nidn');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda berhasil keluar!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
