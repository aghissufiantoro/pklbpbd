<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_form_darurat_medis extends CI_Model
{
    private $_table = "form_darurat_medis";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function rules()
    {
        return [
            ['field' => 'id_kejadian', 'label' => 'ID Kejadian', 'rules' => 'required'],
            ['field' => 'nama', 'label' => 'Nama', 'rules' => 'required'],
            ['field' => 'jenis_kelamin', 'label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'usia', 'label' => 'Usia', 'rules' => 'required|integer'],
            ['field' => 'kondisi', 'label' => 'Kondisi', 'rules' => 'required'],
            ['field' => 'riwayat_penyakit', 'label' => 'Riwayat Penyakit', 'rules' => 'required']
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

    // Add more methods for CRUD operations related to form_darurat_medis if needed
}

