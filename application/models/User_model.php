<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function editProfile()
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


    public function getDosenByNidn()
    {
        return $this->db->get_where('user', ['nidn' => $this->session->userdata('nidn')])->row_array();
    }

    public function getAllPengumuman()
    {
        $query = 'SELECT * FROM `pengumuman` ORDER BY `pengumuman`.`date_creation` DESC';
        return $this->db->query($query)->result_array();
    }

    public function getDetailPengumuman($id)
    {
        return $this->db->get_where('pengumuman', ['id' => $id])->row_array();
    }

    public function getArsip()
    {
        $query = 'SELECT *,(SELECT GROUP_CONCAT(name) FROM user_arsip x LEFT JOIN user y ON x.id_user=y.id_user WHERE x.id_file=user_file.id_file) as name FROM user_file ORDER BY date_created DESC';
        return $this->db->query($query)->result_array();
    }

    public function getDetailArsip($id)
    {
        $query = 'SELECT *,(SELECT GROUP_CONCAT(name) FROM user_arsip x LEFT JOIN user y ON x.id_user=y.id_user WHERE x.id_file=user_file.id_file) as name FROM user_file WHERE id_file=' . $id . ' ORDER BY date_created DESC';
        return $this->db->query($query)->row_array();
    }
}
