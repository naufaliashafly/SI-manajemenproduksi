<?php

class model_pesanan extends CI_Model
{

    public function get($query)
    {
       $query = $this->db->query('SELECT * FROM `pesanan`');
       return $this->db->get($query); 
    }

	public function input($input, $query)
    {
        $this->db->insert($query, $input);
        return $this->db->insert_id();
    }
    
    public function barang($isi,$query)
    {
        $this->db->insert_batch($query,$isi);
    }

    public function tabel1()
    {
    	$query = $this->db->query('SELECT * FROM `view_stokhitung`');
        return $query->result();
    }


    public function tabel()
    {
    	$query = $this->db->query('SELECT * FROM `view_stokproses` WHERE varietas="ADS" AND jenisolahan="FW"');
        return $query->result();
    }


    // function edit($varietas, $query)
    // {
    //     $this->db->where('id', $varietas);
    //     return $this->db->get($query)->row_array();
    // }

    function edit($varietas, $query)
    {
        $this->db->where($varietas);

        return $this->db->get($query)->row_array();
    }


    function cari($where, $query)
    {
        $this->db->where($where);

        return $this->db->get($query)->result();

    }


    public function pesan()
    {
        $query = $this->db->query('
            SELECT id_pesanan, kodepesan, tanggalpesan, bobotpesan
            FROM pesanan
            ');
        return $query->result();
    }


    function kodepesan($id, $query)
    {
        $this->db->where('id_pesanan', $id);
        return $this->db->get($query)->result();
    }
}