<?php

class model_inputcshp extends CI_Model
{

    public function get($query)
    {
        $this->db->select('
            barang_datang.kodebarang,
            barang_datang.id_barangdatang,
            barang_cshp.tanggalcshp,
            barang_kering.tanggalkering,
            barang_kering.bobotkering');
        $this->db->from('barang_datang');
        $this->db->join('barang_cshp', 'barang_cshp.id_barangdatang=barang_datang.id_barangdatang');
        $this->db->join('barang_jemur', 'barang_jemur.id_barangdatang=barang_datang.id_barangdatang');
        $this->db->join('barang_kering', 'barang_kering.id_barangjemur=barang_jemur.id_barangjemur');

        return $this->db->get($query);
    }


    public function tampil_kodebarang()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, kodesutongrading, id_barangsutongrading, jenisolahan.jenisolahan,  bobotsutongrading, (CASE WHEN bobotsutongrading IS NULL THEN bobotdatang ELSE bobotsutongrading END) AS bobot
            FROM barang_datang            
            LEFT JOIN barang_huller ON barang_huller.id_barangdatang=barang_datang.id_barangdatang
            LEFT JOIN jenisolahan ON jenisolahan.jenisolahan=barang_datang.jenisolahan
            LEFT JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang 
            WHERE
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_datang WHERE id_statusbarangdatang='3' UNION SELECT id_barangdatang FROM barang_sutongrading) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur WHERE id_barangjemur NOT IN (SELECT id_barangjemur FROM barang_kering)) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur WHERE id_barangjemur IN (SELECT id_barangdatang FROM barang_jemur) AND id_barangjemur NOT IN (SELECT id_barangjemur FROM barang_kering)) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur WHERE id_barangjemur IN (SELECT id_barangjemur FROM barang_kering) AND id_barangdatang NOT IN(SELECT barang_huller.id_barangdatang FROM barang_huller INNER JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang=barang_huller.id_barangdatang)) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_cshp)
            ORDER BY id_barangdatang ASC

            ");

        return $query->result(); 
    }


    public function tabel_edit()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, kodesutongrading, kodecshp, tanggalcshp, barang_cshp.bobotmasukcshp, barang_cshp.bobotcshp, 100*(bobotcshp/bobotmasukcshp) AS rendemencshp, jenisolahan.jenisolahan
            FROM barang_datang
            LEFT JOIN jenisolahan ON jenisolahan.jenisolahan=barang_datang.jenisolahan 
            LEFT JOIN barang_cshp ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang
            LEFT JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang
            WHERE
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_cshp)
            ORDER BY barang_datang.id_barangdatang DESC
            ");
         
        return $query->result();
    }


    public function tabel_stok()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodecshp, tanggalcshp, barang_cshp.bobotmasukcshp, barang_cshp.bobotcshp, ROUND(100*(bobotcshp/bobotmasukcshp), 2) AS rendemencshp, jenisolahan.jenisolahan, nama, barang_cshp.status
            FROM barang_datang
            LEFT JOIN jenisolahan ON jenisolahan.jenisolahan=barang_datang.jenisolahan
            LEFT JOIN barang_cshp ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang
            LEFT JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang
            INNER JOIN user ON user.id_user=barang_cshp.id_user
            WHERE
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_cshp) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_ready)
            GROUP BY kodecshp
            ORDER BY barang_datang.id_barangdatang DESC
            ");
         
        return $query->result();
    }


    public function tampil_kodesuton()
    {
       $query = $this->db->query("SELECT * FROM barang_sutongrading");

        return $query->result(); 
    }


    public function tampil_varietas()
    {
       $query = $this->db->query("SELECT * FROM varietas");

        return $query->result(); 
    }


    public function input($input, $query)
    {
        $this->db->insert_batch($query, $input);
    }


    public function view($qdata)
    {
        $this->db->select('*');
        $this->db->from('view_barangcshp');

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
        $this->db->delete('barang_cshp');
    }
}
