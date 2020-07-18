<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputsutongrading extends CI_Controller
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
        $this->load->model('model_inputsutongrading');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }


    public function input()
    {
        $data   = array('header'    => 'Input Data Suton Grading',
                        'judul'     => 'PROSES | Mesin Suton+Grading',
                        'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
            );
        $isi    = array(
            'dd_kodebarang'     => $this->model_inputsutongrading->ambil(),
            'dd_kodesuton'      => $this->model_inputsutongrading->kodesuton(),
            'dd_varietas'       => $this->model_inputsutongrading->tampil_varietas(),
            'edit'              => $this->model_inputsutongrading->tabel_edit(),
            'stok'              => $this->model_inputsutongrading->tabel_stok(),
            );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/input_suton_grading',$isi);
        $this->load->view('templates/footer');
    }


    public function index_edit()
    {
        $data   = array(
            'header'        => 'Stok-Edit Barang Suton Grading | FRINSA',
            'judul'         => 'STOK & EDIT | Barang Suton+Grading',
            'user'          => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
            );
        $isi    = array(
            'dd_kodebarang'     => $this->model_inputsutongrading->ambil(),
            'dd_kodesuton'      => $this->model_inputsutongrading->kodesuton(),
            'dd_varietas'       => $this->model_inputsutongrading->tampil_varietas(),
            'edit'              => $this->model_inputsutongrading->tabel_edit(),
            'stok'              => $this->model_inputsutongrading->tabel_stok(),
            );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stokedit/edit_barang_suton',$isi);
        $this->load->view('templates/footer');
    }


    public function proses()
    {
        $varietas            = $this->input->post('varietas');
        $kodebarang          = $this->input->post('kodebarang');
        $tanggalsutongrading = $this->input->post('tanggalsutongrading');
        $MB                  = $this->input->post('MB');
        $BB                  = $this->input->post('BB');
        $PB                  = $this->input->post('PB');
        $L2                  = $this->input->post('L2');
        $L3                  = $this->input->post('L3');
        $PBK                 = $this->input->post('PBK');
        $ELV                 = $this->input->post('ELV');
        $bobotmasuk          = $this->input->post('bobotmasuk');
        $status              = $this->input->post('status');
        $id_user             = $this->input->post('id_user');
        $proses              = $this->input->post('proses');
        $bobotsutongrading   = $MB + $BB + $PB + $L2 + $L3 + $PBK + $ELV ;
        $kodesutongrading    = SUT_. $varietas. $bobotsutongrading .$tanggalsutongrading ;
        $jumlah              = count($kodebarang);

        for ($i = 0; $i < $jumlah; $i++) {
            $input[$i] = array(
                'id_barangdatang'       => $kodebarang[$i],
                'varietas'              => $varietas,
                'kodesutongrading'      => $kodesutongrading,
                'tanggalsutongrading'   => $tanggalsutongrading,
                'bobotmasuksut'         => $bobotmasuk,
                'MB'                    => $MB,
                'BB'                    => $BB,
                'PB'                    => $PB,
                'L2'                    => $L2,
                'L3'                    => $L3,
                'PBK'                   => $PBK,
                'ELV'                   => $ELV,
                'bobotsutongrading'     => $bobotsutongrading,
                'status'                => $status,
                'id_user'               => $id_user,
                'proses'                => $proses,
            );
        };

        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil ditambahkan!",

        );

        $this->session->set_flashdata($notif);

        $this->model_inputsutongrading->input($input, 'barang_sutongrading');
        redirect('Inputsutongrading/index_edit');
    }


    public function edit_data()
    {
        $id     = $this->input->post('id');

        $result = $this->model_inputsutongrading->edit($id, 'view_sutongrading');

        echo json_encode($result);
    }


    public function update()
    {
        $id_barangdatang        = $this->input->post('id_barangdatang');
        $tanggalsutongrading    = $this->input->post('tanggalsutongrading');
        $bobotmasuksut          = $this->input->post('bobotmasuk');
        $MB                     = $this->input->post('MB');
        $BB                     = $this->input->post('BB');
        $PB                     = $this->input->post('PB');
        $L2                     = $this->input->post('L2');
        $L3                     = $this->input->post('L3');
        $PBK                    = $this->input->post('PBK');
        $ELV                    = $this->input->post('ELV');
        $varietas               = $this->input->post('varietas');
        $status                 = $this->input->post('status');
        $id_user                = $this->input->post('id_user');
        $bobotsutongrading      = $MB + $BB + $PB + $L2 + $L3 + $PBK + $ELV ;
        $kodesutongrading       = SUT_. $varietas . $bobotsutongrading . $tanggalsutongrading ;
        

            $where  = array('id_barangdatang'       => $id_barangdatang);
            $edit   = array('kodesutongrading'      => $kodesutongrading,
                            'tanggalsutongrading'   => $tanggalsutongrading,
                            'bobotmasuksut'         => $bobotmasuksut,
                            'MB'                    => $MB,
                            'BB'                    => $BB,
                            'PB'                    => $PB,
                            'L2'                    => $L2,
                            'L3'                    => $L3,
                            'PBK'                   => $PBK,
                            'ELV'                   => $ELV,
                            'bobotsutongrading'     => $bobotsutongrading,
                            'status'            => $status,
                            'id_user'           => $id_user,

                );
        $notif  = array('status'    => "berhasil",
                        'message'   => "Data berhasil diperbaharui!",

        );

        var_dump($edit, $where);

        $this->session->set_flashdata($notif);
        $this->model_inputsutongrading->update($where, $edit, 'barang_sutongrading');
        
        redirect('Inputsutongrading/index_edit');
    }


    public function hapus($id_barangdatang)
    {
        $notif  = array(
            'status'    => "hapus",
            'message'   => "Data berhasil dihapus!",
        );

        $hapus  = array('id_barangdatang' => $id_barangdatang);

        $this->session->set_flashdata($notif);
        $this->model_inputsutongrading->hapus('barang_sutongrading',$hapus);
        redirect('Inputsutongrading/index_edit');
    }
}
