<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
		$this->load->library('PHPMailer_lib');
	}

	// Menampilkan halaman manajemen pesanan dan mengirim data yang diperlukan halaman
	public function index()
	{
		$data = array(
			'title' => 'Website Wedding JeWePe',
			'page' => 'admin/pesanan',
			'getAllPesanan' => $this->pesanan_model->get_all_pesanan()->result(),
			'settings' => $this->settings_model->getSettings('1')->row()
		);
		$this->load->view('admin/template/main', $data);
	}

	// Merubah status pesanan dari requsted menjadi approved atau sebaliknya
	public function updateStatus()
	{
		if ($this->input->get()) {
			$get = $this->input->get();

			// Mengecek apakah data yang dicari ada
			$cek_data = $this->pesanan_model->get_pesanan_by_id($get['id'])->num_rows();

			// Jika ada mulai update status
			if ($cek_data > 0) {
				$datetime = date('Y-m-d H:i:s');

				// Menyiapkan data yang akan diupdate
				$data = array(
					'status' => $get['status'],
					'admin_id' => $this->session->userdata('admin_id'),
					'updated_at' => $datetime,
				);

				// Update status
				$update = $this->pesanan_model->update($get['id'], $data);

				if ($update) {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Status Berhasil diubah!<i class="remove ti-close" data-dismiss="alert"></i></div>');

					// Fitur ini dinonaktifkan karena perlu email dan password akun google
					// Uncomment jika ingin digunakan
					// Mengirim email ke pelanggan
					// $pesanan = $this->pesanan_model->get_pesanan_by_id($get['id'])->row();
					// $this->sendEmail($get['status'], $pesanan->name, $pesanan->email);

					redirect('admin/Pesanan');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Status Gagal diubah!<i class="remove ti-close" data-dismiss="alert"></i></div>');
					redirect('admin/Pesanan');
				}
			}
		} else {
			redirect('admin/Pesanan');
		}
	}

	// Menghapus data pesanan
	public function delete()
	{
		if (!empty($this->input->get('id', true))) {
			$delete = $this->pesanan_model->delete_by_id($this->input->get('id', true));

			if ($delete) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil dihapus!<i class="remove ti-close" data-dismiss="alert"></i></div>');
				redirect('admin/Pesanan');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Gagal dihapus!<i class="remove ti-close" data-dismiss="alert"></i></div>');
				redirect('admin/Pesanan');
			}
		} else {
			redirect('admin/Pesanan');
		}
	}

	// Fitur ini dinonaktifkan karena perlu email dan password akun google
	// Uncomment jika ingin digunakan
	// Mengirim email kepada pemesan
	// public function sendEmail($status, $name, $email)
	// {
	// menggunakan library email dari codeigniter
	// mengatur konfigurasi yang diperlukan
	// $config['protocol'] = 'smtp';
	// $config['smtp_host'] = 'smtp.gmail.com';
	// $config['smtp_port'] = '587';

	// Masukkan email dan password pengirim untuk mengirim email
	// $config['smtp_user'] = '';
	// $config['smtp_pass'] = '';

	// $config['smtp_crypto'] = 'tls';
	// $config['newline'] = "\r\n";

	//Load email library CodeIgniter
	// $this->load->library('email');
	// $this->email->initialize($config);

	// Mengatur pengirim dan penerima
	// $this->email->from($config['smtp_user'], 'JeWePe Wedding Organizer');
	// $this->email->to($email);

	// Mengatur subject dan isi pesan
	// if ($status == 'approved') {
	// 	$this->email->subject('Pemberitahuan Penerimaan Pemesanan Paket Pernikahan Anda di Wedding Organizer JeWePe');
	// 	$this->email->message('Halo ' . $name . ', Terima kasih telah mempercayakan Wedding Organizer JeWePe untuk hari istimewa Anda! Kami dengan senang hati mengonfirmasi pemesanan paket pernikahan Anda. Tim kami akan segera menghubungi Anda untuk menjadwalkan pertemuan pertama guna membahas detail lebih lanjut dan memastikan semua persiapan berjalan lancar. Jika Anda memiliki pertanyaan atau kebutuhan khusus, jangan ragu untuk menghubungi kami. Sekali lagi, terima kasih telah memilih Wedding Organizer JeWePe. Kami sangat antusias untuk membantu mewujudkan pernikahan impian Anda.');
	// } else {
	// 	$this->email->subject('Pemberitahuan Pembatalan Pemesanan Paket Pernikahan Anda di Wedding Organizer JeWePe');
	// 	$this->email->message('Halo ' . $name . ', Dengan berat hati, kami menginformasikan bahwa kami harus membatalkan pemesanan paket pernikahan Anda di Wedding Organizer JeWePe. Kami sangat menyesal atas ketidaknyamanan ini dan memahami betapa pentingnya hari istimewa Anda.');
	// }

	//Kirim mail
	// if ($this->email->send()) {
	// 	echo 'Email sent successfully';
	// } else {
	// 	echo 'Email not sent successfully';
	// }
	// }

	// kalau menggunakan phpmailer
	// if ($this->phpmailer_lib->load()) {
	// 	echo 'Email sent successfully';
	// } else {
	// 	echo 'Error: Email not sent';
	// }
}
