<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getDosenByNidn()
    {
        return $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();
    }

    public function getDataAdmin()
    {
        return $this->db->get_where('user', ['role' => '2'])->result_array();
    }

    public function getCountDosen()
    {
        return $this->db->count_all('user');
    }

    public function getAllDosen()
    {
        $query = 'SELECT * FROM `user` WHERE `role`=3 ORDER BY `user`.`nidn` ASC';
        return $this->db->query($query)->result_array();
    }

    public function createDosen()
    {
        $data = [
            'nidn' => $this->input->post('nidn', true),
            'name' => $this->input->post('name'),
            'pob' => $this->input->post('pob'),
            'dob' => $this->input->post('dob'),
            'address' => $this->input->post('address'),
            'gender' => $this->input->post('gender'),
            'religion' => $this->input->post('religion'),
            'email' => $this->input->post('email'),
            'telephone' => $this->input->post('telephone'),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role' => 3,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
    }

    public function deleteDosen($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
    }

    public function detailDosen($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function searchDosen()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nidn', $keyword);
        $this->db->or_like('name', $keyword);
        return $this->db->get_where('user', ['role' => '3'])->result_array();
    }

    public function editProfileAdmin()
    {
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        $nidn = $this->input->post('nidn');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $telephone = $this->input->post('telephone');

        // cek jika ada gambar yg akan diupload
        $uploadImage = $_FILES['image']['name'];

        if ($uploadImage) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048'; // kb
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('address', $address);
        $this->db->set('telephone', $telephone);
        $this->db->where('nidn', $nidn);
        $this->db->update('user');
    }

    public function getAllPengumuman()
    {
        $query = 'SELECT * FROM `pengumuman` ORDER BY `pengumuman`.`date_creation` DESC';
        return $this->db->query($query)->result_array();
    }

    public function getCountPengumuman()
    {
        return $this->db->count_all('pengumuman');
    }

    public function createPengumuman()
    {
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $uploader = $data['user']['name'];
        $title = $this->input->post('title');
        $desc = $this->input->post('description');
        date_default_timezone_set("Asia/Bangkok");
        $date_creation = date('Y-m-d H:i:s');


        $config['allowed_types'] = '*';
        $config['max_size'] = '2048'; // kb
        $config['detect_mime'] = false;
        $config['upload_path'] = './assets/pengumuman/file/';
        $this->load->library('upload', $config);

        for ($i = 1; $i <= 10; $i++) {
            $file_lampiran = $_FILES['file_lampiran' . $i]['name'];
            if ($file_lampiran) {
                if ($this->upload->do_upload('file_lampiran' . $i)) {
                    $upload_file = $this->upload->data('file_name');
                    $this->db->set('file_lampiran' . $i, $upload_file);
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }

        $this->db->set('uploader', $uploader);
        $this->db->set('title', $title);
        $this->db->set('description', $desc);
        $this->db->set('date_creation', $date_creation);
        $this->db->insert('pengumuman');
    }

    public function deletePengumuman($id)
    {
        // kurang jika data dihapus maka file yang ada di folder asset ikut terhapus
        $data['nama_file'] = $this->db->get_where('pengumuman', ['id' => $id])->row_array();

        for ($i = 1; $i <= 10; $i++) {
            $old_file = $data['nama_file']['file_lampiran' . $i];
            if ($old_file) {
                unlink(FCPATH . 'assets/pengumuman/file/' . $old_file);
            }
        }

        $this->db->delete('pengumuman', ['id' => $id]);
    }

    public function detailPengumuman($id)
    {
        return $this->db->get_where('pengumuman', ['id' => $id])->row_array();
    }

    public function updatePengumuman()
    {
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $desc = $this->input->post('description');
        date_default_timezone_set("Asia/Bangkok");
        $date_creation = date('Y-m-d H:i:s');

        $config['allowed_types'] = '*';
        $config['max_size'] = '2048'; // kb
        $config['detect_mime'] = false;
        $config['upload_path'] = './assets/pengumuman/file/';
        $this->load->library('upload', $config);

        for ($i = 1; $i <= 10; $i++) {
            $file_baru = $_FILES['file_lampiran' . $i]['name'];
            if ($file_baru) {
                if ($this->upload->do_upload('file_lampiran' . $i)) {
                    $data['nama_file'] = $this->db->get_where('pengumuman', ['id' => $id])->row_array();
                    $nama_file = $data['nama_file']['file_lampiran' . $i];

                    $upload_file = $this->upload->data('file_name');

                    if ($file_baru) {
                        unlink(FCPATH . 'assets/pengumuman/file/' . $nama_file);
                    }

                    $this->db->set('file_lampiran' . $i, $upload_file);
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }

        $this->db->set('title', $title);
        $this->db->set('description', $desc);
        $this->db->set('date_creation', $date_creation);
        $this->db->where('id', $id);
        $this->db->update('pengumuman');
    }

    public function getArsipFile($id)
    {
        // return $this->db->get_where('user_file', ['id_file' => $id])->row_array();

        $query = "SELECT *,(SELECT GROUP_CONCAT(name) FROM user_arsip x LEFT JOIN user y ON x.id_user=y.id_user WHERE x.id_file=user_file.id_file) as name, email FROM user_file WHERE id_file='$id' ORDER BY date_created DESC";

        // test
        // $a = $this->db->query($query)->result_array();
        // var_dump($a);
        // die;

        return $this->db->query($query)->row_array();
    }

    // get all arsip / join table
    public function getAllArsip()
    {
        $query = 'SELECT *,(SELECT GROUP_CONCAT(name) FROM user_arsip x LEFT JOIN user y ON x.id_user=y.id_user WHERE x.id_file=user_file.id_file) as name FROM user_file ORDER BY date_created DESC';

        // test
        // $a = $this->db->query($query)->result_array();
        // var_dump($a);
        // die;

        return $this->db->query($query)->result_array();
    }

    public function getEmail($id)
    {
        $query = "SELECT *,(SELECT GROUP_CONCAT(email) FROM user_arsip x LEFT JOIN user y ON x.id_user=y.id_user WHERE x.id_file=user_file.id_file) as email FROM user_file WHERE id_file='$id' ORDER BY date_created DESC";

        return $this->db->query($query)->row_array();
    }

    public function getCountArsip()
    {
        return $this->db->count_all('user_file');
    }

    // add arsip
    public function createArsip()
    {
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();
        $uploader = $data['user']['name'];
        date_default_timezone_set("Asia/Bangkok");
        $date_created = date('Y-m-d H:i:s');
        $title = $this->input->post('title');
        $description = $this->input->post('description');

        $config['allowed_types'] = '*';
        $config['max_size'] = '2048'; // kb
        $config['detect_mime'] = false;
        $config['upload_path'] = './assets/arsip/file/';
        $this->load->library('upload', $config);

        for ($i = 1; $i <= 10; $i++) {
            $lampiran_file = $_FILES['userfile' . $i]['name'];
            if ($lampiran_file) {
                if ($this->upload->do_upload('userfile' . $i)) {
                    $upload_file = $this->upload->data('file_name');
                    $this->db->set('userfile' . $i, $upload_file);
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }

        $this->db->set('uploader', $uploader);
        $this->db->set('date_created', $date_created);
        $this->db->set('title', $title);
        $this->db->set('description', $description);
        // simpan data arsip
        $this->db->insert('user_file');
        // jika data sudah disimpan, lanjut ambil data tersebut untuk id_file
        $this->db->order_by('id_file', 'DESC');
        $get = $this->db->get('user_file')->row_array();
        $id_file = $get['id_file'];

        // simpan ke user_arsip
        foreach ($_POST['id_dosen'] as $key => $value) {
            $data = null;
            // cek apakah ada dosen yang di ceklis
            $id_dosen = $value;
            $data = [
                'id_file' => $id_file,
                'id_user' => $id_dosen
            ];
            $this->db->insert('user_arsip', $data);
        }

        $user['user'] = $this->getEmail($id_file);
        $email = explode(',', $user['user']['email']);

        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_user' => 'prodiifamikompwt@gmail.com',
        //     'smtp_pass' => 'akunbuzzer123',
        //     'smtp_port' => '465',
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n",
        // ];

        $this->load->library('email');
        // $this->email->initialize($config);

        $this->email->from('prodiifamikompwt@gmail.com', 'Prodi Informatika Amikom Pwt');
        $this->email->to($email);
        $this->email->subject('Pengarsipan');
        $this->email->message('<b>' . $uploader . '</b> menambahkan pengarsipan baru <i>' . $title . '</i> di <a href="' . base_url() . 'user/arsip' . '">Prodi Informatika Pwt</a>');

        if ($this->email->send()) {
            echo 'Email berhasil dikirim';
        } else {
            echo 'Email tidak berhasil dikirim';
            echo '<br />';
            echo $this->email->print_debugger();
        }
    }

    // delete arsip
    public function deleteArsip($id)
    {
        // kurang jika data dihapus maka file yang ada di folder asset ikut terhapus
        $data['nama_file'] = $this->db->get_where('user_file', ['id_file' => $id])->row_array();

        for ($i = 1; $i < 10; $i++) {
            $file = $data['nama_file']['userfile' . $i];
            if ($file) {
                unlink(FCPATH . 'assets/arsip/file/' . $file);
            }
        }

        $this->db->delete('user_file', ['id_file' => $id]);
        $this->db->delete('user_arsip', ['id_file' => $id]);
    }

    // edit arsip
    public function updateArsip()
    {
        $data['user'] = $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();

        $id = $this->input->post('id');
        $uploader = $data['user']['name'];
        date_default_timezone_set("Asia/Bangkok");
        $date_created = date('Y-m-d H:i:s');
        $title = $this->input->post('title');
        $description = $this->input->post('description');

        $config['allowed_types'] = '*';
        $config['max_size'] = '2048'; // kb
        $config['detect_mime'] = false;
        $config['upload_path'] = './assets/arsip/file/';
        $this->load->library('upload', $config);

        for ($i = 1; $i <= 10; $i++) {
            $file_baru = $_FILES['userfile' . $i]['name'];
            if ($file_baru) {
                if ($this->upload->do_upload('userfile' . $i)) {
                    $data['nama_file'] = $this->db->get_where('user_file', ['id_file' => $id])->row_array();
                    $nama_file = $data['nama_file']['userfile' . $i];

                    $upload_file = $this->upload->data('file_name');

                    if ($file_baru) {
                        unlink(FCPATH . 'assets/arsip/file/' . $nama_file);
                    }

                    $this->db->set('userfile' . $i, $upload_file);
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }


        $this->db->set('uploader', $uploader);
        $this->db->set('date_created', $date_created);
        $this->db->set('title', $title);
        $this->db->set('description', $description);
        $this->db->where('id_file', $id);
        // simpan data arsip
        $this->db->update('user_file');
        // jika data sudah disimpan, lanjut ambil data tersebut untuk id_file
        $this->db->order_by('id_file', 'DESC');
        $get = $this->db->get('user_file')->row_array();
        $id_file = $get['id_file'];

        // hapus data yang ada di table user_arsip untuk diisi yang baru
        $this->db->delete('user_arsip', ['id_file' => $id]);

        // simpan ke user_arsip
        foreach ($_POST['id_dosen'] as $key => $value) {
            $data = null;
            // cek apakah ada dosen yang di ceklis
            $id_dosen = $value;
            $data = [
                'id_file' => $id_file,
                'id_user' => $id_dosen
            ];
            $this->db->insert('user_arsip', $data);
        }
    }
}
