<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('settings_model');
	}

	// Menampilkan halaman kontak dan mengirim data yang diperlukan halaman
	public function index()
	{
		$data = array(
			'title' => 'Beranda',
			'page' => 'landing/kontak',
			'getDataWeb' => $this->settings_model->getSettings('1')->row()
		);
		$this->load->view('landing/template/sites', $data);
	}
}
