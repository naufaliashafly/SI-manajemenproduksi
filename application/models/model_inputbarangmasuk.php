<?php

class model_inputbarangmasuk extends CI_Model
{

    public function get($query)
    {
        $this->db->select('
            barang_datang.*,
            varietas.varietas,
            blokmitra.blokmitra,
            statusbarangdatang.statusbarangdatang,
            statusbarangdatang.id_statusbarangdatang');
        $this->db->from('barang_datang');
        $this->db->join('statusbarangdatang', 'statusbarangdatang.id_statusbarangdatang=barang_datang.id_statusbarangdatang');
        $this->db->join('varietas', 'varietas.varietas=barang_datang.varietas');
        $this->db->join('jenisolahan', 'jenisolahan.jenisolahan=barang_datang.jenisolahan');
        $this->db->join('varietas', 'varietas.varietas=barang_datang.varietas');
        $this->db->join('blokmitra', 'blokmitra.blokmitra=barang_datang.blokmitra');

        return $this->db->get($query);
    }


    public function ambil($query)
    {
        $ambil = $this->db->get($query);
        return $ambil->result() ;
    }


    public function jenisolahan()
    {
       $query = $this->db->query("SELECT * FROM jenisolahan");

        return $query->result(); 
    }


    public function tabel_stok()
    {
        $query = $this->db->query("
            SELECT *, statusbarangdatang, nama 
            FROM barang_datang
            LEFT JOIN statusbarangdatang ON statusbarangdatang.id_statusbarangdatang=barang_datang.id_statusbarangdatang
            INNER JOIN user ON user.id_user=barang_datang.id_user
            WHERE 
            id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur UNION SELECT id_barangdatang FROM barang_huller UNION SELECT id_barangdatang FROM barang_sutongrading UNION SELECT id_barangdatang FROM barang_cshp)
            ORDER BY tanggaldatang DESC
            ");

        return $query->result();
    }


    public function tabel_edit()
    {
        $query = $this->db->query("
            SELECT *, statusbarangdatang 
            FROM barang_datang
            INNER JOIN jenisolahan ON jenisolahan.jenisolahan=barang_datang.jenisolahan
            LEFT JOIN statusbarangdatang ON statusbarangdatang.id_statusbarangdatang=barang_datang.id_statusbarangdatang
            ORDER BY tanggaldatang DESC
            ");

        return $query->result();
    }


    public function input($input, $query)
    {
        $this->db->insert($query, $input);
    }


    function edit($id, $query)
    {
        $this->db->where('id_barangdatang', $id);
        return $this->db->get($query)->row_array();
    }


    function update($where, $edit, $query)
    {
        $this->db->where($where);
        $this->db->update($query, $edit);
    }


    public function hapus($query, $hapus)
    {
        $this->db->where($hapus);
        $this->db->delete('barang_datang');
    }    
}
