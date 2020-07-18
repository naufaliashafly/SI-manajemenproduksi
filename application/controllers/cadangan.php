<?php

public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek=$this->model_login->cek($username, $password);

        var_dump($cek); die;

        if($cek > 0){ 
            if ($cek['id_userrole']=='1') { //MANAJER
                $data = array(
                    'id'        => $cek->id_user,
                    'nama'      => $cek->nama,
                    'username'  => $cek->username,
                    'role'      => $cek->id_userrole,
                );

                $this->session->set_userdata($data);
                redirect('inputbaranghuller');
            } elseif ($cek['id_userrole']=='3') { //SPV
                $spv = array(
                    'id'        => $cek->id_user,
                    'nama'      => $cek->nama,
                    'username'  => $cek->username,
                    'role'      => $cek->id_userrole,
                );

                $this->session->set_userdata($spv);
                redirect('inputbaranghuller');
            } else { //staff
                $staff = array(
                    'id'        => $cek->id_user,
                    'nama'      => $cek->nama,
                    'username'  => $cek->username,
                    'role'      => $cek->id_userrole,
                );

                $this->session->set_userdata($staff);
                redirect('inputbaranghuller');
            }

        } else {
            $notif = array(
                'status' => "gagal",
                'message' => "Password atau Username salah!",
            );
            $this->session->set_flashdata($notif);
            redirect('login');
        }

    }