<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pengumuman extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model', 'pengumuman');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $pengumuman = $this->pengumuman->getPengumuman();
        } else {
            $pengumuman = $this->pengumuman->getPengumuman($id);
        }

        if ($pengumuman) {
            $this->response([
                'status' => true,
                'data' => $pengumuman
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
