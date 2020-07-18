<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
        $this->load->model('model_pesanan');
        $this->load->model('model_inputbarangmasuk');
        $this->load->model('model_inputsutongrading');
        $this->load->helper('url');
    }

    public function input()
    {
        $data = array(  'header'            => 'Input Pesanan | FRINSA',
                        'judul'             => 'ADMIN | Input Pesanan',
                        'user'              => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),

                    );
        $isi = array(   'dd_varietas'       => $this->model_inputbarangmasuk->ambil('varietas'),
                        'dd_kodebarang'     => $this->model_inputsutongrading->ambil(),
                        'dd_jenisolahan'    => $this->model_inputbarangmasuk->jenisolahan(),
                        'tabel'             => $this->model_pesanan->tabel(),
                        'tabel1'            => $this->model_pesanan->tabel1(),
                    );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/input_pesanan', $isi);
        $this->load->view('templates/footer');
    }


    public function laporan()
    {
        $data = array(  'header'    => 'Pesanan Barang | FRINSA',
                        'judul'     => 'LAPORAN | Pesanan barang',
                        'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),

                    );
        $isi = array(   'tampil'    => $this->model_pesanan->pesan(),
                    );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pesanan', $isi);
        $this->load->view('templates/footer');
    }


    public function proses()
    {
        $tanggalpesan   = $this->input->post('tanggalpesan');
        $kodebarang     = $this->input->post('kodebarang');
        $varietas       = $this->input->post('varietas');
        $jenisolahan    = $this->input->post('jenisolahan');
        $bobotpesan     = $this->input->post('input');
        $tanggalkirim   = $this->input->post('tanggalkirim');
        $kodepesan      = $varietas. $jenisolahan . $bobotpesan . $tanggalpesan;
        $status         = $this->input->post('status');
        $jumlah         = count($kodebarang);

        $input  = array(
                    'varietas'      => $varietas,
                    'jenisolahan'   => $jenisolahan,
                    'kodepesan'     => $kodepesan,
                    'tanggalpesan'  => $tanggalpesan,
                    'bobotpesan'    => $bobotpesan,
                    'tanggalkirim'  => $tanggalkirim,
                    'status'        => $status,
                );

        $id_pesanan = $this->model_pesanan->input($input, 'pesanan');

        for ($i = 0; $i < $jumlah; $i++) {
            $isi[$i] = array(
                'id_barangdatang'   => $kodebarang[$i],
                'id_pesanan'        => $id_pesanan,
            );
        };

        $notif  = array('status'    => "berhasil",
                        'message'   => "Data berhasil ditambahkan!",

        );

        $this->session->set_flashdata($notif);

        $this->model_pesanan->barang($isi, 'pesanan_barang');
        redirect('pesanan/laporan');
    }


    // public function cek()
    // {
    //     $varietas     = $this->input->post('id');


    //     $result = $this->model_pesanan->edit($varietas, 'view_stokhitung');

    //     echo json_encode($result);
    // }


    public function cek()
    {
        $varietas       = $this->input->post('ckvar');
        $jenisolahan    = $this->input->post('ckjenis');

        $where  = array('varietas'      => $varietas,
                        'jenisolahan'   => $jenisolahan,
                         );

        $result = $this->model_pesanan->edit($where, 'view_stokhitung');

        echo json_encode($result);
    }    


    public function cari()
    {
        $varietas       = $this->input->post('ckvar');
        $jenisolahan    = $this->input->post('ckjenis');

        $where  = array('varietas'      => $varietas,
                        'jenisolahan'   => $jenisolahan,
                         );

        $result = $this->model_pesanan->cari($where, 'view_cekbox');

        echo json_encode($result);
    }


    public function kodepesan()
    {
        $id     = $this->input->post('id');

        $result = $this->model_pesanan->kodepesan($id, 'view_pesananbarang');

        echo json_encode($result);
    }
}