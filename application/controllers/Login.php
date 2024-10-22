<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin_model');
		$this->load->model('settings_model');

	}
	public function index()
	{

		// membuat password untuk admin
		// $pwDefault = password_hash('admin123', PASSWORD_DEFAULT);
		// var_dump($pwDefault);
		// die;

		// validasi username dan password
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		// jika form kosong dan tombol sign in tidak ditekan, tampilkan halaman login
		if ($this->form_validation->run() == false) {
			$data = array(
				'title' => 'Website Wedding JeWePe',
				'getDataWeb' => $this->settings_model->getSettings('1')->row()
			);

			$this->load->view('admin/login', $data);
		} else {
			// jika form diisi dan tombol sign in ditekan, lakukan otentikasi admin
			if ($this->input->post()) {
				$post = $this->input->post();

				//cari user berdasarkan email
				$where1 = $post['email'];
				$where2 = array('username' => $post['email'], 'admin_id' => 1);

				// cara pertama cari user berdasarkan email
				// $admin = $this->admin_model->getAdminByUsername1($where1)->row();

				// cara kedua cari user berdasarkan email
				$admin = $this->admin_model->getAdminByUsername2($where2)->row();


				//Jika user terdaftar
				if ($admin) {
					//periksa password
					$isPasswordTrue = password_verify($post['password'], $admin->password);

					//generate session
					$array = array(
						'admin_id' => $admin->admin_id,
						'username' => $admin->username
					);
					$this->session->set_userdata($array);

					// jika password benar arahkan ke halaman dashboard
					if ($isPasswordTrue) {
						redirect('admin/Dashboard');
						return true;
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Password Salah!</div>');
						redirect('login');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Username Tidak Terdaftar!</div>');
					redirect('login');
				}
			}
		}
	}

	// Melakukan logout dengan menghapus session
	public function logout()
	{
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('login');
	}
}
