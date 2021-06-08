<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengarsipan_model extends CI_Model
{
    public function getArsip($id = null)
    {
        if ($id === null) {
            $query = 'SELECT *,(SELECT GROUP_CONCAT(name) FROM user_arsip x LEFT JOIN user y ON x.id_user=y.id_user WHERE x.id_file=user_file.id_file) as name FROM user_file ORDER BY date_created DESC';
            return $this->db->query($query)->result_array();
        } else {
            $query = 'SELECT *,(SELECT GROUP_CONCAT(name) FROM user_arsip x LEFT JOIN user y ON x.id_user=y.id_user WHERE x.id_file=user_file.id_file) as name FROM user_file WHERE id_file=' . $id . ' ORDER BY date_created DESC';
            return $this->db->query($query)->row_array();
        }
    }
}
