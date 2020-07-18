<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('model_login');
        $this->load->helper('url');
	}


	public function index()
	{
		$data   = array('header' => 'Login | FRINSA', );

		$this->load->view('templates/header_reg', $data);
		$this->load->view('login');
		$this->load->view('templates/footer');
	}


	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

        $user = $this->db->get_where('user', ['password' => $password])->row_array();
        //user terdaftar
        if ($user) {
            if ($user > 0) {
                $data = [
                    'id_user' 		=> $user['id_user'],
                    'nama'			=> $user['nama'],
                    'username' 		=> $user['username'],
                    'id_userrole' 	=> $user['id_userrole'],
                    'role'          => $user['role'],
                    'logged_in'     => TRUE,
                ];
                $this->session->set_userdata($data);
                //cek role
                if ($user['id_userrole'] == 1) {
                    redirect('home/home');
                } elseif ($user['id_userrole'] == 3) {
                    redirect('home/home');
                } elseif ($user['id_userrole'] == 4) {
                    redirect('home/home');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username atau password salah</div>');
                redirect('login');
            }

            //tidak terdaftar
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
            redirect('login');
        }
	}


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_userrole');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Username anda berhasil logout</div>');
        redirect('login');
    }
}
