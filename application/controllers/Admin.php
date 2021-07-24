<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['jmlAdmin'] = $this->admin->getCountAdmin();

        // template view / tampilan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    // data admin
    public function adminPage()
    {
        $data['title'] = 'Data Admin';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['admin'] = $this->admin->getDataAdmin();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('admin/admin-page', $data);
        $this->load->view('templates/footer');
    }

    public function detailAdmin($id)
    {
        $data['title'] = 'Detail Admin';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['admin'] = $this->admin->detailAdmin($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('admin/detail-admin', $data);
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
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('admin/dosen', $data);
        $this->load->view('templates/footer');
    }

    public function pengumuman()
    {
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['announcement'] = $this->admin->getAllPengumuman();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('admin/pengumuman', $data);
        $this->load->view('templates/footer');
    }

    public function addPengumuman()
    {
        $data['title'] = 'Tambah Pengumuman';
        $data['user'] = $this->admin->getDosenByNidn();

        // rules
        $this->form_validation->set_rules('title', 'Judul', 'required|trim', ['required' => 'Judul harus diisi!']);
        $this->form_validation->set_rules('description', 'Keterangan', 'required|trim', ['required' => 'Keterangan harus diisi!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/add-pengumuman', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->createPengumuman();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data pengumuman berhasil dibuat!</div>');
            redirect('admin/pengumuman');
        }
    }

    public function deletePengumuman($id)
    {
        $this->admin->deletePengumuman($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data pengumuman berhasil dihapus!</div>');
        redirect('admin/pengumuman');
    }

    public function editPengumuman($id = null)
    {
        $data['title'] = 'Edit Pengumuman';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['announcement'] = $this->admin->detailPengumuman($id);

        // rules
        $this->form_validation->set_rules('title', 'Judul', 'required|trim', ['required' => 'Judul harus diisi!']);
        $this->form_validation->set_rules('description', 'Keterangan', 'required|trim', ['required' => 'Keterangan harus diisi!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/edit-pengumuman', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->updatePengumuman();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data pengumuman berhasil diubah!</div>');
            redirect('admin/pengumuman');
        }
    }

    public function detailPengumuman($id)
    {
        $data['title'] = 'Detail Pengumuman';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['announcement'] = $this->admin->detailPengumuman($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('admin/detail-pengumuman', $data);
        $this->load->view('templates/footer');
    }

    function download($fileName = null)
    {
        $data = file_get_contents(FCPATH . 'assets/upload/file/' . $fileName);
        force_download($fileName, $data);
    }

    public function arsip()
    {
        $data['title'] = 'Berita';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['arsip'] = $this->admin->getAllArsip();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('admin/arsip', $data);
        $this->load->view('templates/footer');
    }

    // add arsip
    public function addArsip()
    {
        $data['title'] = 'Tambah Berita';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['dosen'] = $this->admin->getAllDosen();

        $this->form_validation->set_rules('title', 'Judul', 'required|trim', ['required' => 'Judul harus diisi!']);
        $this->form_validation->set_rules('description', 'Keterangan', 'required|trim', ['required' => 'Keterangan harus diisi!']);
        $this->form_validation->set_rules('id_dosen[]', 'Dosen', 'required', ['required' => 'Dosen harus dipilih!']);
        for ($i = 2; $i <= 10; $i++) {
            if (!empty($_FILES['userfile' . $i]['name'])) {
                $this->form_validation->set_rules('userfile' . $i, 'File');
            } else if (empty($_FILES['userfile1']['name'])) {
                $this->form_validation->set_rules('userfile1', 'File', 'required', ['required' => 'Lampiran harus diisi!']);
            }
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/add-arsip', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->createArsip();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berita berhasil dibuat!</div>');
            redirect('admin/arsip');
        }
    }

    // delete arsip
    public function deleteArsip($id)
    {
        $this->admin->deleteArsip($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berita berhasil dihapus!</div>');
        redirect('admin/arsip');
    }

    // edit arsip
    public function editArsip($id = null)
    {
        $data['title'] = 'Edit Berita';
        $data['user'] = $this->admin->getDosenByNidn();
        $data['dosen'] = $this->admin->getAllDosen();
        $data['arsip'] = $this->admin->getArsipFile($id);

        $this->form_validation->set_rules('title', 'Judul', 'required|trim', ['required' => 'Judul harus diisi!']);
        $this->form_validation->set_rules('description', 'Keterangan', 'required|trim', ['required' => 'Keterangan harus diisi!']);
        $this->form_validation->set_rules('id_dosen[]', 'Dosen', 'required', ['required' => 'Dosen harus dipilih!']);
        for ($i = 2; $i <= 10; $i++) {
            if (!empty($_FILES['userfile' . $i]['name'])) {
                $this->form_validation->set_rules('userfile' . $i, 'File');
            } else if (empty($_FILES['userfile1']['name'])) {
                $this->form_validation->set_rules('userfile1', 'File');
            }
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/edit-arsip', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->updateArsip();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berita berhasil diubah!</div>');
            redirect('admin/arsip');
        }
    }

    public function editProfileAdmin()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        // rules
        $this->form_validation->set_rules('name', 'Nama', 'required|trim', ['required' => 'Nama harus diisi!']);
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi!',]);
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
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/edit-profile-admin', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->editProfileAdmin();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Profil anda berhasil disimpan!</div>');
            redirect('admin');
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
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/change-password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password saat ini salah!</div>');
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password baru harus tidak sama dengan password saat ini!</div>');
                    redirect('admin/changepassword');
                } else {
                    // password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nidn', $this->session->userdata('nidn'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Password berhasil diganti!</div>');
                    redirect('admin/changepassword');
                }
            }
        }
    }
}
