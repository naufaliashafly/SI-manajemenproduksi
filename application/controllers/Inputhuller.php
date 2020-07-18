<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputhuller extends CI_Controller
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
        $this->load->model('model_inputhuller');
        $this->load->helper('url');
    }


    public function input()
    {
        $data   = array('header'        => 'Input Data Huller | FRINSA',
                        'judul'         => 'PROSES | Mesin Huller',
                        'user'          => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                    );
        $isi    = array('dd_kodebarang'     => $this->model_inputhuller->ambil(),
                        'edit'              => $this->model_inputhuller->tabel_edit(),
                        'stok'              => $this->model_inputhuller->tabel_stok(),
                    );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/input_huller',$isi);
        $this->load->view('templates/footer');
    }


    public function index_edit()
    {
        $data   = array('header'        => 'Stok-Edit Data Huller | FRINSA',
                        'judul'         => 'STOK & EDIT | Barang Huller',
                        'user'          => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                    );
        $isi    = array('dd_kodebarang'     => $this->model_inputhuller->ambil(),
                        'edit'              => $this->model_inputhuller->tabel_edit(),
                        'stok'              => $this->model_inputhuller->tabel_stok(),
                    );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stokedit/edit_barang_huller',$isi);
        $this->load->view('templates/footer');
    }


    public function proses()
    {
        $kodebarang     = $this->input->post('kodebarang');
        $tanggalhuller  = $this->input->post('tanggalhuller');
        $bobotmasuk     = $this->input->post('bobotmasuk');
        $bobothuller    = $this->input->post('bobothuller');
        $status         = $this->input->post('status');
        $id_user        = $this->input->post('id_user');
        $proses         = $this->input->post('proses');


        $input  = array('id_barangdatang'   => $kodebarang,
                        'tanggalhuller'     => $tanggalhuller,
                        'bobotmasukhull'    => $bobotmasuk,
                        'bobothuller'       => $bobothuller,
                        'status'            => $status,
                        'id_user'           => $id_user,
                        'proses'            => $proses,
                    );

        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil ditambahkan!",

        );

        $this->session->set_flashdata($notif);

        $this->model_inputhuller->input($input, 'barang_huller');
        redirect('Inputhuller/index_edit');
    }


    public function tampil()
    {
        $id     = $this->input->post('id');

        $result = $this->model_inputhuller->ambilkode($id);

        echo json_encode($result);
    }


    public function edit_data()
    {
        $id     = $this->input->post('id');

        $result = $this->model_inputhuller->edit($id, 'view_baranghuller');

        echo json_encode($result);
    }


    public function update()
    {
        $id_barangdatang    = $this->input->post('id_barangdatang');
        $kodebarang         = $this->input->post('kodebarang');
        $tanggalhuller      = $this->input->post('tanggalhuller');
        $bobotmasukhull     = $this->input->post('bobotmasukhull');
        $bobothuller        = $this->input->post('bobothuller');
        $status                 = $this->input->post('status');
        $id_user                = $this->input->post('id_user');

        $where  = array('id_barangdatang'   => $id_barangdatang);
        $edit   = array('tanggalhuller'     => $tanggalhuller,
                        'bobotmasukhull'    => $bobotmasukhull,
                        'bobothuller'       => $bobothuller,
                        'status'            => $status,
                        'id_user'           => $id_user,
                );
        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil diperbaharui!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputhuller->update($where, $edit,  'barang_huller');
        
        redirect('Inputhuller/index_edit');
    }


    public function hapus($id_barangdatang)
    {
        $notif  = array(
            'status'    => "hapus",
            'message'   => "Data berhasil dihapus!",
        );

        $hapus  = array('id_barangdatang' => $id_barangdatang);

        $this->session->set_flashdata($notif);
        $this->model_inputhuller->hapus('barang_huller',$hapus);
        redirect('Inputhuller/index_edit');
    }




    public function get_kering()
    {
        $id     = $this->input->post('id');

        $result = $this->model_inputhuller->get_kering($id, 'view_datanghuller');

        echo json_encode($result);
    }
}
