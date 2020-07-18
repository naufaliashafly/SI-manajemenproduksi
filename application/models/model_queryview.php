<?php

class model_queryview extends CI_Model
{

    ///buat bikin query get stok gudang
    public function view_groupgudang()
    {
        $query = $this->db->query("
            SELECT * 
            FROM barang_gudang
            WHERE id_barangdatang NOT IN (SELECT barang_gudang.id_barangdatang FROM barang_gudang INNER JOIN barang_ready ON barang_gudang.id_barangdatang=barang_ready.id_barangdatang)
            GROUP BY id_letakgudang, Bobot
            ORDER BY id_baranggudang
            ");
           
        return $query->result();
    }


    public function view_datanghuller()
    {
        $query = $this->db->query("
            SELECT barang_jemur.id_barangdatang, bobotkering
            FROM barang_jemur
            INNER JOIN barang_kering ON barang_kering.id_barangjemur=barang_jemur.id_barangjemur
            ");
           
        return $query->result();
    }


    public function view_barangjemur()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, kodebarang, tanggalmasukjemuran, posisibarang, jenisolahan
            FROM barang_datang
            LEFT JOIN barang_jemur ON barang_jemur.id_barangdatang=barang_datang.id_barangdatang
            LEFT JOIN posisibarang ON posisibarang.id_posisibarang=barang_jemur.id_posisibarang
            ");
           
        return $query->result();
    }


    public function view_baranghuller()
    {
        $query = $this->db->query("
            SELECT barang_huller.id_barangdatang, kodebarang, tanggalhuller, bobotmasukhull, bobothuller
            FROM barang_huller
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_huller.id_barangdatang
            ");
           
        return $query->result();
    }


    public function view_barangcshp()
    {
        $query = $this->db->query("
            SELECT barang_cshp.id_barangdatang, kodebarang, tanggalcshp, bobotmasukcshp, bobotcshp 
            FROM barang_cshp
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_cshp.id_barangdatang
            ");
           
        return $query->result();
    }


    public function view_gudang()
    {
        $query = $this->db->query("
            SELECT barang_gudang.id_barangdatang, kodebarang, letakgudang, bobot
            FROM barang_gudang
            INNER JOIN letakgudang ON letakgudang.id_letakgudang=barang_gudang.id_letakgudang
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_gudang.id_barangdatang
            ");
           
        return $query->result();
    }


    public function view_ready()
    {
        $query = $this->db->query("
            SELECT barang_ready.id_barangdatang, kodebarang, bobot
            FROM barang_ready
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_ready.id_barangdatang
            ");
           
        return $query->result();
    }


    public function grafik()
    {
        $query = $this->db->query("
            SELECT blokmitra, barang_datang.varietas, tanggaldatang, bobotcshp, bobotmasukcshp, bobotcshp, AVG(100*(bobotcshp/bobotmasukcshp)) AS rendemencshp, MONTHNAME(tanggaldatang) AS bulan
            FROM barang_datang
            INNER JOIN barang_cshp ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang
            GROUP BY kodecshp
            ORDER BY blokmitra, varietas, tanggaldatang
            ");
           
        return $query->result();
    }


    public function view_sutongrading()
    {
        $query = $this->db->query("
            SELECT barang_sutongrading.id_barangdatang, barang_sutongrading.varietas, kodebarang, kodesutongrading, tanggalsutongrading, bobotmasuksut, MB, BB, PB, L2, L3, PBK, ELV  
            FROM barang_sutongrading
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_sutongrading.id_barangdatang
            ");
           
        return $query->result();
    }


    ///buat bikin stok gabah
    public function view_stokgabah()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, barang_datang.varietas, jenisolahan, bobotkering AS bobotall, proses
            FROM barang_kering
            INNER JOIN barang_jemur ON barang_jemur.id_barangjemur=barang_kering.id_barangjemur
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_jemur.id_barangdatang
            WHERE
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_huller)

            UNION

            SELECT barang_datang.id_barangdatang, barang_datang.varietas, jenisolahan, bobotdatang AS bobot, proses
            FROM barang_datang
            WHERE
            id_statusbarangdatang='2' AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_huller)
            ORDER BY varietas, jenisolahan
            ");
           
        return $query->result();
    }


    public function view_stokjemur()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, barang_datang.varietas, jenisolahan, bobotdatang AS bobotall, proses
            FROM barang_jemur
            INNER JOIN barang_datang ON barang_jemur.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur INNER JOIN barang_kering ON barang_kering.id_barangjemur=barang_jemur.id_barangjemur)
            ORDER BY varietas
            ");

        return $query->result();
    }


    public function view_stokgb()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, barang_datang.varietas, jenisolahan, bobotdatang AS bobotall, proses
            FROM barang_datang
            WHERE
            id_statusbarangdatang='3' AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_sutongrading UNION SELECT id_barangdatang FROM barang_cshp UNION SELECT id_barangdatang FROM barang_ready)

            UNION

            SELECT barang_datang.id_barangdatang, barang_datang.varietas, jenisolahan, bobotsutongrading AS bobotall, barang_sutongrading.proses
            FROM barang_sutongrading
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_sutongrading.id_barangdatang
            WHERE
            barang_sutongrading.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_cshp)


