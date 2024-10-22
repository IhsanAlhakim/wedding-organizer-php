<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('username'))) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Tidak memiliki akses!</div>');
			redirect('login');
		}
		$this->load->model('katalog_model');
		$this->load->model('pesanan_model');
		$this->load->model('settings_model');
	}

	// Menampilkan halaman dashboard dan mengirim data yang diperlukan halaman
	public function index()
	{
		$data = array(
			'title' => 'Website Wedding JeWePe',
			'page' => 'admin/dashboard',
			'totalKatalog' => $this->katalog_model->get_all_katalog()->num_rows(),
			'totalPesanan' => $this->pesanan_model->get_count_pesanan('all')->num_rows(),
			'totalPesananMenunggu' => $this->pesanan_model->get_count_pesanan('requested')->num_rows(),
			'totalPesananDiterima' => $this->pesanan_model->get_count_pesanan('approved')->num_rows(),
			'settings' => $this->settings_model->getSettings('1')->row()
		);
		$this->load->view('admin/template/main', $data);
	}
}
