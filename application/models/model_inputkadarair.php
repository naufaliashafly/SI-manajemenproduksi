<?php

class model_inputkadarair extends CI_Model
{

    public function get($query)
    {
        $this->db->select('
            barang_jemur.id_barangjemur,
            input_kadar_air.harike,
            input_kadar_air.kadarair
            ');
        $this->db->from('input_kadar_air');
        $this->db->join('barang_jemur', 'barang_jemur.id_barangjemur=input_kadar_air.id_barangjemur');

        return $this->db->get($query);
    }


    public function input($input, $query)
    {
        $this->db->insert($query, $input);
    }


    public function get_id($id)
    {
        $query = $this->db->query("
            SELECT
            barang_jemur.id_barangjemur,
            posisibarang.posisibarang,
            jenisolahan.jenisolahan,
            barang_jemur.tanggalmasukjemuran,
            input_kadar_air.harike,
            input_kadar_air.kadarair

            FROM barang_jemur
            INNER JOIN posisibarang ON posisibarang.id_posisibarang = barang_jemur.id_posisibarang
            INNER JOIN jenisolahan ON jenisolahan.id_jenisolahan = barang_jemur.id_jenisolahan
            INNER JOIN input_kadar_air ON input_kadar_air.id_barangjemur = barang_jemur.id_barangjemur

            WHERE barang_jemur.id_barangjemur
            LIKE '$id'
             
            ");

            // var_dump($query); die;
           return $query->result();
    }


}
