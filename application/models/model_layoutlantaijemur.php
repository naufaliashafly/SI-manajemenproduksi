<?php

class model_layoutlantaijemur extends CI_Model
{

    public function get_posisi($data){
        $query = $this->db->query("
            SELECT
            barang_jemur.id_barangjemur,
            barang_datang.id_barangdatang,
            posisibarang.id_posisibarang,
            posisibarang.posisibarang,
            jenisolahan.jenisolahan,
            barang_datang.kodebarang,
            barang_jemur.tanggalmasukjemuran,
            barang_datang.kadarairawal,
            barang_datang.tanggaldatang,
            barang_datang.bobotdatang


            FROM barang_jemur
            INNER JOIN posisibarang ON posisibarang.id_posisibarang = barang_jemur.id_posisibarang
            INNER JOIN jenisolahan ON jenisolahan.id_jenisolahan = barang_jemur.id_jenisolahan
            INNER JOIN barang_datang ON barang_datang.id_barangdatang = barang_jemur.id_barangdatang 
            
            WHERE barang_jemur.id_posisibarang
            LIKE '$data'
            ");

            // var_dump($query); die;
           return $query->result();
        
    }
    

    public function get_status_kering($data){
        $query = $this->db->query("
            SELECT
            posisibarang.posisibarang,
            barang_kering.id_barangjemur,
            jenisolahan.jenisolahan,
            barang_datang.kodebarang,
            barang_jemur.tanggalmasukjemuran,
            barang_datang.kadarairawal

            FROM barang_jemur
            INNER JOIN posisibarang ON posisibarang.id_posisibarang = barang_jemur.id_posisibarang
            INNER JOIN jenisolahan ON jenisolahan.id_jenisolahan = barang_jemur.id_jenisolahan
            INNER JOIN barang_datang ON barang_datang.id_barangdatang = barang_jemur.id_barangdatang 
            INNER JOIN barang_kering ON barang_kering.id_barangjemur = barang_jemur.id_barangjemur 

            WHERE barang_jemur.id_posisibarang
            LIKE '$data'
            ");

        $ndata = $query->num_rows();
        if ($ndata == true){
            return false;
        } else {
            return true;
        }

            //return $query->result();

    }


    public function get($qjemur){
        $this->db->select('
            barang_datang.kodebarang,
            barang_datang.kadarairawal,
            barang_jemur.tanggalmasukjemuran,
            barang_jemur.id_barangjemur');
        $this->db->join('barang_datang', 'barang_datang.id_barangdatang = barang_jemur.id_barangdatang 
            ');
        $this->db->join('jenisolahan', 'jenisolahan.id_jenisolahan = barang_jemur.id_jenisolahan');
        $this->db->join('posisibarang','posisibarang.id_posisibarang = barang_jemur.id_posisibarang');

        return $this->db->get($qjemur);        
    }


    public function ambil_jemur($id, $qjemur)
    {
        $this->db->where('id_barangjemur', $id);
        return $this->db->get($qjemur)->row_array();
    }


        public function tampil_kering()
    {
        $query = $this->db->query("
            SELECT
            barang_datang.kodebarang,
            barang_datang.kadarairawal,
            barang_jemur.tanggalmasukjemuran
           
            FROM barang_jemur
            INNER JOIN barang_datang ON barang_datang.id_barangdatang = barang_jemur.id_barangdatang
            INNER JOIN jenisolahan ON jenisolahan.id_jenisolahan = barang_jemur.id_jenisolahan
            INNER JOIN posisibarang ON posisibarang.id_posisibarang = barang_jemur.id_posisibarang
            WHERE barang_jemur.id_barangjemur
            LIKE 16


            ");

        // var_dump($query); die;
        return $query->result();
    }


        public function input_kering()
    {
        // $id_barangjemur        = $this->input->post('id_barangjemur');
        $tanggalkering         = $this->input->post('tanggalkering');
        $bobotkering           = $this->input->post('bobotkering');

        $param = array(
            // 'id_barangjemur'         => $id_barangjemur,
            'tanggalkering'          => $tanggalkering,
            'bobotkering'            => $bobotkering,
        );
        // var_dump($param); die;

        $this->db->insert('barang_kering', $param);
    }

    public function tampil_ka()
    {
        $query = $this->db->query("
            SELECT
            barang_datang.kodebarang,
            barang_datang.kadarairawal,
            barang_jemur.tanggalmasukjemuran
            
            FROM barang_datang
            INNER JOIN barang_jemur ON barang_jemur.id_barangdatang = barang_datang.id_barangdatang
            WHERE barang_jemur.id_barangjemur
            LIKE 16


            ");

        //var_dump($query); die;
        return $query->result();
    }


     public function tampil_tka()
    {
        $query = $this->db->query("
            SELECT *
            FROM input_kadar_air
            WHERE input_kadar_air.id_barangjemur
            LIKE 16


            ");

        //var_dump($query); die;
        return $query->result();
    }
    


    public function input_ka()
    {
        // $id_barangjemur        = $this->input->post('id_barangjemur');
        $harike             = $this->input->post('harike');
        $kadarair           = $this->input->post('kadarair');

        $param = array(
            // 'id_barangjemur'         => $id_barangjemur,
            'harike'              => $harike,
            'kadarair'            => $kadarair,
        );
        // var_dump($param); die;

        $this->db->insert('input_kadar_air', $param);
    }



    
            
    
}
