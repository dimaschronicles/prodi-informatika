<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pengarsipan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengarsipan_model', 'pengarsipan');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $pengarsipan = $this->pengarsipan->getArsip();
        } else {
            $pengarsipan = $this->pengarsipan->getArsip($id);
        }

        if ($pengarsipan) {
            $this->response([
                'status' => true,
                'data' => $pengarsipan
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
