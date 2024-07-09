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
            ['field' => 'nama', 'label' => 'Nama', 'rules' => 'required'],
            ['field' => 'jenis_kelamin', 'label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'usia', 'label' => 'Usia', 'rules' => 'required|integer'],
            ['field' => 'kondisi', 'label' => 'Kondisi', 'rules' => 'required'],
            // Add more rules as needed
        ];
    }

    public function save($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    // Add more methods for CRUD operations related to form_darurat_medis if needed
}

