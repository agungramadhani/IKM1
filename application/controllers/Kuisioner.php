<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MKuisioner');
	}

	public function index()
	{
		$data['pageTitle'] = "IKM | Responden Kuisioner Kepuasan Masyarakat";
		if ($this->form_validation->run() == FALSE) {
		} else {
			$this->load->model('MKuisioner');
			$this->MKuisioner->setDataResponden();
			header("Location:" . base_url("form"));
		}
		$this->load->template("form_awal", $data);
	}
	public function test($data = null)
	{
		$data['list'] = $data;
		$this->load->view("nomor_registrasi", $data);
	}
	public function savedata()
	{
		$data['pageTitle'] = "IKM | Registrasi Kepuasan Masyarakat";
		$this->load->model('MKuisioner');
		$nomer = $this->MKuisioner->getNomerUser();
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$nohp = $this->input->post('nohp');
		$desa = $this->input->post('desa');
		$rtrw = $this->input->post('rtrw');
		$kecamatan = $this->input->post('kecamatan');
		$kabupaten = $this->input->post('kabupaten');
		$umur = $this->input->post('umur');
		$jenkel = $this->input->post('jenkel');
		$suku = $this->input->post('suku');
		$sukuu = $this->input->post('sukuu');
		$pendidikan = $this->input->post('pendidikan');
		$agama = $this->input->post('agama');
		$agamaa = $this->input->post('agamaa');
		$pekerjaan = $this->input->post('pekerjaan');
		$pekerjaann = $this->input->post('pekerjaann');
		$pekerjaanortu = $this->input->post('pekerjaanortu');
		$pekerjaanortuu = $this->input->post('pekerjaanortuu');
		$penghasilan = $this->input->post('penghasilan');
		$organisasi = $this->input->post('organisasi');
		$organisasii = $this->input->post('organisasii');
		$waktu_pengisian = date("Y-m-d H:i:s");

		if ($suku == "5") {
			$suku = $sukuu;
		}
		if ($agama == "5") {
			$agama = $agamaa;
		}
		if ($suku == "5") {
			$suku = $sukuu;
		}
		if ($pekerjaan == "5") {
			$pekerjaan = $pekerjaann;
		}
		if ($pekerjaanortu == "5") {
			$pekerjaanortu = $pekerjaanortuu;
		}
		if ($organisasi == "5") {
			$organisasi = $organisasii;
		}

		$dataArray = array(
			'id_visit' => $nomer,
			'nik' => $nik,
			'nama' => $nama,
			'alamat' => $alamat,
			'nohp' => $nohp,
			'desa_kelurahan' => $desa,
			'rt_rw' => $rtrw,
			'kecamatan' => $kecamatan,
			'kabupaten' => $kabupaten,
			'umur' => $umur,
			'jenkel' => $jenkel,
			'suku' => $suku,
			'pendidikan' => $pendidikan,
			'agama' => $agama,
			'pekerjaan' => $pekerjaan,
			'pekerjaan_lain' => $pekerjaanortu,
			'penghasilan' => $penghasilan,
			'organisasi' => $organisasi,
			'date_created' => $waktu_pengisian
		);

		$data['error'] = $this->MKuisioner->setDataKunjungan($dataArray);
		if (empty($data['error']))
			$this->test($dataArray);
		// header("Location:".base_url("kuisioner/sukses_page"));

		// $this->load->template("dashboard_user",$data);
	}
	public function dashboard()
	{
		$data['pageTitle'] = "IKM | Responden Kuisioner Kepuasan Masyarakat";
		if ($this->form_validation->run() == FALSE) {
		} else {
			$this->load->model('MKuisioner');
			$this->MKuisioner->setDataResponden();
			header("Location:" . base_url("form"));
		}

		$this->load->template("dashboard_user", $data);
	}

	// public function saveformm()
	// {
	// 	// $valuejwb = $this->db->query("select * from v_kuisioner where kode_parameter")->result_array();
	// 	$this->load->model('MKuisioner');
	// 	// $option = $this->input->post('kus');

	// 	$id = $this->input->post('id_visit');

	// 	// $text = $this->input->post('kus1');
	// 	// $ket = $this->input->post('value');
	// 	$kode = $_POST['kode_parameter'];
	// 	$as = $this->input->post('kus');
	// 	$ad = $this->input->post('kus1');
	// }


	public function saveform()
	{
		$this->load->model('MKuisioner');
		$id = $this->input->post('id_visit');
		$kode = $_POST['kode_parameter'];
		$as = $_POST['kus'];
		$waktu_pengisian = date("Y-m-d H:i:s");

		foreach ($as as $key => $value) {
			$nilai = $this->db->query("SELECT pr.nilai FROM parameter pp LEFT JOIN pref pr on pp.id_preference = pr.id_preference where value = '$value' ")->result_array();
			if (!$nilai) {
				$nilai = "0";
			} else {
				$nilai = $nilai['0']['nilai'];
			}

			$data = array(
				'id_transaksi' 	=> $this->MKuisioner->getNomerResponden(),
				'id_visit' => $id,
				'kode_parameter' => $kode[$key],
				'nilai' => $nilai,
				'value' => $value,
				'value' => $value,
				'date'	=> $waktu_pengisian


			);

			// var_dump($data);
			$this->db->insert('transaksi', $data);
			header("Location:" . $_SERVER['HTTP_REFERER']);
		}
		// return $this->load->view('form_awal');


		// $as = $_POST['kus1'];
		// $ad = $this->input->post('kus1');
		// $ad = $this->input->post('kus1');
		// $ad = $_POST['kus1'];
		// $i = 0;
		// var_dump($id, $kode, $as);
		// foreach ($kode as $key => $rr) {
		// 	// echo $rr;
		// 	$kod = $as[$key];

		// // // 	$option = $rr;
		// // // 	// echo $id;
		// 	// $data['error'] = $this->MKuisioner->setDataKuisioner($id, $kode,$as);
		// 	$data['error'] = $this->MKuisioner->setDataKuisioner($id, $as,  $rr, $kod);
		// 	// var_dump($id, $kode,  $rr, $kod);
		// }
		// //  var_dump($id, $kode,$as,$ad);
		// 	foreach ($ad as $key => $rr) {
		// 	// echo $rr;
		// 	$kod = $kode[$key];
		// // // 	// echo $id;
		// 	$data['error'] = $this->MKuisioner->setDataKuisioner($id, $option, $kod, $rr);

		// }
		// var_dump($id, $kode, $as,$kod, $rr);
		// var_dump($kode);
		// var_dump($dataarray2);
		// $data['error'] = $this->MKuisioner->setDataKuisioner($data);
		// $this->load->template("form_kuisioner");
		// header("Location:" . $_SERVER['HTTP_REFERER']);
	}

	public function cek()
	{
		$id_user = $_POST['id_visit'];
		$getuser = $this->db->query("SELECT id_visit FROM transaksi WHERE id_visit = '$id_user'")->row_array();
		echo json_encode($getuser);
	}

	public function coklat()
	{
		//variabel nim yang dikirimkan form.phpaaa

		//mengambil data
		$id = $_GET['id_visit'];
		$result = $this->MKuisioner->getDataidUser($id);
		$data = array(
			'id_visit'	=> $result['id_visit'],
			'nik'      =>  $result['nik'],
			'nama'      =>  $result['nama'],
			'alamat'   =>  $result['alamat'],
			'umur'      =>  $result['umur'],
			'jenkel'      =>  $result['jenkel'],
		);

		//tampil data
		echo json_encode($data);
	}
	public function form()
	{
		$data['data'] = $this->input->post('kode_parameter');
		$data['data'] = $this->load->model('MKuisioner');
		$data['data'] = $this->MKuisioner->getPertanyaan();

		// $data['user'] = $this->MKuisioner->getDataKuisioner()->result();
		if ($this->form_validation->run() == FALSE) {
		} else {
			// $data['data'] = $this->load->model('MKuisioner');
			// $data = $this->MKuisioner->getDataKuisioner();
			$id_user = $this->input->post('id_visit');
			$result = $this->MKuisioner->getDataidUser($id_user);
			if (!empty($result)) {
				$data['error'] = $this->MKuisioner->getDataKuisioner();
			} else {
				$data['error'] = "ID User Tidak ditemukan, Mohon Registrasi Terlebih dahulu !";
			}

			if (empty($data['error']))
				header("Location:" . base_url("kuisioner/sukses_page"));
		}
		// $where = $this->input->post('where');
		// // $where = 1;
		// $data2 = $this->MKuisioner->getDataKuisioner($where);
		// json_encode($data2);
		// // var_dump($data2);
		$this->load->template("form_kuisioner", $data);
	}

	public function sukses_page()
	{
		$data['pageTitle'] = "IKM | Kuisioner Kepuasan Masyarakat";
		$this->load->template("notif_sukses", $data);
	}
}
