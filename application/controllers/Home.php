<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') != TRUE){
            $notif = array(
                'status' => "gagal",
                'message' => "Silahkan login terlebih dahulu",
            );

            $this->session->set_flashdata($notif);
            redirect('login');
        }
    }


    public function home()
    {
        $data = array(  'header'    => 'Beranda | FRINSA',
                        'judul'     => 'BERANDA',
                        'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                    );
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('home/halaman_utama');
        $this->load->view('templates/footer');
    }
}
