<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{
    public function index()
    {

        $data['judul'] = 'Coba';
        $this->load->view('coba', $data);
    }
}
