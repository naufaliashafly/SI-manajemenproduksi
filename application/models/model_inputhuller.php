<?php

class model_inputhuller extends CI_Model
{

    public function get($query)
    {
        $this->db->select('barang_datang.id_barangdatang, barang_datang.id_statusbarangdatang, barang_kering.tanggalkering, bobotkering, tanggalmasukjemuran');
        $this->db->join('barang_datang');
        $this->db->join('barang_jemur', 'barang_jemur.id_barangjemur=barang_datang.id_barangjemur');
        $this->db->join('barang_kering', 'barang_kering.id_barangkering=barang_jemur.id_barangkering');

        return $this->db->get($query);
    }


    public function ambil()
    {
        $query = $this->db->query("
            SELECT id_barangdatang, kodebarang
            FROM barang_datang
            WHERE
            id_barangdatang IN (SELECT id_barangdatang FROM barang_datang WHERE id_statusbarangdatang='2' UNION SELECT id_barangdatang FROM barang_jemur WHERE id_barangjemur IN (Select id_barangjemur FROM barang_kering)) AND
            id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur WHERE id_barangjemur IN (SELECT id_barangjemur FROM barang_jemur) AND id_barangjemur NOT IN (SELECT id_barangjemur FROM barang_kering)) AND
            id_barangdatang NOT IN (SELECT barang_jemur.id_barangdatang FROM barang_huller INNER JOIN barang_jemur ON barang_jemur.id_barangdatang=barang_huller.id_barangdatang) AND
            id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_huller) AND
            id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_sutongrading)
            ");
           
        return $query->result();
    }


    public function tabel_stok()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, jenisolahan.jenisolahan, tanggalhuller, barang_huller.bobotmasukhull, barang_huller.bobothuller, ROUND(100*(bobothuller/bobotmasukhull), 2) AS rendemenhuller, nama, barang_huller.status
            FROM barang_huller
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_huller.id_barangdatang
            INNER JOIN jenisolahan ON jenisolahan.jenisolahan=barang_datang.jenisolahan
            INNER JOIN user ON user.id_user=barang_huller.id_user
            WHERE
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_huller) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_sutongrading UNION SELECT id_barangdatang FROM barang_cshp)
            ORDER BY barang_datang.id_barangdatang DESC
            ");
           
        return $query->result();
    }


    public function tabel_edit()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, jenisolahan, tanggalhuller, barang_huller.bobotmasukhull, barang_huller.bobothuller, 100*(bobothuller/bobotmasukhull) AS rendemenhuller
            FROM barang_huller
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_huller.id_barangdatang
            WHERE
            barang_datang.id_barangdatang IN (SELECT id_barangdatang FROM barang_huller)
            ORDER BY barang_datang.id_barangdatang DESC
            ");
           
        return $query->result();
    }


    public function input($input, $query)
    {
        $this->db->insert($query, $input);
    }


    public function getkode($qkode)
    {
        $this->db->select('
            barang_datang.kodebarang,
            barang_jemur.id_barangdatang,
            barang_kering.tanggalkering,
            barang_kering.bobotkering');
        $this->db->from('barang_jemur');
        $this->db->join('barang_datang', 'barang_datang.id_barangdatang=barang_jemur.id_barangdatang');
        $this->db->join('barang_kering', 'barang_kering.id_barangkering=barang_jemur.id_barangkering');

        return $this->db->get($qkode);
    }


    // function ambilkode($id, $qkode)
    // {
    //     $this->db->where('id_barangjemur', $id);
    //     return $this->db->get($qkode);
    // }


    function ambilkode($id){
        $hasil=$this->db->query("SELECT * FROM barang_jemur WHERE id_barangjemur='$id'");
        return $hasil->result();
    }


    function jenisolahan(){
        $hasil=$this->db->query("SELECT * FROM jenisolahan");
        return $hasil->result();
    }


    public function view($qdata)
    {
        $this->db->select('*');
        $this->db->from('view_baranghuller');

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
        $this->db->delete('barang_huller');
    }


    function get_kering($id, $query)
    {
        $this->db->where('id_barangdatang', $id);
        return $this->db->get($query)->row_array();
    }
}
