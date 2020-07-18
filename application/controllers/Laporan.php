<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $this->load->model('model_laporan');
        $this->load->helper('url');
    }

    public function laporan()
    {
        $data   = array (
                'header'    => 'Laporan | FRINSA',
                'judul'     => 'LAPORAN',
                'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                );
        $isi    = array (
                'dd_varietas'   => $this->model_laporan->ambil('varietas'),
                'dd_blokmitra'  => $this->model_laporan->ambil('blokmitra'),
                'tampil'        => $this->model_laporan->get(),
                'chart'         => $this->model_laporan->chart(),
                'chart1'         => $this->model_laporan->chart1(),
                'chart2'         => $this->model_laporan->chart2(),
                'chart3'         => $this->model_laporan->chart3(),
                'chart4'         => $this->model_laporan->chart4(),
                );
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan2', $isi);
        $this->load->view('templates/footer');
    }


    public function keluar()
    {
        $data   = array (
                'header'    => 'Laporan Barang Keluar | FRINSA',
                'judul'     => 'LAPORAN BARANG KELUAR',
                'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                );
        $isi    = array (
                'tampil'        => $this->model_laporan->out(),
                );
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan_keluar', $isi);
        $this->load->view('templates/footer');
    }


    public function bloktahun()
    {
        $tahun       = $this->input->post('tahun');
        $blokmitra   = $this->input->post('blokmitra');

        $result = $this->model_laporan->chart($tahun, $blokmitra);

        redirect('laporan');
    }
}
