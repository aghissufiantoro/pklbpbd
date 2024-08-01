<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_form_lain extends CI_Model
{
    private $_table = "form_lain";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function rules(){
        return [
            ['field' => 'id_kejadian', 'label' => 'ID Kejadian', 'rules' => 'required'],
            ['field' => 'jenis_kejadian_lain', 'label' => 'Jenis Kejadian Lain', 'rules' => 'required'],
            ['field' => 'nama', 'label' => 'Nama', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'detail_obyek', 'label' => 'Detail Objek', 'rules' => 'required'],
            ['field' => 'kronologi_lain', 'label' => 'Kronologi Lain', 'rules' => 'required'],
            ['field' => 'tindak_lanjut_lain', 'label' => 'Tindak Lanjut Lain', 'rules' => 'required'],
            ['field' => 'petugas_di_lokasi_lain', 'label' => 'Petugas di Lokasi Lain', 'rules' => 'required'],
            ['field' => 'dokumentasi_lain', 'label' => 'Dokumentasi Lain', 'rules' => 'required']
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
    // Add more methods for CRUD operations related to form_lain
}
