<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Mendapatkan data profil website
    public function getSettings($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get("tb_profile");
        return $query;
    }

    // Mengupdate data profil website
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('tb_profile', $data);
        return $query;
    }
}