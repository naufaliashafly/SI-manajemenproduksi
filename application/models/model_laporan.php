<?php

class model_laporan extends CI_Model
{

	public function get($id=null)
	{
		$query = $this->db->query("
			SELECT
			barang_datang.id_barangdatang,
			barang_datang.varietas,
			barang_datang.blokmitra,
			jenisolahan.jenisolahan,
			varietas.varietas,
			blokmitra.blokmitra,
			barang_datang.tanggaldatang,
			barang_datang.bobotdatang,
			barang_datang.kadarairawal,
			barang_jemur.tanggalmasukjemuran,
			barang_kering.tanggalkering,
			barang_kering.bobotkering,
			barang_huller.tanggalhuller,
			barang_huller.bobothuller,
			barang_sutongrading.tanggalsutongrading,
			barang_sutongrading.MB,
			barang_sutongrading.BB,
			barang_sutongrading.PB,
			barang_sutongrading.L2,
			barang_sutongrading.L3,
			barang_sutongrading.PBK,
			barang_sutongrading.ELV,
			barang_sutongrading.bobotsutongrading,
			barang_cshp.tanggalcshp,
			barang_cshp.bobotcshp,
			ROUND(100*(bobotkering/bobotdatang), 2) AS rendemenkering,
			ROUND(100*(bobothuller/bobotmasukhull), 2) AS rendemenhuller,
			ROUND(100*(bobotsutongrading/bobotmasuksut), 2) AS rendemensutongrading,
			ROUND(100*(bobotcshp/bobotmasukcshp), 2) AS rendemencshp
			FROM barang_datang
			LEFT JOIN varietas ON varietas.varietas = barang_datang.varietas
			LEFT JOIN blokmitra ON blokmitra.blokmitra = barang_datang.blokmitra
			LEFT JOIN jenisolahan ON jenisolahan.jenisolahan = barang_datang.jenisolahan
			LEFT JOIN barang_jemur ON barang_jemur.id_barangdatang = barang_datang.id_barangdatang
			LEFT JOIN barang_kering ON barang_kering.id_barangjemur = barang_jemur.id_barangjemur
			LEFT JOIN barang_huller ON barang_huller.id_barangdatang = barang_datang.id_barangdatang
			LEFT JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang = barang_datang.id_barangdatang
			LEFT JOIN barang_cshp ON barang_cshp.id_barangdatang = barang_datang.id_barangdatang
			ORDER BY barang_datang.id_barangdatang ASC
			");

			return $query->result();
	}


	public function query($query)
    {
        $this->db->select('
            barang_datang.*,
            varietas.varietas,
            blokmitra.blokmitra,
            statusbarangdatang.statusbarangdatang,
            statusbarangdatang.id_statusbarangdatang');
        $this->db->from('barang_datang');
        $this->db->join('statusbarangdatang', 'statusbarangdatang.id_statusbarangdatang=barang_datang.id_statusbarangdatang');
        $this->db->join('varietas', 'varietas.varietas=barang_datang.varietas');
        $this->db->join('blokmitra', 'blokmitra.blokmitra=barang_datang.blokmitra');

        return $this->db->get($query);
    }


     public function ambil($query)
    {
        $ambil = $this->db->get($query);
        return $ambil->result() ;
    }


	public function rendemen()
	{
		$query = $this->db->query("
			SELECT
			barang_datang.id_barangdatang,
			barang_datang.bobotdatang,
			barang_kering.bobotkering,
            100*(bobotkering/bobotdatang) AS rendemenkering,
            barang_huller.bobotmasukhull,
			barang_huller.bobothuller,
            100*(bobothuller/bobotmasukhull) AS rendemenhuller,
			barang_sutongrading.MB,
			barang_sutongrading.BB,
			barang_sutongrading.PB,
			barang_sutongrading.L2,
			barang_sutongrading.L3,
			barang_sutongrading.PBK,
			barang_sutongrading.ELV,
            barang_sutongrading.bobotmasuksut,
            barang_sutongrading.bobotsutongrading, 
            100*(bobotsutongrading/bobotmasuksut) AS rendemensutongrading,
			barang_cshp.bobotmasukcshp,
            barang_cshp.bobotcshp,
			100*(bobotcshp/bobotmasukcshp) AS rendemencshp 
			FROM barang_datang
			LEFT JOIN barang_jemur ON barang_jemur.id_barangdatang = barang_datang.id_barangdatang
			LEFT JOIN barang_kering ON barang_kering.id_barangjemur = barang_jemur.id_barangjemur
			LEFT JOIN barang_huller ON barang_huller.id_barangdatang = barang_datang.id_barangdatang
			LEFT JOIN barang_sutongrading ON barang_sutongrading.id_barangdatang = barang_datang.id_barangdatang
			LEFT JOIN barang_cshp ON barang_cshp.id_barangdatang = barang_datang.id_barangdatang
            ORDER BY id_barangdatang ASC
            ");
	}


	public function chart()
	{
		$query = $this->db->query("
			SELECT blokmitra, barang_datang.varietas, tanggaldatang, 100*(bobotcshp/bobotmasukcshp) AS rendemencshp
			FROM barang_datang
			INNER JOIN barang_cshp ON barang_cshp.id_barangdatang=barang_datang.id_barangdatang
			WHERE blokmitra = 'AI' AND barang_datang.varietas= 'ADS' 
			GROUP BY rendemencshp
			ORDER BY barang_datang.varietas, tanggaldatang
            ");

		return $query->result();
	}


	public function chart1()
	{
		$query = $this->db->query("
			SELECT blokmitra, varietas, tanggaldatang, bulan,SUM(rendemencshp) AS rendemen, COUNT(bulan) AS pembagi, SUM(rendemencshp)/COUNT(bulan) AS rendemenbulanan 
			FROM grafik      
			WHERE blokmitra = 'AI' AND varietas= 'ADS'
			GROUP BY blokmitra, varietas, bulan
			ORDER BY blokmitra, varietas, tanggaldatang
            ");

		return $query->result();
	}


	public function chart2()
	{
		$query = $this->db->query("
			SELECT blokmitra, varietas, tanggaldatang, bulan,SUM(rendemencshp) AS rendemen, COUNT(bulan) AS pembagi, SUM(rendemencshp)/COUNT(bulan) AS rendemenbulanan 
			FROM grafik      
			WHERE blokmitra = 'AI' AND varietas= 'ATS'
			GROUP BY blokmitra, varietas, bulan
			ORDER BY blokmitra, varietas, tanggaldatang
            ");

		return $query->result();
	}


	public function chart3()
	{
		$query = $this->db->query("
			SELECT blokmitra, varietas, tanggaldatang, bulan,SUM(rendemencshp) AS rendemen, COUNT(bulan) AS pembagi, SUM(rendemencshp)/COUNT(bulan) AS rendemenbulanan 
			FROM grafik      
			WHERE blokmitra = 'P7' AND varietas= 'ADS'
			GROUP BY blokmitra, varietas, bulan
			ORDER BY blokmitra, varietas, tanggaldatang
            ");

		return $query->result();
	}


	public function chart4()
	{
		$query = $this->db->query("
			SELECT blokmitra, varietas, tanggaldatang, bulan,SUM(rendemencshp) AS rendemen, COUNT(bulan) AS pembagi, SUM(rendemencshp)/COUNT(bulan) AS rendemenbulanan 
			FROM grafik      
			WHERE blokmitra = 'P7' AND varietas= 'ATS'
			GROUP BY blokmitra, varietas, bulan
			ORDER BY blokmitra, varietas, tanggaldatang
            ");

		return $query->result();
	}


	public function out()
	{
		$query = $this->db->query("
			SELECT barang_ready.id_barangdatang, kodebarang, jenisolahan, tanggaldatang, bobotdatang, bobot, ROUND(100*(bobotcshp/bobotmasukcshp), 2) AS rendemen 
			FROM `barang_ready`
			INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_ready.id_barangdatang
			INNER JOIN barang_cshp ON barang_cshp.id_barangdatang=barang_ready.id_barangdatang
			WHERE id_statusready='2'
            ");

		return $query->result();
	}
}




