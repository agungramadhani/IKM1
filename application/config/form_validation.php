<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
		'Kuisioner/index' => array(
				array(
					'field' => 'nik',
					'label' => 'Nomor Nik',
					'rules' => 'required',
					'errors' => array('required' => "Tolong isikan %s Anda."
					)
				),
				array(
					'field' => 'nama',
					'label' => 'Nama Pengunjung',
					'rules' => 'required',
					'errors' => array('required' => "Tolong isikan %s Anda."
					)
				),
				array(
					'field' => 'alamat',
					'label' => 'Alamat',
					'rules' => 'required',
					'errors' => array('required' => "Tolong isikan %s Anda."
					)
				),
				array(
						'field' => 'umur',
						'label' => 'Umur',
						'rules' => 'trim|required|numeric',
						'errors' => array('required' => "Tolong isikan %s Anda.",
								'numeric' => "Umur hanya boleh berisi angka."
						)
				),
				array(
						'field' => 'instansi',
						'label' => 'Nama Instansi',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda."
						)
				),
				array(
						'field' => 'keperluan',
						'label' => 'Keperluan Kunjungan',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda."
						)
				),
				array(
					'field' => 'nopol',
					'label' => 'Nomor Pol',
					'rules' => 'required',
					'errors' => array('required' => "Tolong isikan %s Anda."
					)
				)
		),
		
		'autentikasi/login' => array(
				array(
						'field' => 'username',
						'label' => 'Username',
						'rules' => 'trim|required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				),
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				)
		)
);