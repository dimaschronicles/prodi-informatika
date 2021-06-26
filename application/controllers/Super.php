<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Admin_model', 'admin');
        $this->load->model('Super_model', 'super');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['userCount'] = $this->admin->getCountDosen();
        $data['jmlPengumuman'] = $this->admin->getCountPengumuman();
        $data['jmlArsip'] = $this->admin->getCountArsip();
        $data['jmlAdmin'] = $this->super->getCountAdmin();

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

    public function addAdmin()
    {
        $data['title'] = 'Tambah Data Admin';
        $data['user'] = $this->admin->getDosenByNidn();

        // validasi
        $this->form_validation->set_rules('nidn', 'NIDN', 'required|trim|numeric|is_unique[user.nidn]', [
            'is_unique' => 'This NIDN is already registered!'
        ]);
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email is already registered!'
        ]);
        $this->form_validation->set_rules('telephone', 'Nomor HP', 'required|trim|numeric');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-super', $data);
            $this->load->view('templates/topbar-super', $data);
            $this->load->view('super/add-admin', $data);
            $this->load->view('templates/footer');
        } else {
            $this->super->createAdmin();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data admin berhasil dibuat!</div>');
            redirect('super/adminpage');
        }
    }

    public function deleteAdmin($id)
    {
        $this->super->deleteAdmin($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data admin berhasil dihapus!</div>');
        redirect('super/adminpage');
    }

    public function detailAdmin($id)
    {
        $data['title'] = 'Detail Admin';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['admin'] = $this->super->detailAdmin($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-super', $data);
        $this->load->view('templates/topbar-super', $data);
        $this->load->view('super/detail-admin', $data);
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
        $this->load->view('super/dosen', $data);
        $this->load->view('templates/footer');
    }

    public function addDosen()
    {
        $data['title'] = 'Tambah Data Dosen';
        $data['user'] = $this->admin->getDosenByNidn();

        // validasi
        $this->form_validation->set_rules('nidn', 'NIDN', 'required|trim|numeric|is_unique[user.nidn]', [
            'is_unique' => 'This NIDN is already registered!'
        ]);
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('pob', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('dob', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email is already registered!'
        ]);
        $this->form_validation->set_rules('telephone', 'Nomor HP', 'required|trim|numeric');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-super', $data);
            $this->load->view('templates/topbar-super', $data);
            $this->load->view('super/add-dosen', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->createDosen();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data dosen berhasil dibuat!</div>');
            redirect('super/dosen');
        }
    }

    public function deleteDosen($id)
    {
        $this->admin->deleteDosen($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data dosen berhasil dihapus!</div>');
        redirect('super/dosen');
    }

    public function detailDosen($id)
    {
        $data['title'] = 'Detail Dosen';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['dosen'] = $this->admin->detailDosen($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-super', $data);
        $this->load->view('templates/topbar-super', $data);
        $this->load->view('super/detail-dosen', $data);
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

    public function addPengumuman()
    {
        $data['title'] = 'Tambah Pengumuman';
        $data['user'] = $this->admin->getDosenByNidn();

        // rules
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('description', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-super', $data);
            $this->load->view('templates/topbar-super', $data);
            $this->load->view('super/add-pengumuman', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->createPengumuman();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data has been created!</div>');
            redirect('super/pengumuman');
        }
    }

    public function editPengumuman($id = null)
    {
        $data['title'] = 'Edit Pengumuman';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['announcement'] = $this->admin->detailPengumuman($id);

        // rules
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        // $this->form_validation->set_rules('file_lampiran[]', 'Document');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-super', $data);
            $this->load->view('templates/topbar-super', $data);
            $this->load->view('super/edit-pengumuman', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->updatePengumuman();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data has been updated!</div>');
            redirect('super/pengumuman');
        }
    }

    public function deletePengumuman($id)
    {
        $this->admin->deletePengumuman($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data has been deleted!</div>');
        redirect('super/pengumuman');
    }

    public function detailPengumuman($id)
    {
        $data['title'] = 'Detail Pengumuman';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['announcement'] = $this->admin->detailPengumuman($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-super', $data);
        $this->load->view('templates/topbar-super', $data);
        $this->load->view('super/detail-pengumuman', $data);
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

    // add arsip
    public function addArsip()
    {
        $data['title'] = 'Tambah Arsip';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['dosen'] = $this->admin->getAllDosen();

        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('description', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('id_dosen[]', 'Dosen', 'required');
        for ($i = 2; $i <= 10; $i++) {
            if (!empty($_FILES['userfile' . $i]['name'])) {
                $this->form_validation->set_rules('userfile' . $i, 'File');
            } else if (empty($_FILES['userfile1']['name'])) {
                $this->form_validation->set_rules('userfile1', 'File', 'required');
            }
        }


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-super', $data);
            $this->load->view('templates/topbar-super', $data);
            $this->load->view('super/add-arsip', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->createArsip();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data arsip has been created!</div>');
            redirect('super/arsip');
        }
    }

    // delete arsip
    public function deleteArsip($id)
    {
        $this->admin->deleteArsip($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data has been deleted!</div>');
        redirect('super/arsip');
    }

    // edit arsip
    public function editArsip($id = null)
    {
        $data['title'] = 'Edit Pengarsipan';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['dosen'] = $this->admin->getAllDosen();
        $data['arsip'] = $this->admin->getArsipFile($id);

        $this->form_validation->set_rules('title', 'Judul', 'trim');
        $this->form_validation->set_rules('description', 'Keterangan', 'trim');
        $this->form_validation->set_rules('id_dosen[]', 'Dosen', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-super', $data);
            $this->load->view('templates/topbar-super', $data);
            $this->load->view('super/edit-arsip', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->updateArsip();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data has been updated!</div>');
            redirect('super/arsip');
        }
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        // rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            // template view / tampilan
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-super', $data);
            $this->load->view('templates/topbar-super', $data);
            $this->load->view('super/edit-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->editProfileAdmin();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your profile has been updated!</div>');
            redirect('super');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            // template view / tampilan
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-super', $data);
            $this->load->view('templates/topbar-super', $data);
            $this->load->view('super/change-password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong current password!</div>');
                redirect('super/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        New password cannot be the same as current password!</div>');
                    redirect('super/changepassword');
                } else {
                    // password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nidn', $this->session->userdata('nidn'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Password changed!</div>');
                    redirect('super/changepassword');
                }
            }
        }
    }
}
