<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('username'))) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Tidak memiliki akses!</div>');
			redirect('login');
		}
		$this->load->model('katalog_model');
		$this->load->model('settings_model');
	}

	// Menampilkan halaman katalog dan mengirim data yang diperlukan halaman
	public function index()
	{
		$data = array(
			'title' => 'Website Wedding JeWePe',
			'page' => 'admin/katalog',
			'getAllKatalog' => $this->katalog_model->get_all_katalog()->result(),
			'settings' => $this->settings_model->getSettings('1')->row()
		);
		$this->load->view('admin/template/main', $data);
	}

	// Menampilkan halaman tambah katalog dan mengirim data yang diperlukan halaman
	public function add()
	{
		$data = array(
			'title' => 'Website Wedding JeWePe',
			'page' => 'admin/add_katalog',
			'settings' => $this->settings_model->getSettings('1')->row()

		);
		$this->load->view('admin/template/main', $data);
	}

	// Menampilkan halaman edit katalog dan mengirim data yang diperlukan halaman
	public function edit()
	{
		if ($this->input->get('id')) {
			$cek_data = $this->katalog_model->get_katalog_by_id($this->input->get('id'))->num_rows();

			if ($cek_data > 0) {
				$data = array(
					'title' => 'Website Wedding JeWePe',
					'page' => 'admin/edit_katalog',
					'katalog' => $this->katalog_model->get_katalog_by_id($this->input->get('id'))->row(),
					'settings' => $this->settings_model->getSettings('1')->row()

				);
				$this->load->view('admin/template/main', $data);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Data Tidak Ditemukan!<i class="remove ti-close" data-dismiss="alert"></i></div>');
				redirect('admin/Katalog');
			}
		} else {
			redirect('admin/Katalog');
		}
	}

	// Menambahkan data katalog
	public function addData()
	{
		if ($this->input->post()) {
			$post = $this->input->post();

			$datetime = date('Y-m-d H:i:s');
			$filename = date('Ymd') . '_' . rand();

			// Menyiapkan data yang akan ditambahkan
			$data = array(
				'package_name' => $post['package_name'],
				'description' => $post['description'],
				'price' => $post['price'],
				'publish_status' => $post['publish_status'],
				'admin_id' => $this->session->userdata('admin_id'),
				'created_at' => $datetime,
				'updated_at' => $datetime,
			);

			// Memasukkan gambar ke folder katalog
			if (!empty($_FILES['image']['name'])) {
				//delete file
				if (file_exists('./assets/files/katalog/' . $_FILES['image']['name']) && $_FILES['image']['name']) {
					unlink('./assets/files/katalog/' . $_FILES['image']['name']);
				}
				$upload = $this->_do_upload($filename);
				$data['image'] = $upload;
			}

			// Tambah data katalog
			$insert = $this->katalog_model->insert($data);

			if ($insert) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil di Simpan!<i class="remove ti-close" data-dismiss="alert"></i></div>');
				redirect('admin/Katalog');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Gagal di Simpan!<i class="remove ti-close" data-dismiss="alert"></i></div>');
				redirect('admin/Katalog');
			}
		} else {
			redirect('admin/Katalog');
		}
	}

	// Mengupdate data katalog
	public function updateData()
	{
		if ($this->input->post()) {
			$post = $this->input->post();

			// Mengecek apakah data katalog yang dicari ada
			$cek_data = $this->katalog_model->get_katalog_by_id($post['id'])->num_rows();

			// Jika ada mulai proses update
			if ($cek_data > 0) {
				$getKatalog = $this->katalog_model->get_katalog_by_id($post['id'])->row();
				$datetime = date('Y-m-d H:i:s');
				$filename = date('Ymd') . '_' . rand();

				// Menyiapkan data yang akan diupdate
				$data = array(
					'package_name' => $post['package_name'],
					'description' => $post['description'],
					'price' => $post['price'],
					'publish_status' => $post['publish_status'],
					'admin_id' => $this->session->userdata('admin_id'),
					'updated_at' => $datetime,
				);

				// Memasukkan gambar ke folder katalog
				if (!empty($_FILES['image']['name'])) {

					//Jika gambar diupdate, hapus gambar sebelumnya
					if (file_exists('./assets/files/katalog/' . $getKatalog->image) && $getKatalog->image) {
						unlink('./assets/files/katalog/' . $getKatalog->image);
					}
					$upload = $this->_do_upload($filename);
					$data['image'] = $upload;
				}

				// Update data katalog
				$update = $this->katalog_model->update($post['id'], $data);

				if ($update) {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil diubah!<i class="remove ti-close" data-dismiss="alert"></i></div>');
					redirect('admin/Katalog');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Gagal diubah!<i class="remove ti-close" data-dismiss="alert"></i></div>');
					redirect('admin/Katalog');
				}
			} else {
				redirect('admin/Katalog');
			}
		}
	}

	// Menghapus data katalog
	public function delete()
	{
		if (!empty($this->input->get('id', true))) {
			$katalog = $this->katalog_model->get_katalog_by_id($this->input->get('id', true))->row();

			// Hapus gambar katalog
			if (file_exists('./assets/files/katalog/' . $katalog->image) && $katalog->image) {
				unlink('./assets/files/katalog/' . $katalog->image);
			}

			// Hapus data katalog
			$delete = $this->katalog_model->delete_by_id($this->input->get('id', true));

			if ($delete) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil dihapus!<i class="remove ti-close" data-dismiss="alert"></i></div>');
				redirect('admin/Katalog');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Gagal dihapus!<i class="remove ti-close" data-dismiss="alert"></i></div>');
				redirect('admin/Katalog');
			}
		} else {
			redirect('admin/Katalog');
		}
	}

	// Proses upload gambar
	private function _do_upload($filename)
	{
		$config['file_name'] = $filename;
		$config['upload_path'] = './assets/files/katalog';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|JPG|JPEG';
		$config['max_size'] = 5000; // 5MB
		$config['created_thumb'] = False;
		$config['quality'] = '90%';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) //upload and validate 
		{
			$data['inputerror'][] = 'image';
			$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
}

