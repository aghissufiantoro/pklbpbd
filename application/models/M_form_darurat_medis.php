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

    public function save($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    // Add more methods for CRUD operations related to form_darurat_medis
}
