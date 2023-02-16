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

	public function umur()
	{
		$ini = $this->db->query("SELECT id_visit, umur,CASE WHEN umur >= 20 AND umur <=30  THEN '20-30' WHEN umur > 30 AND umur <=40 THEN '31-40' WHEN umur > 40 AND umur <=50 THEN '41-50' ELSE '>50' END AS indikator FROM visit")->result_array();
		return $ini;
	}

	public function umurHitung()
	{
		$ini2 = $this->db->query('SELECT COUNT(umur) AS HSL
		FROM visit')->result_array();
		return $ini2[0];
	}

	public function jenis()
	{
		$hihi2 = $this->db->query("SELECT jenkel, ROUND(COUNT(jenkel)) as jenis FROM v_responden GROUP BY jenkel")->result_array();

		return $hihi2;
	}

	public function jenisHitung()
	{
		$hihi3 = $this->db->query("SELECT jenkel, COUNT(jenkel) as hasil FROM v_responden")->result_array();
		return $hihi3[0];
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

	public function setDataKuisioner($id, $kode, $as, $nilai)
	{
		$data = array(
			'id_transaksi' 		=> $this->getNomerResponden(),
			'id_visit' 			=> $id,
			'kode_parameter' 	=> $kode,
			'nilai'				=> $nilai,
			'value' 			=> $as,
		);
		// var_dump($data);
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

	public function getData()
	{

		$query1 = $this->db->query('SELECT frekuensi_kritik,value FROM v_daftarresponden WHERE id_preference = "Entry"')->result_array();

		return $query1;
	}

	public function getDataHitung()
	{
		$query2 = $this->db->query('SELECT id_visit, COUNT(value) AS jumlah
		FROM transaksi WHERE nilai=0')->result_array();
		return $query2[0];
		// foreach ($query2->result_array() as $row) {
		// 	$result[$indeks++] = $row;
		// }

		// return $query2;
	}

	public function detail_data($id = null)
	{
		$querywifi = $this->db->query('SELECT parameter, value FROM v_daftarresponden WHERE id_visit = "' . $id . '"')->result_array();
		return $querywifi;
	}
	public function detail()
	{
		$query = $this->db->query('SELECT parameter, value, nama FROM v_daftarresponden')->result_array();
		return $query;
	}

	public function unsurr()
	{
		$unsur = $this->db->query('SELECT kode_parameter,parameter,rata_rata,persentase FROM v_jumlahnilai')->result_array();
		return $unsur;
	}

	public function getDataa()
	{

		$query = $this->db->query('SELECT id_visit,nama,umur,alamat,date,frekuensi_kritik,value FROM v_daftarresponden GROUP BY id_visit');
		$indeks = 0;
		$result = array();

		foreach ($query->result_array() as $row) {
			$result[$indeks++] = $row;
		}
		return $result;
	}

	public function totalunsur()
	{
		$total = $this->db->query("SELECT total FROM v_total")->result_array();
		return $total;
	}


	public function dashboardhitung()
	{
		$iya = $this->db->query("SELECT id_transaksi, id_visit, id_transaksi, nilai FROM transaksi WHERE nilai = 0")->result_array();
		return $iya;
	}

	public function getDataKuisioner()
	{

		$query = $this->db->query('SELECT COUNT(id_visit) AS id FROM transaksi GROUP BY id_visit');
		$indeks = 0;
		$result = array();

		foreach ($query->result_array() as $row) {
			$result[$indeks++] = $row;
		}

		return $result;
	}
	public function getPertanyaan()
	{
		$query = $this->db->query('SELECT DISTINCT * FROM parameter WHERE status = 1')->result_array();
		return $query;
	}

	public function getPertanyaann()
	{
		$query = $this->db->query('SELECT * FROM parameter WHERE status = 1')->result_array();
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
		// $query = $this->db->query('SELECT COUNT(id_visit) AS id FROM transaksi GROUP BY id_visit');
		$listKuisioner = $this->getDataKuisioner();

		return $jumlahResponden = count($listKuisioner);
	}

	public function hitungNilaiUnsurPelayanan()
	{
		$listKuisioner = $this->getDataKuisioner();
		$hasil = $this->db->query('SELECT kode_parameter, nilai FROM transaksi')->row();
		// $nn = strval($hasil);
		$hasil = array(
			'kode_parameter' => $hasil->kode_parameter,
			'nilai' => $hasil->nilai,
		);

		$jumlahResponden = count($listKuisioner);

		// var_dump($hasil);
		foreach ($listKuisioner as $kuisioner) {
			foreach ($kuisioner as $pelayanan => $nilai) {
				if (array_key_exists($pelayanan, $hasil)) {
					$hasil[$pelayanan] += $nilai;
				}
			}
		}

		foreach ($hasil as $unitPelayanan => $nilai) {
			$hasil[$unitPelayanan] = $nilai / $jumlahResponden;
		}

		return $hasil;
	}

	public function hitungNilaiIKM()
	{
		$nilaiUnsurPelayanan = $this->hitungNilaiUnsurPelayanan();
		$result = 0;

		foreach ($nilaiUnsurPelayanan as $unsurPelayanan) {
			$result += $unsurPelayanan * 0.071;
		}

		return $result;
	}

	public function simpulanIKM()
	{
		$nilaiIKM = $this->hitungNilaiIKM();
		$simpulan = $nilaiIKM * 25;

		if ($simpulan >= 25 && $simpulan <= 43.75) {
			$result['mutu'] = 'D';
			$result['kinerja'] = 'Tidak Baik';
		} else if ($simpulan > 43.75 && $simpulan <= 62.5) {
			$result['mutu'] = 'C';
			$result['kinerja'] = 'Kurang Baik';
		} else if ($simpulan > 62.5 && $simpulan <= 81.25) {
			$result['mutu'] = 'B';
			$result['kinerja'] = 'Baik';
		} else if ($simpulan > 81.25 && $simpulan <= 100) {
			$result['mutu'] = 'A';
			$result['kinerja'] = 'Sangat Baik';
		}
		$result = $simpulan;
		echo json_encode($result);
		// return $result;
	}

	public function getGraphData()
	{
		$nilaiUnsurPelayanan = $this->hitungNilaiUnsurPelayanan();
		$result = array();
		$konversi = array(
			'prosedur' => 'Prosedur Pelayanan',
			'persyaratan' => 'Persyaratan Pelayanan',
			'kejelasan' => 'Kejelasan Petugas Pelayanan',
			'kedisiplinan' => 'Kedisiplinan Petugas Pelayanan',
			'tanggungjawab' => 'Tanggung Jawab Petugas Pelayanan',
			'kemampuan' => 'Kemampuan Petugas Pelayanan',
			'kecepatan' => 'Kecepatan Pelayanan',
			'keadilan' => 'Keadilan Mendapatkan Pelayanan',
			'kesopanan' => 'Kesopanan dan Keramahan Petugas',
			'kewajaranBiaya' => 'Kewajaran Biaya Pelayanan',
			'kepastianBiaya' => 'Kepastian Biaya Pelayanan',
			'kepastianJadwal' => 'Kepastian Jadwal Pelayanan',
			'kenyamanan' => 'Kenyamanan Lingkungan',
			'keamanan' => 'Keamanan Pelayanan'
		);

		foreach ($nilaiUnsurPelayanan as $unsurPelayanan => $nilai) {
			$result[$konversi[$unsurPelayanan]] = $nilai;
		}

		return $result;
	}
	public function nilaikarakter()
	{
		$hihi = $this->db->query("SELECT CASE WHEN umur >= 20 AND umur <= 30 THEN '20-30' WHEN umur >= 31 AND umur <= 40 THEN '31-40' WHEN umur >= 41 AND umur <= 50 THEN '41-50' WHEN umur > 50 THEN 'Over 50' END as RANGE_AGE, count(`id_visit`) as hasil FROM visit GROUP BY RANGE_AGE ORDER BY RANGE_AGE")->result_array();

		return $hihi;
	}
}
