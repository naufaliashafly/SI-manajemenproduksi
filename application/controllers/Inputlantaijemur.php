<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputlantaijemur extends CI_Controller
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
        $this->load->model('model_inputlantaijemur');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function input()
    {
        $data   = array('header'            => 'Input Data Lantai Jemur | FRINSA',
                        'judul'             => 'INPUT DATA | Lantai Jemur',
                        'user'              => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                     );
        $isi    = array('dd_kodebarang'     => $this->model_inputlantaijemur->kodebarang(),
                        'edit'              => $this->model_inputlantaijemur->tabel_edit(),
                        'stok'              => $this->model_inputlantaijemur->tabel_stok(),
                        'dd_jenisolahan'       => $this->model_inputlantaijemur->ambil('jenisolahan'),
                        'dd_posisibarang'   => $this->model_inputlantaijemur->ambil('posisibarang'),
                         );
            //var_dump($this->model_inputlantaijemur->ambil('barang_datang')->result());
            //var_dump($this->model_inputlantaijemur->getALV());

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/input_lantai_jemur',$isi);
        $this->load->view('templates/footer');
    }


    public function index_edit()
    {
        $data   = array('header'            => 'Stok-Edit Data Barang Jemur | FRINSA',
                        'judul'             => 'STOK & EDIT | Barang Jemur',
                        'user'              => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(), );
        $isi    = array('dd_kodebarang'     => $this->model_inputlantaijemur->kodebarang(),
                        'edit'              => $this->model_inputlantaijemur->tabel_edit(),
                        'stok'              => $this->model_inputlantaijemur->tabel_stok(),
                        'dd_jenisolahan'       => $this->model_inputlantaijemur->ambil('jenisolahan'),
                        'dd_posisibarang'   => $this->model_inputlantaijemur->ambil('posisibarang'),
                         );
            //var_dump($this->model_inputlantaijemur->ambil('barang_datang')->result());
            //var_dump($this->model_inputlantaijemur->getALV());

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('/stokedit/edit_barang_jemur',$isi);
        $this->load->view('templates/footer');
    }


    public function proses()
    {
        $kodebarang             = $this->input->post('kodebarang');
        $posisibarang           = $this->input->post('posisibarang');
        $tanggalmasukjemuran    = $this->input->post('tanggalmasukjemur');
        $status                 = $this->input->post('status');
        $id_user                = $this->input->post('id_user');

        $input  = array('id_barangdatang'       => $kodebarang,
                        'id_posisibarang'       => $posisibarang,
                        'tanggalmasukjemuran'   => $tanggalmasukjemuran,
                        'status'            => $status,
                        'id_user'           => $id_user,
                         );

        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil ditambahkan!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputlantaijemur->input($input, 'barang_jemur');
        redirect('inputlantaijemur/index_edit');
    }


    public function edit_data()
    {
        $id     = $this->input->post('id');

        $result = $this->model_inputlantaijemur->edit($id, 'view_barangjemur');

        echo json_encode($result);
    }


    public function update()
    {
        $id_barangdatang        = $this->input->post('id_barangdatang');
        $kodebarang             = $this->input->post('kodebarang');
        $tanggalmasukjemuran    = $this->input->post('tanggalmasukjemuran');
        $posisibarang           = $this->input->post('posisibarang');
        $status                 = $this->input->post('status');
        $id_user                = $this->input->post('id_user');

        $where  = array('id_barangdatang'       => $id_barangdatang);
        $edit   = array('id_posisibarang'       => $posisibarang,
                        'tanggalmasukjemuran'   => $tanggalmasukjemuran,
                        'status'            => $status,
                        'id_user'           => $id_user,
                        
                );
        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil diperbaharui!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputlantaijemur->update($where, $edit, 'barang_jemur');
        
        redirect('inputlantaijemur/index_edit');
    }


    public function hapus($id_barangdatang)
    {
        $notif  = array(
            'status'    => "hapus",
            'message'   => "Data berhasil dihapus!",
        );

        $hapus  = array('id_barangdatang' => $id_barangdatang);

        $this->session->set_flashdata($notif);
        $this->model_inputlantaijemur->hapus('barang_jemur',$hapus);
        redirect('inputlantaijemur/index_edit');
    }
}
