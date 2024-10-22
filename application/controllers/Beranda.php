<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('katalog_model');
		$this->load->model('pesanan_model');
		$this->load->model('settings_model');

		//helper untuk word limiter
		$this->load->helper('text');
	}

	// Menampilkan halaman beranda dan mengirim data yang diperlukan halaman
	public function index()
	{
		$data = array(
			'title' => 'Beranda',
			'page' => 'landing/beranda',
			'getAllKatalog' => $this->katalog_model->get_all_katalog_landing()->result(),
			'getDataWeb' => $this->settings_model->getSettings('1')->row()
		);
		$this->load->view('landing/template/sites', $data);
	}

	// Menampilkan halaman detail paket dan mengirim data yang diperlukan halaman
	public function detail()
	{
		if ($this->input->get('id')) {

			// Mengecek apakah ada data katalog berdasarkan id
			$cek_data = $this->katalog_model->get_katalog_by_id($this->input->get('id'))->num_rows();

			// Jika ada tampilkan halaman dan kirim data yang diperlukan
			if ($cek_data > 0) {
				$data = array(
					'title' => 'JeWePe Wedding Organizer',
					'page' => 'landing/detail',
					'detailKatalog' => $this->katalog_model->get_katalog_by_id($this->input->get('id'))->row(),
					'getDataWeb' => $this->settings_model->getSettings('1')->row()
				);

				$this->load->view('landing/template/sites', $data);
			} else {
				redirect('/');
			}
		} else {
			redirect('/');
		}
	}

	// Melakukan pemesanan paket pernikahan
	public function pesan()
	{
		if ($this->input->post()) {

			// Mengambil data dari form pemesanan
			$post = $this->input->post();

			// Mengecek apakah ada data pesanan yang sama
			$cek_data = $this->pesanan_model->cek_data_pesanan($post['id'], $post['email'], $post['wedding_date'])->num_rows();

			// Jika tidak ada buat data pesanan
			if ($cek_data == 0) {
				$datetime = date('Y-m-d H:i:s');
				$data = array(
					'catalogue_id' => $post['id'],
					'name' => $post['name'],
					'email' => $post['email'],
					'phone_number' => $post['phone_number'],
					'wedding_date' => $post['wedding_date'],
					'status' => 'requested',
					'created_at' => $datetime,
				);

				$insert = $this->pesanan_model->insert($data);

				if ($insert) {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Permintaan pesanan anda sudah diterima, Silahkan tunggu konfirmasi pesanan dari kami melalui email<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
					redirect('Beranda/detail?id=' . $post['id']);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Permintaan pesanan gagal!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
					redirect('Beranda/detail?id=' . $post['id']);
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Paket dan tanggal pernikahan sudah anda pesan sebelumnya, silahkan tunggu konfirmasi dari kami.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
				redirect('Beranda/detail?id=' . $post['id']);
			}
		}
	}
}
