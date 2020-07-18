<?php

class model_stok extends CI_Model
{

	public function stok_pabrik()
	{
		$query = $this->db->query("
			SELECT barang_datang.varietas, barang_datang.jenisolahan, 
			SUM(CASE WHEN view_stokgabah.bobotall IS NULL THEN 0 ELSE view_stokgabah.bobotall END) AS bobotgabah,
			SUM(CASE WHEN view_stokjemur.bobotall IS NULL THEN 0 ELSE view_stokjemur.bobotall END) AS bobotjemur,
			SUM(CASE WHEN view_stokgb.bobotall IS NULL THEN 0 ELSE view_stokgb.bobotall END) AS bobotgb,
			SUM(CASE WHEN barang_ready.bobot IS NULL THEN 0 ELSE barang_ready.bobot END) AS bobotready
			FROM barang_datang
			LEFT JOIN view_stokgb ON view_stokgb.id_barangdatang=barang_datang.id_barangdatang
			LEFT JOIN view_stokgabah ON view_stokgabah.id_barangdatang=barang_datang.id_barangdatang
			LEFT JOIN view_stokjemur ON view_stokjemur.id_barangdatang=barang_datang.id_barangdatang
			LEFT JOIN barang_ready ON barang_ready.id_barangdatang=barang_datang.id_barangdatang
			GROUP BY varietas, jenisolahan
			ORDER BY varietas, jenisolahan
			");

		return $query->result();
	}


	public function stok_gudang()
	{
		$query = $this->db->query("
			SELECT varietas, jenisolahan, 
			SUM(CASE WHEN bobot IS NULL THEN 0 ELSE bobot END) AS bobotall
			FROM barang_gudang
			INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_gudang.id_barangdatang
			GROUP BY varietas, jenisolahan
			");

		return $query->result();
	}


	public function stok_ready()
	{
		$query = $this->db->query("
			SELECT barang_datang.varietas, jenisolahan, SUM(bobot) AS bobot
            FROM barang_ready
            INNER JOIN barang_datang ON barang_datang.id_barangdatang=barang_ready.id_barangdatang
            GROUP BY varietas, jenisolahan
            ORDER BY varietas
			");

		return $query->result();
	}


	public function stok_proses()
	{
		$query = $this->db->query("
			SELECT varietas, jenisolahan, 
            SUM(CASE WHEN proses = 'Jemur' THEN bobotall ELSE 0 END) AS bobotjemur,
            SUM(CASE WHEN proses = 'Huller' THEN bobotall ELSE 0 END) AS bobothuller,
            SUM(CASE WHEN proses = 'Suton+Grading' THEN bobotall ELSE 0 END) AS bobotsuton,
            SUM(CASE WHEN proses = 'CS+HP' THEN bobotall ELSE 0 END) AS bobotcshp
            FROM view_stokproses
            GROUP BY varietas, jenisolahan
            ");

		return $query->result();
	}
}




