<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputkadarair extends CI_Controller
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
        $this->load->model('model_inputkadarair');
        $this->load->helper('url');
    }

    public function index()
    {
        $data    = array(
                'header'        => 'Input Kadar Air',
                'judul'         => 'Lantai Jemur >',
                'sub_judul'     => 'Layout Lantai Jemur >',
                'sub'           => 'Input Kadar Air Aktual',
                'tampil'        => $query = $this->model_inputkadarair->get(),                
                'user'          => 'Admin',
                    );
        
        $this->load->view('templates/header', $data);
        $this->load->view('input_kadar_air', $data); //untuk tampilan menu dan css
        $this->load->view('templates/footer', $data);
    }


    public function get_id($id)
    {
        $query  = $this->model_inputkadarair->get_id($id);
       redirect('Inputkadarair/index');
    }

    public function proses()
    {
        $id_barangjemur = $this->input->post('idka');
        $harike         = $this->input->post('harike');
        $kadarair       = $this->input->post('kadarair');

        $input  = array('
            id_barangjemur' => $id_barangjemur,
            'harike'        => $harike,
            'kadarair'      => $kadarair
            );

        $this->model_inputkadarair->input($input, 'input_kadar_air');
        
        redirect('stoklantaijemur');
    }

}
