<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputready extends CI_Controller
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
        $this->load->model('model_inputready');
        $this->load->helper('url');
    }


    public function input()
    {
        $data = array(
            'header'            => 'Input Data Barang Ready | FRINSA',
            'judul'             => 'INPUT DATA | Gudang Ready',
            'user'              => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
            );
        $isi = array(
            'dd_kodebarang'         => $this->model_inputready->tampil_kodebarang2(),
            // 'dd_kodebarangready'    => $this->model_inputgudang->tampil_kodebarangready(),
            'dd_jenisolahan'        => $this->model_inputready->tampil_jenisolahan(),
            'dd_letakgudang'        => $this->model_inputready->tampil_letakgudang(),
            'edit'                  => $this->model_inputready->tabel_edit(),
            );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/input_ready',$isi);
        $this->load->view('templates/footer');
    }


    public function index_edit()
    {
        $data = array(
            'header'            => 'Edit-Stok Barang Ready',
            'judul'             => 'EDIT & STOK',
            'user'              => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
            );
        $isi = array(
            'dd_kodebarang'         => $this->model_inputready->tampil_kodebarang2(),
            // 'dd_kodebarangready'    => $this->model_inputgudang->tampil_kodebarangready(),
            'dd_jenisolahan'        => $this->model_inputready->tampil_jenisolahan(),
            'dd_letakgudang'        => $this->model_inputready->tampil_letakgudang(),
            'edit'                  => $this->model_inputready->tabel_edit(),
            );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stokedit/edit_barang_ready', $isi);
        $this->load->view('templates/footer');
    }


    public function proses()
    {
        $kodebarang     = $this->input->post('kodebarang');
        $statusready    = $this->input->post('statusready');
        $bobot          = $this->input->post('bobot');
        $status         = $this->input->post('status');
        $id_user        = $this->input->post('id_user');
        $proses         = $this->input->post('proses');
        $jumlah         = count($kodebarang);

        for ($i = 0; $i < $jumlah; $i++) {
            $input[$i] = array(
                'id_barangdatang'   => $kodebarang[$i],
                'id_statusready'    => $statusready,
                'bobot'             => $bobot,
                'status'            => $status,
                'id_user'           => $id_user,
                'proses'            => $proses,
            );
        };

        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil ditambahkan!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputready->input($input, 'barang_ready');
        redirect('Inputready/index_edit');
    }


    public function edit_data()
    {
        $id     = $this->input->post('id');

        $result = $this->model_inputready->edit($id, 'view_ready');

        echo json_encode($result);
    }


    public function update()
    {
        $id_barangdatang = $this->input->post('id_barangdatang');
        $letakgudang     = $this->input->post('letakgudang');
        $bobot           = $this->input->post('bobot');
        $status                 = $this->input->post('status');
        $id_user                = $this->input->post('id_user');

        $where  = array('id_barangdatang'   => $id_barangdatang);
        $edit   = array('id_letakgudang'    => $letakgudang,
                        'bobot'             => $bobot,
                        'status'            => $status,
                        'id_user'           => $id_user,
                );
        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil diperbaharui!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputready->update($where, $edit, 'barang_ready');
        
        redirect('Inputready/index_edit');
    }


    public function hapus($id_barangdatang)
    {
        $notif  = array(
            'status'    => "hapus",
            'message'   => "Data berhasil dihapus!",
        );

        $hapus  = array('id_barangdatang' => $id_barangdatang);

        $this->session->set_flashdata($notif);
        $this->model_inputready->hapus('barang_ready',$hapus);
        redirect('Inputready/index_edit');
    }


    public function sold()
    {
        $id_barangdatang    = $this->input->post('barangdatang');
        $sold               = $this->input->post('sold');

        $where  = array('id_barangdatang'   => $id_barangdatang);
        $edit   = array('id_statusready'    => $sold,
                );

        $notif  = array(
            'status'    => "berhasil",
            'message'   => "Barang sudah terjual!",
        );

        $this->session->set_flashdata($notif);
        $this->model_inputready->update($where, $edit, 'barang_ready');
        redirect('Laporan/keluar');
    }

}
