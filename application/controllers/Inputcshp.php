<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputcshp extends CI_Controller
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
        $this->load->model('model_inputcshp');
        $this->load->helper('url');
    }


    public function input()
    {
        $data   = array('header'        => 'Input Data CS+HP',
                        'judul'         => 'PROSES | Mesin CS+HP',
                        'user'          => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
            );
        $isi = array(
            'dd_kodebarang'     => $this->model_inputcshp->tampil_kodebarang(),
            'dd_kodesuton'      => $this->model_inputcshp->tampil_kodesuton(),
            'dd_varietas'       => $this->model_inputcshp->tampil_varietas(),
            'edit'              => $this->model_inputcshp->tabel_edit(),
            'stok'              => $this->model_inputcshp->tabel_stok(),
            );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/input_cshp',$isi);
        $this->load->view('templates/footer');
    }


    public function index_edit()
    {
        $data = array(
            'header'        => 'Stok-Edit Barang CS+HP | FRINSA',
            'judul'         => 'STOK & EDIT | Barang CS+HP',
            'user'          => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
            );
        $isi = array(
            'dd_kodebarang'     => $this->model_inputcshp->tampil_kodebarang(),
            'dd_kodesuton'      => $this->model_inputcshp->tampil_kodesuton(),
            'dd_varietas'       => $this->model_inputcshp->tampil_varietas(),
            'edit'              => $this->model_inputcshp->tabel_edit(),
            'stok'              => $this->model_inputcshp->tabel_stok(),
            );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stokedit/edit_barang_cshp',$isi);
        $this->load->view('templates/footer');
    }


    public function proses()
    {
        $varietas       = $this->input->post('varietas');
        $kodebarang     = $this->input->post('kodebarang');
        $tanggalcshp    = $this->input->post('tanggalcshp');
        $bobotmasuk     = $this->input->post('bobotmasuk');
        $bobotcshp      = $this->input->post('bobotcshp');
        $status         = $this->input->post('status');
        $id_user        = $this->input->post('id_user');
        $proses         = $this->input->post('proses');
        $jumlah         = count($kodebarang);
        $kodecshp       = CS_. $varietas. $bobotcshp. $tanggalcshp ;

        for ($i = 0; $i < $jumlah; $i++) {
            $input[$i] = array(
                'id_barangdatang'   => $kodebarang[$i],
                'varietas'          => $varietas,
                'kodecshp'          => $kodecshp,
                'tanggalcshp'       => $tanggalcshp,
                'bobotmasukcshp'    => $bobotmasuk,
                'bobotcshp'         => $bobotcshp,
                'status'            => $status,
                'proses'            => $proses,
                'id_user'           => $id_user,
            );
        };

        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil ditambahkan!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputcshp->input($input, 'barang_cshp');
        redirect('Inputcshp/index_edit');
    }


    public function edit_data()
    {
        $id     = $this->input->post('id');

        $result = $this->model_inputcshp->edit($id, 'view_barangcshp');

        echo json_encode($result);
    }


    public function update()
    {
        $id_barangdatang        = $this->input->post('id_barangdatang');
        $kodebarang             = $this->input->post('kodebarang');
        $tanggalcshp            = $this->input->post('tanggalcshp');
        $bobotmasukcshp         = $this->input->post('bobotmasukcshp');
        $bobotcshp              = $this->input->post('bobotcshp');
        $varietas               = $this->input->post('varietas');
        $status                 = $this->input->post('status');
        $id_user                = $this->input->post('id_user');
        $kodecshp               = CSHP_. $varietas. $tanggalcshp ;

        $where  = array('id_barangdatang'   => $id_barangdatang);
        $edit   = array('kodecshp'          => $kodecshp,
                        'tanggalcshp'       => $tanggalcshp,
                        'bobotmasukcshp'    => $bobotmasukcshp,
                        'bobotcshp'         => $bobotcshp,
                        'status'            => $status,
                        'id_user'           => $id_user,
                        
                );
        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil diperbaharui!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputcshp->update($where, $edit, 'barang_cshp');
        
        redirect('Inputcshp/index_edit');
    }


    public function hapus($id_barangdatang)
    {
        $notif  = array(
            'status'    => "hapus",
            'message'   => "Data berhasil dihapus!",
        );

        $hapus  = array('id_barangdatang' => $id_barangdatang);

        $this->session->set_flashdata($notif);
        $this->model_inputcshp->hapus('barang_cshp',$hapus);
        redirect('Inputcshp/index_edit');
    }
}
