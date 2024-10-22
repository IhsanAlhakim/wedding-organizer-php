<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('username'))) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Tidak memiliki akses!</div>');
			redirect('login');
		}
		$this->load->model('pesanan_model');
		$this->load->model('settings_model');
	}

	// Menampilkan halaman laporan pesanan dan mengirim data yang diperlukan halaman
	public function index()
	{
		$data = array(
			'title' => 'Website Wedding JeWePe',
			'page' => 'admin/laporan',
			'getAllLaporan' => $this->pesanan_model->get_all_laporan()->result(),
			'settings' => $this->settings_model->getSettings('1')->row()
		);
		$this->load->view('admin/template/main', $data);
	}
}
