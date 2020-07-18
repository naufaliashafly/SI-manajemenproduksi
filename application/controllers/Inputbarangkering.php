<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputbarangkering extends CI_Controller
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
        $this->load->model('model_inputbarangkering');
        $this->load->helper('url');
    }

    public function input()
    {
        $data    = array(
                'header'    => 'Input Barang Kering',
                'judul'     => 'PROSES | Barang Kering',
                'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                );
        $isi    = array(
                'tampil'    => $this->model_inputbarangkering->ambil(),
                'edit'      => $this->model_inputbarangkering->tabel_edit(),
                'stok'      => $this->model_inputbarangkering->tabel_stok(),
                );
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/input_barang_kering', $isi);
        $this->load->view('templates/footer');
    }


    public function index_edit()
    {
        $data    = array(
                'header'    => 'Stok-Edit Barang Kering',
                'judul'     => 'STOK & EDIT | Barang Kering',
                'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                );
        $isi    = array(
                'tampil'    => $this->model_inputbarangkering->ambil(),
                'edit'      => $this->model_inputbarangkering->tabel_edit(),
                'stok'      => $this->model_inputbarangkering->tabel_stok(),
                );
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stokedit/edit_barang_kering', $isi);
        $this->load->view('templates/footer');
    }


    public function proses1()
    {
        $id_barangjemur = $this->input->post('id_barangjemur');
        $tanggalkering  = $this->input->post('tanggalkering');
        $bobotkering    = $this->input->post('bobotkering');
        $status         = $this->input->post('status');
        $status                 = $this->input->post('status');
        $id_user                = $this->input->post('id_user');

        $input  = array('id_barangjemur'    => $id_barangjemur,
                        'tanggalkering'     => $tanggalkering,
                        'bobotkering'       => $bobotkering,
                        'status'            => $status,
                        'id_user'           => $id_user, );

        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil ditambahkan!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputbarangkering->input($input, 'barang_kering');
        redirect('Inputbarangkering/index_edit');
    }


    public function proses()
    {
        $id_barangjemur = $this->input->post('idkering');
        $tanggalkering  = $this->input->post('tanggalkering');
        $bobotkering    = $this->input->post('bobotkering');
        $status                 = $this->input->post('status');
        $id_user                = $this->input->post('id_user');

        $input  = array('id_barangjemur'    => $id_barangjemur,
                        'tanggalkering'     => $tanggalkering,
                        'bobotkering'       => $bobotkering,
                        'status'            => $status,
                        'id_user'           => $id_user,
                         );

        $this->model_inputbarangkering->input($input, 'barang_kering');
        redirect('Inputbarangkering/index_edit');
    }


    public function edit_data()
    {
        $id     = $this->input->post('id');

        $result = $this->model_inputbarangkering->edit($id, 'view_barangkering');

        echo json_encode($result);
    }


    public function update()
    {
        $id_barangjemur     = $this->input->post('id_barangjemur');
        $kodebarang         = $this->input->post('kodebarang');
        $tanggalkering      = $this->input->post('tanggalkering');
        $bobotkering        = $this->input->post('bobotkering');
        $status                 = $this->input->post('status');
        $id_user                = $this->input->post('id_user');

        $where  = array('id_barangjemur'    => $id_barangjemur);
        $edit   = array('tanggalkering'     => $tanggalkering,
                        'bobotkering'       => $bobotkering,
                        'status'            => $status,
                        'id_user'           => $id_user,
                        
                );
        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil diperbaharui!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputbarangkering->update($where, $edit, 'barang_kering');
        
        redirect('Inputbarangkering/index_edit');
    }


    public function hapus($id_barangjemur)
    {
        $notif  = array(
            'status'    => "hapus",
            'message'   => "Data berhasil dihapus!",
        );

        $hapus  = array('id_barangjemur' => $id_barangjemur);

        $this->session->set_flashdata($notif);
        $this->model_inputbarangkering->hapus('barang_kering',$hapus);
        redirect('Inputbarangkering/index_edit');
    }
}
