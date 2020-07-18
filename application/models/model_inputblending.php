<?php

class model_inputblending extends CI_Model
{

    public function get($query)
    {
        $query = $this->db->query("
            SELECT 
            id_barangblending,
            id_barangcshp  
            FROM barang_blending
            INNER JOIN barang_cshp ON barang_cshp.id_barangcshp=barang_blending.id_barangcshp
            ");

           return $this->db->get($query);
    }


    public function tampil_kodebarang()
    {
        $query = $this->db->query("
            SELECT
            barang_datang.id_barangdatang, kodebarang, kodecshp, id_barangcshp
            FROM
            barang_datang
            INNER JOIN barang_cshp ON barang_cshp.id_barangdatang = barang_datang.id_barangdatang
            WHERE
            barang_datang.id_barangdatang IN (SELECT barang_datang.id_barangdatang FROM barang_cshp INNER JOIN barang_datang ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang) AND
            barang_datang.id_barangdatang NOT IN(SELECT barang_datang.id_barangdatang FROM barang_datang INNER JOIN barang_cshp ON barang_cshp.id_barangdatang = barang_datang.id_barangdatang INNER JOIN barang_blending ON barang_blending.id_barangdatang = barang_datang.id_barangdatang)
             
            ");

           return $query->result();
    }


    public function tabel()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, kodeblending, tanggalblending, bobotblending
            FROM barang_blending
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_blending.id_barangdatang
            ");

           return $query->result();
    }


    public function tampil_varietas()
    {
       $query = $this->db->query("SELECT * FROM varietas");

        return $query->result(); 
    }


    public function input($input, $query)
    {
        $this->db->insert($query, $input);
    }


    public function view($qdata)
    {
        $this->db->select('*');
        $this->db->from('view_barangblending');

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
        $this->db->delete('barang_blending');
    }


 //    public function tampil_kodebarang()
 //    {
 //       $query = $this->db->query('SELECT * FROM barang_datang');
 //        return $query->result();  
	// }
	

	// public function tampil_kering($id)
	// {
	// 	$query = $this->db->query("
	// 		SELECT
	// 		barang_kering.tanggalkering,
	// 		barang_kering.bobotkering

	// 		FROM barang_jemur
	// 		INNER JOIN barang_kering ON barang_kering.id_barangjemur = barang_jemur.id_barangjemur
	// 		INNER JOIN barang_datang ON barang_datang.id_barangdatang = barang_jemur.id_barangdatang
			
	// 		WHERE barang_datang.id_barangdatang
	// 		LIKE '$data'


	// 		");
		
	// 	return $query->result();
	// }

}
