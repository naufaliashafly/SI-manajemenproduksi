<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputbarangmasuk extends CI_Controller
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
        $this->load->model('model_inputbarangmasuk');
        $this->load->model('model_tabelvarblok');
        $this->load->helper('url');
    }

    public function input()
    {
        $data = array(  'header'            => 'Input Data Barang Masuk | FRINSA',
                        'judul'             => 'INPUT DATA | Barang Masuk',
                        'user'              => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),

                    );
        $isi = array(   'dd_varietas'       => $this->model_inputbarangmasuk->ambil('varietas'),
                        'dd_blokmitra'      => $this->model_inputbarangmasuk->ambil('blokmitra'),
                        'dd_jenisolahan'    => $this->model_inputbarangmasuk->jenisolahan(),
                        'dd_statusdatang'   => $this->model_inputbarangmasuk->ambil('statusbarangdatang'),
                        'stok'              => $this->model_inputbarangmasuk->tabel_stok(),
                        'edit'              => $this->model_inputbarangmasuk->tabel_edit(),
                    );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/input_barang_masuk', $isi);
        $this->load->view('templates/footer');
    }


    public function index_edit()
    {
        $data = array(  'header'            => 'Stok-Edit Data Barang Masuk | FRINSA',
                        'judul'             => 'EDIT & STOK | Barang Masuk',
                        'user'              => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),

                    );
        $isi = array(   'dd_varietas'       => $this->model_inputbarangmasuk->ambil('varietas'),
                        'dd_blokmitra'      => $this->model_inputbarangmasuk->ambil('blokmitra'),
                        'dd_jenisolahan'    => $this->model_inputbarangmasuk->jenisolahan(),
                        'dd_statusdatang'   => $this->model_inputbarangmasuk->ambil('statusbarangdatang'),
                        'stok'              => $this->model_inputbarangmasuk->tabel_stok(),
                        'edit'              => $this->model_inputbarangmasuk->tabel_edit(),
                    );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stokedit/edit_barang_masuk', $isi);
        $this->load->view('templates/footer');
    }


    public function proses()
    {
        $varietas       = $this->input->post('varietas');
        $blokmitra      = $this->input->post('blokmitra');
        $statusdatang   = $this->input->post('statusdatang');
        $jenisolahan    = $this->input->post('jenisolahan');
        $tanggaldatang  = $this->input->post('tanggaldatang');
        $bobotdatang    = $this->input->post('bobotdatang');
        $kadarairawal   = $this->input->post('kadarairawal');
        $kodebarang     = $varietas. $blokmitra . $bobotdatang . $tanggaldatang ;
        $id_user        = $this->input->post('id_user');
        $status         = $this->input->post('status');
        $proses         = $this->input->post('proses');

        $input = array( 'id_statusbarangdatang' => $statusdatang,
                        'varietas'              => $varietas,
                        'blokmitra'             => $blokmitra,
                        'jenisolahan'           => $jenisolahan,
                        'kodebarang'            => $kodebarang,
                        'tanggaldatang'         => $tanggaldatang,
                        'bobotdatang'           => $bobotdatang,
                        'kadarairawal'          => $kadarairawal,
                        'id_user'               => $id_user,
                        'status'                => $status,
                        'proses'                => $proses,
        );

        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil ditambahkan!",

        );

        $this->session->set_flashdata($notif);

        $this->model_inputbarangmasuk->input($input, 'barang_datang');
        redirect('Inputbarangmasuk/index_edit');
    }

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
            redirect('Inputbarangmasuk/input');
        } else {
            $notif          = array(
                'status'    => "berhasilvar",
                'message'   => " Varietas " . $varietas . " berhasil disimpan!",
            );

            $this->model_tabelvarblok->tambah_varietas($tambah, 'varietas');
            $this->session->set_flashdata($notif);

            redirect('Inputbarangmasuk/input');
        }
    }
       

    public function tambah_blok()
    {
        $blokmitra  = $this->input->post('tambahblokmitra');
        $tambah     = array('blokmitra' => $blokmitra);
        $cek        = $this->model_tabelvarblok->cek_blok($blokmitra, 'blokmitra');

        if ($cek->num_rows() > 0) {
            $notif  = array('status'    => "gagalblok",
                            'message'   => "Blokm/Mitra " . $blokmitra . " sudah ada", );

            $this->session->set_flashdata($notif);
            redirect('Inputbarangmasuk/input');

        } else {
            $notif  = array('status'    => "berhasilblok",
                            'message'   => "Blokm/Mitra " . $blokmitra . " berhasil disimpan", );

            $this->model_tabelvarblok->tambah_blok($tambah, 'blokmitra');
            $this->session->set_flashdata($notif);

            redirect('Inputbarangmasuk/input');
        }
    }


    public function edit_data()
    {
        $id     = $this->input->post('id');

        $result = $this->model_inputbarangmasuk->edit($id, 'barang_datang');

        echo json_encode($result);
    }


    public function update()
    {
        $id_barangdatang    = $this->input->post('id_barangdatang');
        $kadarairawal       = $this->input->post('kadarairawal');
        $jenisolahan        = $this->input->post('jenisolahan');
        $varietas           = $this->input->post('varietas');
        $blokmitra          = $this->input->post('blokmitra');
        $tanggaldatang      = $this->input->post('tanggaldatang');
        $bobotdatang        = $this->input->post('bobotdatang');
        $kodebarang         = $varietas. $blokmitra . $bobotdatang . $tanggaldatang ;
        $status             = $this->input->post('status');
        $id_user            = $this->input->post('id_user');

        $where  = array('id_barangdatang'   => $id_barangdatang);
        $edit   = array('kodebarang'        => $kodebarang,
                        'jenisolahan'       => $jenisolahan,
                        'tanggaldatang'     => $tanggaldatang,
                        'bobotdatang'       => $bobotdatang,
                        'kadarairawal'      => $kadarairawal,
                        'id_user'           => $id_user,
                        'status'            => $status,
                );
        $notif  = array('status'            => "berhasil",
                        'message'           => "Data berhasil diperbaharui!",

        );

        $this->session->set_flashdata($notif);
        $this->model_inputbarangmasuk->update($where, $edit,  'barang_datang');
        
        redirect('Inputbarangmasuk/index_edit');
    }


    public function hapus($id_barangdatang)
    {
        $notif  = array(
            'status'    => "hapus",
            'message'   => "Data berhasil dihapus!",
        );

        $hapus  = array('id_barangdatang' => $id_barangdatang);

        $this->session->set_flashdata($notif);
        $this->model_inputbarangmasuk->hapus('barang_datang',$hapus);
        redirect('Inputbarangmasuk/index_edit');
    }
}