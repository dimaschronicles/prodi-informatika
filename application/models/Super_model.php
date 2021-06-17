<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super_model extends CI_Model
{
    public function createAdmin()
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
            'role' => 2,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
    }

    public function deleteAdmin($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
    }
}
