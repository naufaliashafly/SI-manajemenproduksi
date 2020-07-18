<?php

class model_tabelvarblok extends CI_Model
{

///// VARIETAS /////

    public function varietas($qvar)
    {
        return $this->db->get($qvar);
    }


    public function hapus_var($qvar, $hapus)
    {

        $this->db->where($hapus);
        $this->db->delete('varietas');
    }


    public function cek_var($varietas, $qvar)
    {
        $this->db->where('varietas', $varietas);
        return $this->db->get($qvar);
    }


    public function tambah_varietas($tambah, $qvar)
    {
        $this->db->insert($qvar, $tambah);
    }


    function ambil_var($id, $qvar)
    {
        $this->db->where('id_varietas', $id);
        return $this->db->get($qvar)->row_array();
    }


    function update_var($where, $edit, $qvar)
    {
        $this->db->where($where);
        $this->db->update($qvar, $edit);
    }




///// BLOK/MITRA /////

    public function blokmitra($qblok)
    {
        return $this->db->get($qblok);
    }


    public function hapus_blok($qblok, $hapus)
    {
        $this->db->where($hapus);
        $this->db->delete('blokmitra');
    }


    public function cek_blok($blokmitra, $qblok)
    {
        $this->db->where('blokmitra', $blokmitra);
        return $this->db->get($qblok);
    }


    public function tambah_blok($tambah, $qblok)
    {
        $this->db->insert($qblok, $tambah);
    }


    function ambil_blok($id, $qblok)
    {
        $this->db->where('id_blokmitra', $id);
        return $this->db->get($qblok)->row_array();
    }


    function update_blok($where, $edit, $qblok)
    {
        $this->db->where($where);
        $this->db->update($qblok, $edit);
    }

}