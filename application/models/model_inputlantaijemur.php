<?php

class model_inputlantaijemur extends CI_Model
{

    public function get($query)
    {
        $this->db->select('barang_datang.id_barangdatang, barang_datang.kodebarang, posisibarang.posisibarang, posisibarang.id_posisibarang, jenisolahan.jenisolahan, ');
        $this->db->from('barang_jemur');
        $this->db->join('posisibarang', 'posisibarang.id_posisibarang=barang_jemur.id_posisibarang');
        $this->db->join('barang_datang', 'barang_datang.id_barangdatang=barang_jemur.id_barangdatang');
        $this->db->join('jenisolahan', 'jenisolahan.jenisolahan=barang_datang.jenisolahan');

        return $this->db->get($query);
    }


    public function kodebarang()
    {
        $query = $this->db->query("
            SELECT id_barangdatang, kodebarang, jenisolahan.jenisolahan
            FROM barang_datang
            INNER JOIN jenisolahan ON jenisolahan.jenisolahan=barang_datang.jenisolahan
            WHERE id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur) AND
            id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_huller) AND
            id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_sutongrading) AND
            id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_cshp)
            ");
         
        return $query->result();
    }


    public function tabel_stok()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, tanggalmasukjemuran, jenisolahan.jenisolahan, posisibarang.id_posisibarang, posisibarang, nama, barang_jemur.status
            FROM barang_datang
            LEFT JOIN barang_jemur ON barang_jemur.id_barangdatang=barang_datang.id_barangdatang
            LEFT JOIN jenisolahan ON jenisolahan.jenisolahan=barang_datang.jenisolahan
            LEFT JOIN posisibarang ON posisibarang.id_posisibarang=barang_jemur.id_posisibarang
            INNER JOIN user ON user.id_user=barang_jemur.id_user
            WHERE
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_jemur) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_huller UNION SELECT id_barangdatang FROM barang_sutongrading UNION SELECT id_barangdatang FROM barang_cshp) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur INNER JOIN barang_kering ON barang_kering.id_barangjemur=barang_jemur.id_barangjemur)
            ORDER BY barang_datang.id_barangdatang DESC
            ");
         
        return $query->result();
    }


    public function tabel_edit()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, tanggalmasukjemuran, jenisolahan.jenisolahan, posisibarang.id_posisibarang, posisibarang
            FROM barang_datang
            LEFT JOIN barang_jemur ON barang_jemur.id_barangdatang=barang_datang.id_barangdatang
            LEFT JOIN jenisolahan ON jenisolahan.jenisolahan=barang_datang.jenisolahan
            LEFT JOIN posisibarang ON posisibarang.id_posisibarang=barang_jemur.id_posisibarang
            WHERE
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_jemur)
            ORDER BY barang_datang.id_barangdatang DESC
            ");
         
        return $query->result();
    }


    public function ambil($query)
    {
        $r = $this->db->get($query);
        
        return $r->result();
    }


    public function input($input, $query)
    {
        $this->db->insert($query, $input);
    }


    public function view($qdata)
    {
        $this->db->select('*');
        $this->db->from('view_barangjemur');

        return $this->db->get($qdata);
    }


    function edit($id, $qdata)
    {
        $this->db->where('id_barangdatang', $id);
        return $this->db->get($qdata)->row_array();
    }


    function update($where, $edit, $query)
    {
        $this->db->where($where);
        $this->db->update($query, $edit);
    }


    public function hapus($query, $hapus)
    {
        $this->db->where($hapus);
        $this->db->delete('barang_jemur');
    }
}
