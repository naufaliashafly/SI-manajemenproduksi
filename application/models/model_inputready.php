<?php

class model_inputready extends CI_Model
{

    public function get($query)
    {
        $this->db->select('
            barang_gudang.id_gudangproses,
            barang_datang.id_barangdatang,
            letakgudang.id_letakgudang,
            jenisolahan.id_jenisolahan,
            statusbarang.id_statusbarang,
            gudang_ready.id_gudangready
            ');
        $this->db->from('barang_gudang');
        $this->db->join('gudang_ready', 'barang_datang.id_barangdatang=gudang_ready.id_barangdatang');
        $this->db->join('barang_datang', 'barang_datang.id_barangdatang=barang_gudang.id_barangdatang');
        $this->db->join('letakgudang', 'letakgudang.id_letakgudang=barang_gudang.id_letakgudang');
        $this->db->join('jenisolahan', 'jenisolahan.id_jenisolahan=barang_gudang.id_jenisolahan');
        $this->db->join('statusbarang', 'statusbarang.id_statusbarang=barang_gudang.id_statusbarang');

        return $this->db->get($query);
    }


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
        $this->db->delete('barang_ready');
    }


    public function tampil_kodebarang2()
    {
        $query = $this->db->query("
        SELECT barang_datang.id_barangdatang, tanggaldatang, kodebarang, kodecshp, bobotcshp, barang_cshp.proses AS proses
        FROM barang_datang
        LEFT JOIN barang_cshp ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang
        LEFT JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang
        WHERE
        barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_cshp UNION SELECT barang_gudang.id_barangdatang FROM barang_gudang INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_gudang.id_barangdatang INNER JOIN barang_cshp ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang) AND
        barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_ready)
        ORDER BY tanggaldatang DESC
        ");
        return $query->result();  
    }


    public function tabel_edit()
    {
        $query = $this->db->query("
            SELECT barang_ready.id_barangdatang, barang_ready.id_barangdatang, barang_datang.varietas, barang_datang.jenisolahan, tanggaldatang, bobot, nama, barang_ready.status
            FROM barang_ready
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_ready.id_barangdatang
            INNER JOIN user ON user.id_user=barang_ready.id_user
            WHERE barang_ready.id_barangdatang IN (SELECT id_barangdatang FROM barang_ready WHERE id_statusready='1') 
            ORDER BY tanggaldatang
            ");

        return $query->result();
    }
}
