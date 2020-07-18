<?php

class model_user extends CI_Model
{
    public function get($query)
    {
        return $this->db->get($query);
    }


    public function ambil()
    {
        $query = $this->db->query("
            SELECT id_user, nama, username, HP, password, role, (CASE WHEN is_active = '1' THEN 'aktif' ELSE 'tidak aktif' END) AS is_active
            FROM `user`
            INNER JOIN user_role ON user_role.id_userrole=user.id_userrole
            ");
         
        return $query->result();
    }


    function ambil_user($id, $query)
    {
        $this->db->where('id_user', $id);
        return $this->db->get($query)->row_array();
    }


    public function role()
    {
        $query = $this->db->query("
            SELECT *
            FROM user_role
            ");
         
        return $query->result();
    }    


    public function input($input, $query)
    {
        $this->db->insert($query, $input);
    }


    public function hapus($query, $hapus)
    {

        $this->db->where($hapus);
        $this->db->delete('user');
    }


    function update($where, $edit, $query)
    {
        $this->db->where($where);
        $this->db->update($query, $edit);
    }
}
