<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layoutlantaijemur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_layoutlantaijemur');
        $this->load->helper('url');
    }

   public function index()
    {
        $data   = array (
                'header'       => 'Layout Lantai Jemur',
                'judul'        => 'Lantai Jemur >',
                'sub_judul'    => 'Layout lantai jemur',
                'sub'          => '',
                'user'         => 'admin',
                'ke'           => $this->model_layoutlantaijemur->tampil_kering(),
                'ka'           => $this->model_layoutlantaijemur->tampil_ka(),
                'tka'          => $this->model_layoutlantaijemur->tampil_tka(),
                'A1'           => $this->model_layoutlantaijemur->get_posisi(1),
                'A1k'          => $this->model_layoutlantaijemur->get_status_kering(1),
                'A2'           => $this->model_layoutlantaijemur->get_posisi(2),
                'A2k'          => $this->model_layoutlantaijemur->get_status_kering(2),
                'A3'           => $this->model_layoutlantaijemur->get_posisi(3),
                'A3k'          => $this->model_layoutlantaijemur->get_status_kering(3),
                'A4'           => $this->model_layoutlantaijemur->get_posisi(4),
                'A4k'          => $this->model_layoutlantaijemur->get_status_kering(4),
                'A5'           => $this->model_layoutlantaijemur->get_posisi(5),
                'A5k'          => $this->model_layoutlantaijemur->get_status_kering(5),
                'A6'           => $this->model_layoutlantaijemur->get_posisi(6),
                'A6k'          => $this->model_layoutlantaijemur->get_status_kering(6),
                'B1'           => $this->model_layoutlantaijemur->get_posisi(7),
                'B1k'          => $this->model_layoutlantaijemur->get_status_kering(7),
                'B2'           => $this->model_layoutlantaijemur->get_posisi(8),
                'B2k'          => $this->model_layoutlantaijemur->get_status_kering(8),
                'B3'           => $this->model_layoutlantaijemur->get_posisi(9),
                'B3k'          => $this->model_layoutlantaijemur->get_status_kering(9),
                'B4'           => $this->model_layoutlantaijemur->get_posisi(10),
                'B4k'          => $this->model_layoutlantaijemur->get_status_kering(10),
                'B5'           => $this->model_layoutlantaijemur->get_posisi(11),
                'B5k'          => $this->model_layoutlantaijemur->get_status_kering(11),
                'B6'           => $this->model_layoutlantaijemur->get_posisi(12),
                'B6k'          => $this->model_layoutlantaijemur->get_status_kering(12),
                'C1'           => $this->model_layoutlantaijemur->get_posisi(13),
                'C1k'          => $this->model_layoutlantaijemur->get_status_kering(13),
                'C2'           => $this->model_layoutlantaijemur->get_posisi(14),
                'C3k'          => $this->model_layoutlantaijemur->get_status_kering(14),
                'C3'           => $this->model_layoutlantaijemur->get_posisi(15),
                'C3k'          => $this->model_layoutlantaijemur->get_status_kering(15),
                'C4'           => $this->model_layoutlantaijemur->get_posisi(16),
                'C4k'          => $this->model_layoutlantaijemur->get_status_kering(16),
                'C5'           => $this->model_layoutlantaijemur->get_posisi(17),
                'C5k'          => $this->model_layoutlantaijemur->get_status_kering(17),
                'C6'           => $this->model_layoutlantaijemur->get_posisi(18),
                'C6k'          => $this->model_layoutlantaijemur->get_status_kering(18),
                'D1'           => $this->model_layoutlantaijemur->get_posisi(19),
                'D1k'          => $this->model_layoutlantaijemur->get_status_kering(19),
                'D2'           => $this->model_layoutlantaijemur->get_posisi(20),
                'D2k'          => $this->model_layoutlantaijemur->get_status_kering(20),
                'D3'           => $this->model_layoutlantaijemur->get_posisi(21),
                'D3k'          => $this->model_layoutlantaijemur->get_status_kering(21),
                'D4'           => $this->model_layoutlantaijemur->get_posisi(22),
                'D4k'          => $this->model_layoutlantaijemur->get_status_kering(22),
                'D5'           => $this->model_layoutlantaijemur->get_posisi(23),
                'D5k'          => $this->model_layoutlantaijemur->get_status_kering(23),
                'D6'           => $this->model_layoutlantaijemur->get_posisi(24),
                'D6k'          => $this->model_layoutlantaijemur->get_status_kering(24),
                'E1'           => $this->model_layoutlantaijemur->get_posisi(25),
                'E1k'          => $this->model_layoutlantaijemur->get_status_kering(25),
                'E2'           => $this->model_layoutlantaijemur->get_posisi(26),
                'E2k'          => $this->model_layoutlantaijemur->get_status_kering(26),
                'E3'           => $this->model_layoutlantaijemur->get_posisi(27),
                'E3k'          => $this->model_layoutlantaijemur->get_status_kering(27),
                'E4'           => $this->model_layoutlantaijemur->get_posisi(28),
                'E4k'          => $this->model_layoutlantaijemur->get_status_kering(28),
                'E5'           => $this->model_layoutlantaijemur->get_posisi(29),
                'E5k'          => $this->model_layoutlantaijemur->get_status_kering(29),
                'E6'           => $this->model_layoutlantaijemur->get_posisi(30),
                'E6k'          => $this->model_layoutlantaijemur->get_status_kering(30),
                'F1'           => $this->model_layoutlantaijemur->get_posisi(31),
                'F1k'          => $this->model_layoutlantaijemur->get_status_kering(31),
                'F2'           => $this->model_layoutlantaijemur->get_posisi(32),
                'F2k'          => $this->model_layoutlantaijemur->get_status_kering(32),
                'F3'           => $this->model_layoutlantaijemur->get_posisi(33),
                'F3k'          => $this->model_layoutlantaijemur->get_status_kering(33),
                'F4'           => $this->model_layoutlantaijemur->get_posisi(34),
                'F4k'          => $this->model_layoutlantaijemur->get_status_kering(34),
                'F5'           => $this->model_layoutlantaijemur->get_posisi(35),
                'F5k'          => $this->model_layoutlantaijemur->get_status_kering(35),
                'F6'           => $this->model_layoutlantaijemur->get_posisi(36),
                'F6k'          => $this->model_layoutlantaijemur->get_status_kering(36),
                );

        $this->load->view('templates/header', $data);
        $this->load->view('lantaijemur/layout', $data);
        $this->load->view('templates/footer');
    }


    public function kering()
    {
        $id     = $this->input->post('id');

        $result = $this->model_layoutlantaijemur->ambil_jemur($id, 'barang_jemur');

        echo json_encode($result);
    }


    public function ka()
    {
        $id     = $this->input->post('id');

        $result = $this->model_layoutlantaijemur->ambil_jemur($id, 'barang_jemur');

        echo json_encode($result);
    }










     public function proses()
    {
        $this->model_inputkadarair->input();
        // redirect('laporan');
    }
}
