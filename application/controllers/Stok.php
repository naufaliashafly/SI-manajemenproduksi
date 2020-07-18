<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
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
        $this->load->model('model_stok');
        $this->load->helper('url');
    }

    public function pabrik()
    {
        $data   = array (
                'header'    => 'Stok Barang Pabrik | FRINSA',
                'judul'     => 'STOK BARANG | Stok Barang Pabrik',
                'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                );
        $isi    = array (
                'tampil'    => $this->model_stok->stok_pabrik(),
                );
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/stok_pabrik', $isi);
        $this->load->view('templates/footer');
    }


    public function proses()
    {
        $data   = array (
                'header'    => 'Stok Barang Proses | FRINSA',
                'judul'     => 'STOK BARANG | Stok Barang Proses',
                'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                );
        $isi    = array (
                'tampil'        => $this->model_stok->stok_proses(),
                );
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/stok_proses', $isi);
        $this->load->view('templates/footer');
    }


    public function gudang()
    {
        $data   = array (
                'header'    => 'Stok Barang Gudang | FRINSA',
                'judul'     => 'STOK BARANG | Stok Barang Gudang',
                'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                );
        $isi    = array (
                'tampil'    => $this->model_stok->stok_gudang(),
                );
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/stok_gudang', $isi);
        $this->load->view('templates/footer');
    }


    public function ready()
    {
        $data   = array (
                'header'    => 'Stok Barang Ready | FRINSA',
                'judul'     => 'STOK BARANG | Stok Barang Ready',
                'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                );
        $isi    = array (
                'tampil'        => $this->model_stok->stok_ready(),
                );
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/stok_ready', $isi);
        $this->load->view('templates/footer');
    }


    public function bloktahun()
    {
        $tahun       = $this->input->post('tahun');
        $blokmitra   = $this->input->post('blokmitra');

        $result = $this->model_stokpabrik->chart($tahun, $blokmitra);

        redirect('Stokpabrik');
    }
}
