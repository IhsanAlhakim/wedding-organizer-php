<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Katalog_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Ambil semua data katalog dari database
    public function get_all_katalog()
    {
        $this->db->select('*');
        $this->db->from('tb_catalogues tbc');
        $this->db->join('tb_admin tba', 'tba.admin_id = tbc.admin_id');
        $this->db->order_by('tbc.created_at', 'desc');
        $query = $this->db->get();
        return $query;
    }

    // Ambil semua data katalog dari database untuk halaman landing
    public function get_all_katalog_landing()
    {
        $this->db->select('*');
        $this->db->from('tb_catalogues tbc');
        $this->db->join('tb_admin tba', 'tba.admin_id = tbc.admin_id');
        $this->db->where('tbc.publish_status', 'Y');
        $this->db->order_by('tbc.created_at', 'desc');
        $query = $this->db->get();
        return $query;
    }

    // Ambil data katalog dari database berdasarkan id katalog
    public function get_katalog_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_catalogues tbc');
        $this->db->join('tb_admin tba', 'tba.admin_id = tbc.admin_id');
        $this->db->where('tbc.catalogue_id', $id);
        $query = $this->db->get();
        return $query;
    }

    // Tambah data katalog
    public function insert($data)
    {
        return $this->db->insert('tb_catalogues', $data);
    }

    // Ubah data katalog
    public function update($id, $data)
    {
        $this->db->where('catalogue_id', $id);
        $query = $this->db->update('tb_catalogues', $data);
        return $query;
    }

    // Hapus data katalog
    public function delete_by_id($id)
    {
        $this->db->where('catalogue_id', $id);
        $query = $this->db->delete('tb_catalogues');
        return $query;
    }
}