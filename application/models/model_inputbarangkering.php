<?php

class model_inputbarangkering extends CI_Model
{

    public function getold($query)
    {
        $this->db->select('barang_jemur.id_barangjemur, barang_kering.id_barangkering');
        $this->db->from('barang_jemur');
        $this->db->join('barang_kering', 'barang_jemur=id_barangjemur=barang_kering=id_barangjemur');

        return $this->db->get($query);
    }


    public function ambil()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, tanggaldatang, bobotdatang, tanggalmasukjemuran, id_barangjemur 
            FROM barang_datang
            LEFT JOIN barang_jemur ON barang_jemur.id_barangdatang=barang_datang.id_barangdatang
            WHERE
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_jemur) AND
            barang_datang.id_barangdatang NOT IN (SELECT barang_jemur.id_barangdatang FROM barang_kering INNER JOIN barang_jemur ON barang_jemur.id_barangjemur=barang_kering.id_barangjemur)
            ");

            return $query->result();
    }


    public function tabel_edit()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, tanggalmasukjemuran, tanggalkering, barang_kering.bobotkering, ROUND(100*(bobotkering/bobotdatang), 2) AS rendemenkering, jenisolahan.jenisolahan, barang_datang.bobotdatang, barang_kering.id_barangjemur, barang_kering.status, nama
            FROM barang_datang
            LEFT JOIN barang_jemur ON barang_jemur.id_barangdatang=barang_datang.id_barangdatang
            LEFT JOIN barang_kering ON barang_kering.id_barangjemur=barang_jemur.id_barangjemur
            LEFT JOIN jenisolahan ON barang_datang.jenisolahan=jenisolahan.jenisolahan
            INNER JOIN user ON user.id_user=barang_kering.id_user
            WHERE
            barang_datang.id_barangdatang IN (SELECT barang_datang.id_barangdatang FROM barang_jemur INNER JOIN barang_datang on barang_datang.id_barangdatang=barang_jemur.id_barangdatang INNER JOIN barang_kering ON barang_kering.id_barangjemur=barang_jemur.id_barangjemur) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_huller UNION SELECT id_barangdatang FROM barang_sutongrading UNION SELECT id_barangdatang FROM barang_cshp)
            ORDER BY barang_datang.id_barangdatang DESC
            ");

            return $query->result();
    }


    public function tabel_stok()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, barang_kering.id_barangjemur, kodebarang, tanggalmasukjemuran, tanggalkering, barang_datang.bobotdatang, barang_kering.bobotkering, 100*(bobotkering/bobotdatang) AS rendemenkering, jenisolahan.jenisolahan
            FROM barang_datang
            LEFT JOIN barang_jemur ON barang_jemur.id_barangdatang=barang_datang.id_barangdatang
            LEFT JOIN barang_kering ON barang_kering.id_barangjemur=barang_jemur.id_barangjemur
            LEFT JOIN jenisolahan ON barang_datang.jenisolahan=jenisolahan.jenisolahan
            
            WHERE
            barang_datang.id_barangdatang IN (SELECT barang_datang.id_barangdatang FROM barang_jemur INNER JOIN barang_datang on barang_datang.id_barangdatang=barang_jemur.id_barangdatang INNER JOIN barang_kering ON barang_kering.id_barangjemur=barang_jemur.id_barangjemur)
            ORDER BY barang_datang.id_barangdatang DESC
            ");

            return $query->result();
    }


    public function input($input, $query)
    {
        $this->db->insert($query, $input);
    }


    public function view($qdata)
    {
        $this->db->select('*');
        $this->db->from('view_barangkering');

        return $this->db->get($qdata);
    }


    function edit($id, $qdata)
    {
        $this->db->where('id_barangjemur', $id);
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
        $this->db->delete('barang_kering');
    }
}
