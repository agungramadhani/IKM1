<?php
class MKuisioner extends CI_Model
{

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function getNomerResponden()
	{
		$query = $this->db->get('transaksi');
		return "RSP-" . str_pad($query->num_rows() + 1, 4, 0, STR_PAD_LEFT);
	}
	public function getNomerUser()
	{
		$query = $this->db->get('visit');
		return "USR" . str_pad($query->num_rows() + 1, 4, 0, STR_PAD_LEFT);
	}

	public function setDataResponden()
	{
		$umur = $this->input->post('umur');
		$jenkel = $this->input->post('jenkel');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');

		if ($jenkel == "0")
			$jenkel = "Laki-Laki";
		else
			$jenkel = "Perempuan";

		$data = array(
			'umur' => $umur, 'jenkel' => $jenkel,
			'pendidikan' => $pendidikan, 'pekerjaan' => $pekerjaan
		);

		$this->session->set_flashdata($data);
	}

	public function setDataKuisioner($id, $kode,$as)
	{
		$data = array(
			'id_transaksi' 		=> $this->getNomerResponden(),
			'id_visit' 			=> $id,
			'kode_parameter' 	=> $kode,
			'value' => $as
		);
		$ins = $this->db->insert('transaksi', $data);
		if (!$ins) {
			$this->db->error();
		}
	}
	public function setDataKunjungan($data)
	{
		// $nomer = $this->getNomerUser();
		// $nik = $this->input->post('nik');
		// $nama = $this->input->post('nama');
		// $alamat = $this->input->post('alamat');
		// $umur = $this->input->post('umur');
		// $jenkel = $this->input->post('jenkel');
		// $instansi = $this->input->post('instansi');
		// $keperluan = $this->input->post('keperluan');
		// $nopol = $this->input->post('nopol');		
		// $waktu_pengisian = date("Y-m-d H:i:s");		
		// $data = array(	'id_user' => $nomer, 
		// 				'nik' => $nik, 
		// 				'nama' => $nama, 
		// 				'alamat' => $alamat, 
		// 				'umur' => $umur, 
		// 				'jenkel' => $jenkel,
		// 				'instansi' => $instansi,
		// 				'keperluan' => $keperluan,
		// 				'no_pol' => $nopol,
		// 				'date_created' => $waktu_pengisian
		// );

		$this->db->insert('visit', $data);

		if ($this->db->affected_rows() != 0) {
			return null;
		} else {
			return "Data gagal ditambahkan : " . $this->db->error;
		}
	}
	// public function getDataKuisioner()
	// {
		
	// 		$query = $this->db->query("SELECT * FROM v_kuisioner");
		
		
	// 	// $indeks = 0;
	// 	// $result = array();

	// 	// foreach ($query->result_array() as $row) {
	// 	// 	$result[$indeks++] = $row;
	// 	// }