            UNION

            SELECT barang_datang.id_barangdatang, barang_datang.varietas, jenisolahan, bobotcshp AS bobotall, barang_cshp.proses
            FROM barang_cshp
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_cshp.id_barangdatang
            WHERE
            barang_cshp.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_ready)

            UNION

            SELECT barang_datang.id_barangdatang, barang_datang.varietas, jenisolahan, bobothuller AS bobotall, barang_huller.proses
            FROM barang_huller
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_huller.id_barangdatang
            WHERE
            barang_huller.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_sutongrading)
            ORDER BY varietas, jenisolahan
            ");

        return $query->result();
    }


    public function view_stokhuller()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, barang_datang.varietas, jenisolahan, SUM(bobotmasukhull) AS bobotall
            FROM barang_huller
            INNER JOIN barang_datang ON barang_huller.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_sutongrading UNION SELECT id_barangdatang FROM barang_cshp)
            GROUP BY varietas, jenisolahan
            ORDER BY varietas
            ");

        return $query->result();
    }


    public function view_stoksuton()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, barang_datang.varietas, jenisolahan, SUM(bobotmasuksut) AS bobotall
            FROM barang_sutongrading
            INNER JOIN barang_datang ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_cshp)
            GROUP BY varietas, jenisolahan
            ORDER BY varietas
            ");

        return $query->result();
    }


    public function view_stokcshp()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang, barang_datang.varietas, jenisolahan, SUM(bobotmasukcshp) AS bobotall
            FROM barang_cshp
            INNER JOIN barang_datang ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_ready)
            GROUP BY varietas, jenisolahan
            ORDER BY varietas
            ");

        return $query->result();
    }


    public function view_stokhitung()
    {
        $query = $this->db->query("
            SELECT id, varietas, jenisolahan, 
            SUM(CASE WHEN proses = 'Jemur' AND  THEN bobotall ELSE 0 END) AS bobotjemur,
            SUM(CASE WHEN proses = 'Huller' THEN bobotall ELSE 0 END) AS bobothuller,
            SUM(CASE WHEN proses = 'Suton+Grading' THEN bobotall ELSE 0 END) AS bobotsuton,
            SUM(CASE WHEN proses = 'CS+HP' THEN bobotall ELSE 0 END) AS bobotcshp,
            SUM(CASE WHEN proses = 'ready' THEN bobotall ELSE 0 END) AS bobotready
            FROM view_stokproses
            GROUP BY varietas, jenisolahan
            ");

        return $query->result();
    }


    public function view_stokproses()
    {
        $query = $this->db->query("
            SELECT barang_datang.id_barangdatang AS id, barang_datang.proses, barang_datang.varietas, jenisolahan, SUM(bobotdatang) AS bobotall 
            FROM barang_jemur
            INNER JOIN barang_datang ON barang_jemur.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur INNER JOIN barang_kering ON barang_kering.id_barangjemur=barang_jemur.id_barangjemur) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM pesanan_barang)
            GROUP BY varietas, jenisolahan
            
            UNION
            
            SELECT barang_datang.id_barangdatang AS id, barang_huller.proses, barang_datang.varietas, jenisolahan, SUM(bobotmasukhull) AS bobotall
            FROM barang_huller
            INNER JOIN barang_datang ON barang_huller.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_sutongrading UNION SELECT id_barangdatang FROM barang_cshp) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM pesanan_barang)
            GROUP BY varietas, jenisolahan
            
            UNION
            
            SELECT barang_datang.id_barangdatang AS id, barang_sutongrading.proses, barang_datang.varietas, jenisolahan, SUM(bobotmasuksut) AS bobotall 
            FROM barang_sutongrading
            INNER JOIN barang_datang ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_cshp) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM pesanan_barang)
            GROUP BY varietas, jenisolahan
            
            UNION
            
            SELECT barang_datang.id_barangdatang AS id, barang_cshp.proses, barang_datang.varietas, jenisolahan, SUM(bobotmasukcshp) AS bobotall
            FROM barang_cshp
            INNER JOIN barang_datang ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_ready) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM pesanan_barang)
            GROUP BY varietas, jenisolahan
            ORDER BY varietas
        
            ");

        return $query->result();
    }


    public function view_cekbox()
    {
        $query = $this->db->query("
            SELECT barang_datang.varietas, jenisolahan, barang_jemur.id_barangdatang, kodebarang, bobotdatang, proses 
            FROM barang_jemur
            INNER JOIN barang_datang ON barang_jemur.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_jemur INNER JOIN barang_kering ON barang_kering.id_barangjemur=barang_jemur.id_barangjemur) AND barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM pesanan_barang)

            UNION

            SELECT barang_datang.varietas, jenisolahan, barang_huller.id_barangdatang, kodebarang, bobotmasukhull, barang_huller.proses
            FROM barang_huller
            INNER JOIN barang_datang ON barang_huller.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_sutongrading UNION SELECT id_barangdatang FROM barang_cshp) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM pesanan_barang)

            UNION

            SELECT barang_datang.varietas, jenisolahan, barang_sutongrading.id_barangdatang, kodesutongrading, bobotmasuksut, barang_sutongrading.proses 
            FROM barang_sutongrading
            INNER JOIN barang_datang ON barang_sutongrading.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_cshp) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM pesanan_barang)
            
            UNION

            SELECT barang_datang.varietas, jenisolahan, barang_cshp.id_barangdatang, kodecshp, bobotmasukcshp, barang_cshp.proses
            FROM barang_cshp
            INNER JOIN barang_datang ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang
            WHERE barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_ready) AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM pesanan_barang)
            
            UNION

            SELECT barang_datang.varietas, jenisolahan, barang_ready.id_barangdatang, kodebarang, bobot, statusready.status AS proses
            FROM barang_ready
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_ready.id_barangdatang
            INNER JOIN statusready ON statusready.id_statusready=barang_ready.id_statusready 
            WHERE barang_ready.id_statusready='1' AND
            barang_datang.id_barangdatang NOT IN (SELECT id_barangdatang FROM pesanan_barang)

            ORDER BY proses
            ");

        return $query->result();
    }


    public function view_stokhitung()
    {
        $query = $this->db->query("
            SELECT barang_gudang.id_barangdatang, barang_datang.varietas, barang_datang.jenisolahan, bobot
            FROM barang_gudang
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_gudang.id_barangdatang
            WHERE barang_gudang.id_barangdatang NOT IN (SELECT id_barangdatang FROM barang_ready)
            ");

        return $query->result();
    }


    public function view_gudang()
    {
        $query = $this->db->query("
            SELECT barang_gudang.id_barangdatang, kodebarang, letakgudang, bobot
            FROM barang_gudang
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_gudang.id_barangdatang
            INNER JOIN letakgudang ON letakgudang.id_letakgudang=barang_gudang.id_letakgudang
            ");

        return $query->result();
    }


    public function view_barangkering()
    {
        $query = $this->db->query("
            SELECT barang_kering.id_barangjemur, barang_datang.id_barangdatang, barang_datang.kodebarang, tanggalkering, bobotkering
            FROM
            barang_datang
            INNER JOIN barang_jemur ON barang_datang.id_barangdatang=barang_jemur.id_barangdatang
            INNER JOIN barang_kering ON barang_kering.id_barangjemur=barang_jemur.id_barangjemur
            ");

        return $query->result();
    }



    



    

    


    



