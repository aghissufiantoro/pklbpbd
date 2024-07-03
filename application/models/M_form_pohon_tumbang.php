<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_form_pohon_tumbang extends CI_Model
{
    private $_table = "form_pohon_tumbang";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save($data)
    {
        return $this->db->insert($this->_table, $data);
    }

}
