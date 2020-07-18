<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabelvarblok extends CI_Controller
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
        $this->load->model('model_tabelvarblok');
        $this->load->helper('url');
    }

    public function input()
    {
        $data   = array(
                    'header'    => 'Tabel Varietas dan Blok/Mitra | FRINSA',
                    'judul'     => 'IDENTITAS BARANG | Tabel Varietas dan Blok/Mitra',
                    'user'      => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                );
        $isi    = array(
                    'varietas'      => $this->model_tabelvarblok->varietas('varietas')->result(),
                    'blokmitra'     => $this->model_tabelvarblok->blokmitra('blokmitra')->result(), );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tabel_varblok', $isi);
        $this->load->view('templates/footer');
    }


////VARIETAS////

    public function tambah_var()
    {
        $varietas   = $this->input->post('tambahvarietas');
        $tambah     = array('varietas' => $varietas);
        
        $cek        = $this->model_tabelvarblok->cek_var($varietas, 'varietas');

        if ($cek->num_rows() > 0) {
            $notif          = array(
                'status'    => "gagalvar",
                'message'   => " Varietas " . $varietas . " sudah ada!",
            );

            $this->session->set_flashdata($notif);
            redirect('tabelvarblok/input');
        } else {
            $notif          = array(
                'status'    => "berhasilvar",
                'message'   => " Varietas " . $varietas . " berhasil disimpan!",
            );

            $this->model_tabelvarblok->tambah_varietas($tambah, 'varietas');
            $this->session->set_flashdata($notif);

            redirect('tabelvarblok/input');
        }
    }


    public function edit_var()
    {
        $id     = $this->input->post('id');

        $result = $this->model_tabelvarblok->ambil_var($id, 'varietas');

        echo json_encode($result);
    }


    public function update_var()
    {
        $id_varietas    = $this->input->post('idv');
        $varietas       = $this->input->post('varietas');

        $where  = array('id_varietas'   => $id_varietas);
        $edit   = array('varietas'      => $varietas);
        $notif  = array('status'        => "berhasilvar",
                        'message'       => "Varietas berhasil diperbaharui!",

        );

        $this->session->set_flashdata($notif);
        $this->model_tabelvarblok->update_var($where, $edit, 'varietas');
        
        redirect('tabelvarblok/input');
    }


    public function hapus_var($varietas)
    {
        $notif  = array(
            'status'    => "hapusvar",
            'message'   => "Varietas berhasil dihapus!",
        );

        $hapus  = array('varietas' => $varietas);

        $this->session->set_flashdata($notif);
        $this->model_tabelvarblok->hapus_var('varietas',$hapus);
        redirect('tabelvarblok/input');
    }


////BLOK/MITRA////

    public function tambah_blok()
    {
        $blokmitra  = $this->input->post('tambahblokmitra');
        $tambah     = array('blokmitra' => $blokmitra);
        $cek        = $this->model_tabelvarblok->cek_blok($blokmitra, 'blokmitra');

        if ($cek->num_rows() > 0) {
            $notif  = array(
                'status'    => "gagalblok",
                'message'   => "Blokm/Mitra " . $blokmitra . " sudah ada",
            );

            $this->session->set_flashdata($notif);
            redirect('tabelvarblok/input');

        } else {
            $notif  = array(
                'status'    => "berhasilblok",
                'message'   => "Blokm/Mitra " . $blokmitra . " berhasil disimpan",
            );

            $this->model_tabelvarblok->tambah_blok($tambah, 'blokmitra');
            $this->session->set_flashdata($notif);

            redirect('tabelvarblok/input');
        }
    }

    public function edit_blok()
    {
        $id     = $this->input->post('id');

        $result = $this->model_tabelvarblok->ambil_blok($id, 'blokmitra');

        echo json_encode($result);
    }


    public function update_blok()
    {
        $id_blokmitra   = $this->input->post('idb');
        $blokmitra      = $this->input->post('blokmitra');

        $where  = array('id_blokmitra'  => $id_blokmitra);
        $edit   = array('blokmitra'     => $blokmitra);
        $notif  = array('status'        => "berhasilblok",
                        'message'       => "Blok/Mitra berhasil diperbaharui!",

        );

        $this->session->set_flashdata($notif);
        $this->model_tabelvarblok->update_blok($where, $edit, 'blokmitra');
        
        redirect('tabelvarblok/input');
    }


    public function hapus_blok($blokmitra)
    {
        $notif  = array(
            'status'    => "hapusblok",
            'message'   => "Blok/Mitra berhasil dihapus!",
        );

        $hapus  = array('blokmitra' => $blokmitra);

        $this->session->set_flashdata($notif);
        $this->model_tabelvarblok->hapus_blok('blokmitra',$hapus);
        redirect('tabelvarblok/input');
    }
}