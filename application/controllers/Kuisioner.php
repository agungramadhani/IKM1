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
		$umur = $this->input->post('umur');
		$jenkel = $this->input->post('jenkel');
		$instansi = $this->input->post('instansi');
		$keperluan = $this->input->post('keperluan');
		$nopol = $this->input->post('nopol');
		$waktu_pengisian = date("Y-m-d H:i:s");
		$dataArray = array(
			'id_user' => $nomer,
			'nik' => $nik,
			'nama' => $nama,
			'alamat' => $alamat,
			'umur' => $umur,
			'jenkel' => $jenkel,
			'instansi' => $instansi,
			'keperluan' => $keperluan,
			'no_pol' => $nopol,
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



	public function saveform()
	{
		$this->load->model('MKuisioner');
		$data = $this->MKuisioner->getDataKuisioner();
		$radio = $_POST['radio'];
		$id = $this->input->post('id_user');
		$text = $this->input->post('value');
		$kode = $_POST['kode_pertanyaan'];
		$i = 0;
		foreach ($radio as $key => $rr) {
			// echo $rr;
			$kod = $kode[$key];
			// echo $id;

			$data['error'] = $this->MKuisioner->setDataKuisioner($id, $rr, $text, $kod);
		}
		// var_dump($radio);
		// var_dump($kode);
		// var_dump($dataarray2);
		// $data['error'] = $this->MKuisioner->setDataKuisioner($dataarray2);
		// $this->load->template("form_kuisioner");
		header("Location:" . $_SERVER['HTTP_REFERER']);
	}
	public function cok()
	{
		$where = $this->input->post('kode_parameter');
		$this->load->model('MKuisioner');
		//$where = 1;
		$ss = $this->MKuisioner->getDataKuisioner($where);
		// foreach
		// 	var option = '<option value="' + response.data[i].kode_parameter + '">'+ response.data[i].value+ '</option>';
		// 	$('#kus1').append(option);
		// }
		// $this->load->template("form_kuisioner", $data);
		echo json_encode($ss);

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
			$id_user = $this->input->post('id_user');
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
