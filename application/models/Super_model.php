<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super_model extends CI_Model
{
    public function createAdmin()
    {
        $data = [
            'nidn' => $this->input->post('nidn', true),
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
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

    public function detailAdmin($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function getCountAdmin()
    {
        $role = 2;
        $this->db->where('role', $role);
        $this->db->from('user');
        return $this->db->count_all_results();
    }
}