	// 	return $query;
	// }
	public function getPertanyaan()
	{
		$query = $this->db->query('SELECT DISTINCT * FROM parameter WHERE status = 1')->result_array();
		return $query; 
	}
	public function getDataUser()
	{
		$query = $this->db->get('visit');
		$indeks = 0;
		$result = array();

		foreach ($query->result_array() as $row) {
			$result[$indeks++] = $row;
		}

		return $result;
	}
	public function getDataidUser($id_user)
	{
		$this->db->select('*');
		$this->db->from('visit');
		$this->db->where('id_visit', $id_user);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}
	}

	public function getJumlahResponden()
	{
		// $listKuisioner = $this->getDataKuisioner();

		// return $jumlahResponden = count($listKuisioner);
	}

	public function hitungNilaiUnsurPelayanan()
	{
		// $listKuisioner = $this->getDataKuisioner();

		$hasil = array(
			'prosedur' => 0,
			'persyaratan' => 0,
			'kejelasan' => 0,
			'kedisiplinan' => 0,
			'tanggungjawab' => 0,
			'kemampuan' => 0,
			'kecepatan' => 0,
			'keadilan' => 0,
			'kesopanan' => 0,
			'kewajaranBiaya' => 0,
			'kepastianBiaya' => 0,
			'kepastianJadwal' => 0,
			'kenyamanan' => 0,
			'keamanan' => 0
		);

		// $jumlahResponden = count($listKuisioner);

		// foreach ($listKuisioner as $kuisioner) {
		// 	foreach ($kuisioner as $pelayanan => $nilai) {
		// 		if (array_key_exists($pelayanan, $hasil)) {
		// 			$hasil[$pelayanan] += $nilai;
		// 		}
		// 	}
		}

		// foreach ($hasil as $unitPelayanan => $nilai) {
		// 	$hasil[$unitPelayanan] = $nilai / $jumlahResponden;
		// }

	// 	// return $hasil;
	// }

	// public function hitungNilaiIKM()
	// {
	// 	$nilaiUnsurPelayanan = $this->hitungNilaiUnsurPelayanan();
	// 	$result = 0;

	// 	foreach ($nilaiUnsurPelayanan as $unsurPelayanan) {
	// 		$result += $unsurPelayanan * 0.071;
	// 	}

	// 	return $result;
	// }

	// public function simpulanIKM()
	// {
	// 	$nilaiIKM = $this->hitungNilaiIKM();
	// 	$nilaiIKM = $nilaiIKM * 25;

	// 	if ($nilaiIKM >= 25 && $nilaiIKM <= 43.75) {
	// 		$result['mutu'] = 'D';
	// 		$result['kinerja'] = 'Tidak Baik';
	// 	} else if ($nilaiIKM > 43.75 && $nilaiIKM <= 62.5) {
	// 		$result['mutu'] = 'C';
	// 		$result['kinerja'] = 'Kurang Baik';
	// 	} else if ($nilaiIKM > 62.5 && $nilaiIKM <= 81.25) {
	// 		$result['mutu'] = 'B';
	// 		$result['kinerja'] = 'Baik';
	// 	} else if ($nilaiIKM > 81.25 && $nilaiIKM <= 100) {
	// 		$result['mutu'] = 'A';
	// 		$result['kinerja'] = 'Sangat Baik';
	// 	}
	// 	$result['konversi'] = $nilaiIKM;

	// 	return $result;
	// }

	// public function getGraphData()
	// {
	// 	$nilaiUnsurPelayanan = $this->hitungNilaiUnsurPelayanan();
	// 	$result = array();
	// 	$konversi = array(
	// 		'prosedur' => 'Prosedur Pelayanan',
	// 		'persyaratan' => 'Persyaratan Pelayanan',
	// 		'kejelasan' => 'Kejelasan Petugas Pelayanan',
	// 		'kedisiplinan' => 'Kedisiplinan Petugas Pelayanan',
	// 		'tanggungjawab' => 'Tanggung Jawab Petugas Pelayanan',
	// 		'kemampuan' => 'Kemampuan Petugas Pelayanan',
	// 		'kecepatan' => 'Kecepatan Pelayanan',
	// 		'keadilan' => 'Keadilan Mendapatkan Pelayanan',
	// 		'kesopanan' => 'Kesopanan dan Keramahan Petugas',
	// 		'kewajaranBiaya' => 'Kewajaran Biaya Pelayanan',
	// 		'kepastianBiaya' => 'Kepastian Biaya Pelayanan',
	// 		'kepastianJadwal' => 'Kepastian Jadwal Pelayanan',
	// 		'kenyamanan' => 'Kenyamanan Lingkungan',
	// 		'keamanan' => 'Keamanan Pelayanan'
	// 	);

	// 	foreach ($nilaiUnsurPelayanan as $unsurPelayanan => $nilai) {
	// 		$result[$konversi[$unsurPelayanan]] = $nilai;
	// 	}

	// 	return $result;
	// }

}
