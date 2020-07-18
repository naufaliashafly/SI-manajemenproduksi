<?php

class model_inputsutongrading extends CI_Model
{

    public function get($query)
    {
        $this->db->select('
            barang_datang.kodebarang,
            barang_datang.id_barangdatang,
            barang_datang.id_statusbarangdatang,
            barang_sutongrading.bobotmasuksut');
        $this->db->from('barang_datang');
        $this->db->join('barang_sutongrading', 'barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang');   

        return $this->db->get($query);
    }


    public function ambil()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, jenisolahan.jenisolahan, (CASE WHEN bobothuller IS NULL THEN bobotdatang ELSE bobothuller END) AS bobot
            FROM barang_datang
            LEFT JOIN barang_huller ON barang_huller.id_barangdatang=barang_datang.id_barangdatang
            LEFT JOIN jenisolahan ON jenisolahan.jenisolahan=barang_datang.jenisolahan
            WHERE
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_datang WHERE id_statusbarangdatang='3' UNION SELECT id_barangdatang FROM barang_huller) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur WHERE id_barangjemur NOT IN (SELECT id_barangjemur FROM barang_kering)) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_sutongrading UNION SELECT id_barangdatang FROM barang_cshp) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur WHERE id_barangjemur IN (SELECT id_barangjemur FROM barang_kering) AND id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_huller))
            ORDER BY tanggaldatang ASC
            ");
           
        return $query->result();
    }


    public function tampil_varietas()
    {
       $query = $this->db->query("SELECT * FROM varietas");

        return $query->result(); 
    }


    public function kodesuton()
    {
       $query = $this->db->query("SELECT * FROM view_sutongrading");

        return $query->result(); 
    }


    public function input($input, $query)
    {
        $this->db->insert_batch($query, $input);
    }


    public function tabel_stok()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodesutongrading, tanggalsutongrading, barang_sutongrading.bobotmasuksut, barang_sutongrading.MB, barang_sutongrading.BB, barang_sutongrading.PB, barang_sutongrading.L2, barang_sutongrading.L3, barang_sutongrading.PBK, barang_sutongrading.ELV, barang_sutongrading.bobotsutongrading, ROUND(100*(bobotsutongrading/bobotmasuksut), 2) AS rendemensutongrading, nama, barang_sutongrading.status
            FROM barang_datang
            LEFT JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang
            INNER JOIN user ON user.id_user=barang_sutongrading.id_user
            WHERE 
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_sutongrading) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_cshp)
            Group BY kodesutongrading
            ORDER BY tanggalsutongrading
            ");
           
        return $query->result();
    }


    public function tabel_edit()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, tanggalsutongrading, barang_sutongrading.bobotmasuksut, barang_sutongrading.MB, barang_sutongrading.BB, barang_sutongrading.PB, barang_sutongrading.L2, barang_sutongrading.L3, barang_sutongrading.PBK, barang_sutongrading.ELV, barang_sutongrading.bobotsutongrading, 100*(bobotsutongrading/bobotmasuksut) AS rendemensutongrading, kodesutongrading
            FROM barang_datang
            LEFT JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang
            WHERE 
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_sutongrading)
            ");
           
        return $query->result();
    }


    public function view($qdata)
    {
        $this->db->select('*');
        $this->db->from('view_sutongrading');

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
        $this->db->delete('barang_sutongrading');
    }
}
