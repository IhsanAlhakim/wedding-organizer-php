<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('username'))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Tidak memiliki akses!</div>');
            redirect('login');
        }
        $this->load->model('settings_model');
    }

    // Menampilkan halaman setting dan mengirim data yang diperlukan halaman
    public function index()
    {
        $data = array(
            'title' => 'Website Wedding JeWePe',
            'page' => 'admin/settings',
            'settings' => $this->settings_model->getSettings('1')->row()
        );
        $this->load->view('admin/template/main', $data);
    }

    // Melakukan update data setting profil website
    public function updateData()
    {
        $post = $this->input->post();

        if ($post) {
            // Mengecek apakah data setting ada
            $cek_id = $this->settings_model->getSettings($post['id'])->num_rows();

            // Jika data setting ada maka update data setting
            if ($cek_id > 0) {
                $getSettings = $this->settings_model->getSettings($post['id'])->row();
                $filename = date('Ymd') . '_' . rand();

                $datetime = date('Y-m-d H:i:s');

                // Menyiapkan data yang akan diupdate
                $data = array(
                    'website_name' => $post['website_name'],
                    'phone_number1' => $post['phone_number1'],
                    'phone_number2' => $post['phone_number2'],
                    'email1' => $post['email1'],
                    'email2' => $post['email2'],
                    'address' => $post['address'],
                    'maps' => $post['maps'],
                    'facebook_url' => $post['facebook_url'],
                    'instagram_url' => $post['instagram_url'],
                    'youtube_url' => $post['youtube_url'],
                    'header_business_hour' => $post['header_business_hour'],
                    'time_business_hour' => $post['time_business_hour'],
                    'updated_at' => $datetime,
                );

                // Memasukan logo ke folder files
                if (!empty($_FILES['logo']['name'])) {

                    //Jika update logo, hapus logo sebelumnya
                    if (file_exists('./assets/files/' . $getSettings->logo) && $getSettings->logo) {
                        unlink('./assets/files/' . $getSettings->logo);
                    }

                    // upload logo
                    $upload = $this->_do_upload($filename);
                    $data['logo'] = $upload;
                }

                // update data setting
                $update = $this->settings_model->update($_POST['id'], $data);

                if ($update) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil di Update!<i class="remove ti-close" data-dismiss="alert"></i></div>');
                    redirect('admin/Settings');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Gagal di Update!<i class="remove ti-close" data-dismiss="alert"></i></div>');
                    redirect('admin/Settings');
                }
            } else {
                redirect('admin/Settings');
            }
        }
    }

    // Proses upload logo
    private function _do_upload($filename)
    {
        $config['file_name'] = $filename;
        $config['upload_path'] = './assets/files/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|JPG|JPEG';
        $config['max_size'] = 5000; // 5MB
        $config['created_thumb'] = False;
        $config['quality'] = '90%';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('logo')) //upload and validate 
        {
            $data['inputerror'][] = 'logo';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');

    }
}
