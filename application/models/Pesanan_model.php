<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Ambil semua data pesanan
    public function get_all_pesanan()
    {
        $this->db->select('*');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        $this->db->order_by('tbo.created_at', 'desc');
        $query = $this->db->get();
        return $query;
    }

    // Ambil data pesanan dan buat laporan pesanan yang sudah diterima
    public function get_all_laporan()
    {
        $this->db->select('order_id, tbo.catalogue_id, image, package_name, price, publish_status, Count(*) as jumlah_pesanan');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        $this->db->where('tbo.status', 'approved');
        $this->db->group_by('tbo.catalogue_id');
        $this->db->order_by('tbo.updated_at', 'desc');
        $query = $this->db->get();
        return $query;
    }

    // Ambil data pesanan berdasarkan status dan hitung jumlah datanya
    public function get_count_pesanan($status)
    {
        $this->db->select('*');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        if ($status != 'all') {
            $this->db->where('tbo.status', $status);
        }
        $query = $this->db->get();
        return $query;
    }

    // Cek apakah data pesanan yang diinput ada di database atau tidak
    public function cek_data_pesanan($id, $email, $wedding_date)
    {
        $this->db->select('*');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        $this->db->where('tbo.catalogue_id', $id);
        $this->db->where('tbo.email', $email);
        $this->db->where('tbo.wedding_date', $wedding_date);
        $this->db->order_by('tbo.updated_at', 'desc');
        $query = $this->db->get();
        return $query;
    }

    // Ambil data pesanan berdasarkan id pesanan
    public function get_pesanan_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        $this->db->where('tbo.order_id', $id);
        $query = $this->db->get();
        return $query;
    }

    // Tambah data pesanan
    public function insert($data)
    {
        return $this->db->insert('tb_order', $data);
    }

    // Ubah data pesanan
    public function update($id, $data)
    {
        $this->db->where('order_id', $id);
        $query = $this->db->update('tb_order', $data);
        return $query;
    }

    // Hapus data pesanan
    public function delete_by_id($id)
    {
        $this->db->where('order_id', $id);
        $query = $this->db->delete('tb_order');
        return $query;
    }
}