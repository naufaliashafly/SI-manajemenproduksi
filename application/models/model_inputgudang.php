<?php

class model_inputgudang extends CI_Model
{

    public function get($query)
    {
        $this->db->select('
            barang_gudang.id_gudangproses,
            barang_datang.id_barangdatang,
            letakgudang.id_letakgudang,
            jenisolahan.id_jenisolahan,
            gudang_ready.id_gudangready
            ');
        $this->db->from('barang_gudang');
        $this->db->join('gudang_ready', 'barang_datang.id_barangdatang=gudang_ready.id_barangdatang');
        $this->db->join('barang_datang', 'barang_datang.id_barangdatang=barang_gudang.id_barangdatang');
        $this->db->join('letakgudang', 'letakgudang.id_letakgudang=barang_gudang.id_letakgudang');
        $this->db->join('jenisolahan', 'jenisolahan.id_jenisolahan=barang_gudang.id_jenisolahan');

        return $this->db->get($query);
    }


    public function input($input, $query)
    {
        $this->db->insert_batch($query, $input);
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
        $this->db->delete('barang_gudang');
    }


    public function tampil_kodebarang2()
    {
        $query = $this->db->query("
        SELECT barang_datang.id_barangdatang, kodebarang, (CASE WHEN kodecshp IS NULL THEN kodesutongrading ELSE kodecshp END) AS kode, (CASE WHEN bobotcshp IS NULL THEN bobotsutongrading ELSE bobotcshp END) AS bobot, kodesutongrading, kodecshp, jenisolahan
        FROM barang_datang
        LEFT JOIN barang_cshp ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang
        LEFT JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang
        WHERE
        barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_datang WHERE id_statusbarangdatang='3' UNION SELECT barang_datang.id_barangdatang FROM barang_datang INNER JOIN barang_huller ON barang_huller.id_barangdatang=barang_datang.id_barangdatang UNION SELECT barang_datang.id_barangdatang FROM barang_datang INNER JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang UNION SELECT barang_datang.id_barangdatang FROM barang_datang INNER JOIN barang_cshp ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang) AND
        barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_gudang)
        ORDER BY kodecshp, kodesutongrading, kodebarang
        ");
        return $query->result();  
    }


    public function tabel_edit()
    {
        $query = $this->db->query("
            SELECT barang_gudang.id_barangdatang, letakgudang, kodebarang, jenisolahan, bobot, nama, barang_gudang.status
            FROM barang_gudang
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_gudang.id_barangdatang
            INNER JOIN letakgudang ON letakgudang.id_letakgudang=barang_gudang.id_letakgudang
            INNER JOIN user ON user.id_user=barang_gudang.id_user
            WHERE 
            barang_gudang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_ready)
            ORDER BY letakgudang
            ");

        return $query->result();
    }


    // public function tampil_kodebarangready()
    // {
    //     $query = $this->db->query("
    //         SELECT
    //         barang_datang.id_barangdatang, kodebarang, kodecshp
    //         FROM
    //         barang_datang
    //         INNER JOIN datang_cshp ON datang_cshp.id_barangdatang = barang_datang.id_barangdatang
    //         INNER JOIN barang_cshp ON datang_cshp.id_cshp = barang_cshp.id_barangcshp
    //         WHERE
    //         barang_datang.id_barangdatang IN (SELECT barang_datang.id_barangdatang FROM barang_datang INNER JOIN datang_cshp ON datang_cshp.id_barangdatang = barang_datang.id_barangdatang INNER JOIN barang_cshp ON datang_cshp.id_cshp = barang_cshp.id_barangcshp INNER JOIN barang_blending ON barang_blending.id_barangcshp = barang_cshp.id_barangcshp) AND
    //         barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM gudang_ready)
    //     ");
    //     return $query->result();  
    // }


    public function tampil_jenisolahan()
    {
       $query = $this->db->query('SELECT * FROM jenisolahan');
        return $query->result();  
    }


    public function tampil_letakgudang()
    {
       $query = $this->db->query('SELECT * FROM letakgudang');
        return $query->result();  
    }
}
