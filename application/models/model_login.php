<?php

class model_login extends CI_Model
{

    public function getlogin($username, $password)
    {
        $this->db->select('id_user, username, nama, password, id_userrole');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result();
        $count = count($result);
        if ($count == 1) {
            return $result;
        } else {
            $this->session->set_flashdata('info', '<center>Maaf Username atau Password Salah</center>');
            redirect('login');
        }
    }


    // public function cek($username, $password)
    // {
    //     $query = $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    //     return $query->result();
    // }
}
