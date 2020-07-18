<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('model_user');
        $this->load->helper('url');
	}


	public function user()
	{
		$data 	= array('header' => 'Kelola Pengguna | FRINSA',
						'judul'  => 'KELOLA PENGGUNA | Admin',
                        'user'   => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row(),
                    );

		$isi 	= array('user'   		=> $this->model_user->ambil(),
						'dd_jabatan'	=> $this->model_user->role(),
					);


		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user', $isi);
        $this->load->view('templates/footer');
	}


	public function proses()
	{
		$nama       	= $this->input->post('nama');
		$username   	= $this->input->post('username');
		$jabatan   		= $this->input->post('jabatan');
		$HP  			= $this->input->post('HP');
		$password   	= $this->input->post('password');

		$input = array( 'id_userrole'   => $jabatan,
						'nama' 			=> $nama,
						'username'      => $username,
						'HP'            => $HP,
						'password'      => $password,
					);

		$notif  = array('status'            => "berhasilvar",
                        'message'           => "User berhasil ditambahkan!",

        );

        $this->session->set_flashdata($notif);

		$this->model_user->input($input, 'user');
		redirect('user/user');
	}


	public function edit()
    {
        $id     = $this->input->post('id');

        $result = $this->model_user->ambil_user($id, 'view_user');

        echo json_encode($result);
    }


    public function update()
    {

    	$id_user       	= $this->input->post('id_user');
        $nama       	= $this->input->post('nama');
		$username   	= $this->input->post('username');
		$jabatan   		= $this->input->post('jabatan');
		$HP  			= $this->input->post('HP');
		$password   	= $this->input->post('password');


        $where  = array('id_user'   	=> $id_user);
		$edit 	= array( 'id_userrole'  => $jabatan,
						'nama' 			=> $nama,
						'username'      => $username,
						'HP'            => $HP,
						'password'      => $password,
					);


        $notif  = array('status'        => "berhasilvar",
                        'message'       => "User berhasil diperbaharui!",

        );

        $this->session->set_flashdata($notif);
        $this->model_user->update($where, $edit, 'user');
        
        redirect('user/user');
    }


	public function hapus($user)
    {
        $notif  = array(
            'status'    => "hapusvar",
            'message'   => "User berhasil dihapus!",
        );

        $hapus  = array('id_user' => $user);

        $this->session->set_flashdata($notif);
        $this->model_user->hapus('user',$hapus);
        redirect('user/user');
    }
}
