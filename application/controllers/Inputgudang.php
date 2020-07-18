<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputgudang extends CI_Controller
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
        $this->load->model('model_inputgudang');
        $this->load->helper('url');
    }


    public function input()
    {
        $data = array(
            'header'            => 'Input Data Gudang | FRINSA',
            'judul'             => 'INPUT DATA | Barang Gudang',
            'user'              => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
            );
        $isi = array(
            'dd_kodebarang'         => $this->model_inputgudang->tampil_kodebarang2(),
            // 'dd_kodebarangready'    => $this->model_inputgudang->tampil_kodebarangready(),
            'dd_jenisolahan'        => $this->model_inputgudang->tampil_jenisolahan(),
            'dd_letakgudang'        => $this->model_inputgudang->tampil_letakgudang(),
            'edit'                  => $this->model_inputgudang->tabel_edit(),
            );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/input_gudang',$isi);
        $this->load->view('templates/footer');
    }


    public function index_edit()
    {
        $data = array(
            'header'            => 'Stok-Edit Data Gudang | FRINSA',
            'judul'             => 'STOK & EDIT | Barang Gudang',
            'user'              => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
            );
        $isi = array(
            'dd_kodebarang'         => $this->model_inputgudang->tampil_kodebarang2(),
            // 'dd_kodebarangready'    => $this->model_inputgudang->tampil_kodebarangready(),
            'dd_jenisolahan'        => $this->model_inputgudang->tampil_jenisolahan(),
            'dd_letakgudang'        => $this->model_inputgudang->tampil_letakgudang(),
            'edit'                  => $this->model_inputgudang->tabel_edit(),
            );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stokedit/edit_barang_gudang',$isi);
        $this->load->view('templates/footer');
    }


    public function proses()
    {
        $kodebarang     = $this->input->post('kodebarang');
        $letakgudang    = $this->input->post('letakgudang');
        $bobot          = $this->input->post('bobot');
        $status         = $this->input->post('status');
        $id_user        = $this->input->post('id_user');
        $jumlah         = count($kodebarang);

        for ($i = 0; $i < $jumlah; $i++) {
            $input[$i] = array(
                'id_barangdatang'   => $kodebarang[$i],
                'id_letakgudang'    => $letakgudang,
                'bobot'             => $bobot,
                'status'            => $status,
                'id_user'           => $id_user,
            );
        };

        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil ditambahkan!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputgudang->input($input, 'barang_gudang');
        redirect('Inputgudang/index_edit');
    }


    public function edit_data()
    {
        $id     = $this->input->post('id');

        $result = $this->model_inputgudang->edit($id, 'view_gudang');

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
        $this->model_inputgudang->update($where, $edit,  'barang_gudang');
        
        redirect('Inputgudang/index_edit');
    }


    public function hapus($id_barangdatang)
    {
        $notif  = array(
            'status'    => "hapus",
            'message'   => "Data berhasil dihapus!",
        );

        $hapus  = array('id_barangdatang' => $id_barangdatang);

        $this->session->set_flashdata($notif);
        $this->model_inputgudang->hapus('barang_gudang',$hapus);
        redirect('Inputgudang/index_edit');
    }


    public function prosesready()
    {
        $kodebarang             = $this->input->post('kodebarang');

        $input = array(
            'id_barangdatang'           => $kodebarang,
        );

        $this->model_inputgudang->input($input, 'gudang_ready');
        redirect('stokgudang');
    }

}
