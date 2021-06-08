<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{
    public function getPengumuman($id = null)
    {
        if ($id === null) {
            $query = 'SELECT * FROM `pengumuman` ORDER BY `pengumuman`.`date_creation` DESC';
            return $this->db->query($query)->result_array();
        } else {
            $query = 'SELECT * FROM `pengumuman` WHERE `id`=' . $id . ' ORDER BY `pengumuman`.`date_creation` DESC';
            return $this->db->query($query)->result_array();
        }
    }
}
