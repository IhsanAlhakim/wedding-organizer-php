<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Ambil data admin berdasarkan username dari database cara ke 1
    public function getAdminByUsername1($username)
    {
        $sql = 'select * from tb_admin where username = ' . $this->db->escape($username);
        $query = $this->db->query($sql);
        return $query;
    }

    // Ambil data admin berdasarkan username dari database cara ke 2
    public function getAdminByUsername2($where)
    {
        return $this->db->select('admin_id, name, username, password, created_at, updated_at')->from('tb_admin')->where($where)->get();
    }

    // Ambil data admin berdasarkan username dari database cara ke 3
    public function getAdminByUsername3($username)
    {
        $this->db->select('admin_id, username, password');
        $this->db->where('username', $username);
        $query = $this->db->get('tb_admin');
        return $query;
    }

    // Ambil semua data admin dari database
    public function getAllAdmin()
    {
        $this->db->order_by('admin_id', 'desc');
        $query = $this->db->get('tb_admin');
        return $query;
    }
}

