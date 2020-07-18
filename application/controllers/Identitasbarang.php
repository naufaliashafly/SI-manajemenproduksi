<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitasbarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_identitasbarang');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->form_validation->set_rules('varietas', 'Varietas', 'required');
        $this->form_validation->set_rules('blokmitra', 'Blokmitra', 'required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Input Identitas Barang';
            $data['sub_judul'] = '';
            $this->load->view('templates/header', $data);
            $this->load->view('identitas_barang');
            $this->load->view('templates/footer', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Gagal!</div>');
        } else {
            $varietas = $this->input->post('varietas');
            $blokmitra = $this->input->post('blokmitra');
            $tanggal = $this->input->post('tanggal');
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $tanggaldatang = $tahun . $bulan . $tanggal;
            $bobot = $this->input->post('bobot');
            $kadarairawal = $this->input->post('kadarairawal');
            $kodebarang = $varietas . $blokmitra . $tanggaldatang . $bobot;

            $data = array(

                'varietas' => $varietas,
                'blokmitra' => $blokmitra,
                'tanggaldatang' => $tanggaldatang,
                'bobotdatang' => $bobot,
                'kadarairawal' => $kadarairawal,
                'kodebarang' => $kodebarang,

            );


            $this->model_inputbarangmasuk->input_data_barang($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan!</div>');
            redirect('laporan');
        }
    }
}
