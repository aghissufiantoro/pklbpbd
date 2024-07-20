<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_form_kebakaran extends CI_Model
{
    private $_table = "form_kebakaran";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function rules()
    {
        return [
            ['field' => 'id_kejadian', 'label' => 'ID Kejadian', 'rules' => 'required'],
            ['field' => 'objek_terbakar', 'label' => 'Objek Terbakar', 'rules' => 'required'],
            ['field' => 'luas_terbakar', 'label' => 'Luas Terbakar', 'rules' => 'required'],
            ['field' => 'luas_bangunan', 'label' => 'Luas Bangunan', 'rules' => 'required'],
            ['field' => 'penyebab', 'label' => 'Penyebab', 'rules' => 'required'],
            ['filed' => 'status_bangunan', 'label' => 'Status Bangunan', 'rules' => 'required'],
            ['field' => 'nama', 'label' => 'Nama', 'rules' => 'required'],
            ['field' => 'usia', 'label' => 'Usia', 'rules' => 'required'],
            ['field' => 'jenis_kelamin', 'label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'lebar_jalan', 'label' => 'Lebar Jalan', 'rules' => 'required'],
            ['field' => 'kondisi_bangunan', 'label' => 'Kondisi Bangunan', 'rules' => 'required'],
        ];
    }

    public function save($data)
    {
        return $this->db->insert($this->_table, $data);
    }
    

    public function get_all_by_id($id_kejadian)
    {
        $this->db->where('id_kejadian', $id_kejadian);
        return $this->db->get($this->_table)->result();
    }

    // Add more methods for CRUD operations related to form_kebakaran
}
