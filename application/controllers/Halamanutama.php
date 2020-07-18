<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halamanutama extends CI_Controller
{
    public function index()
    {

        $data['header'] 	= 'Halaman Utama';
        $data['judul'] 		= 'Halaman Utama';
        $data['sub_judul'] 	= '';
        $data['sub'] 		= '';
        $data['user'] 		= 'Admin';


        $this->load->view('templates/header', $data);
        $this->load->view('halaman_utama');
        $this->load->view('templates/footer', $data);
    }
}

//public function index()       $this->model_security->getsecurity();
//public function logout()      $this->session->sess_destroy();   redirect('login');
