<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layoutgudang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_layoutgudang');
        $this->load->helper('url');
    }

    public function index()
    {
        $data = array(
            'header'            => 'Layout Gudang',
            'judul'             => 'Gudang >',
            'sub_judul'         => 'Layout',
            'sub'               => '',
            'user'              => 'admin',
            );

        $this->load->view('templates/header', $data);
        $this->load->view('layout_gudang',$data);
        $this->load->view('templates/footer', $data);
    }
}
