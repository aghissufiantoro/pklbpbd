<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_form_penemuan_jenazah extends CI_Model
{
    private $_table = "form_penemuan_jenazah";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function rules() {
        return [
            ['field' => 'id_kejadian', 'label' => 'ID Kejadian', 'rules' => 'required'],
            ['field' => 'nama_saksi', 'label' => 'Nama Saksi', 'rules' => 'required'],
            ['field' => 'usia_saksi', 'label' => 'Usia Saksi', 'rules' => 'required'],
            ['field' => 'alamat_saksi', 'label' => 'Alamat Saksi', 'rules' => 'required'],
            ['field' => 'nama_korban', 'label' => 'Nama Korban', 'rules' => 'required'],
            ['field' => 'usia_korban', 'label' => 'Usia Korban', 'rules' => 'required'],
            ['field' => 'alamat_korban', 'label' => 'Alamat Korban', 'rules' => 'required'],
            ['field' => 'alamat_domisili_korban', 'label' => 'Alamat Domisili Korban', 'rules' => 'required'],
            ['field' => 'kronologi_penemuan_jenazah', 'label' => 'Kronologi Penemuan Jenazah', 'rules' => 'required'],
            ['field' => 'tindak_lanjut_penemuan_jenazah', 'label' => 'Tindak Lanjut Penemuan Jenzah', 'rules' => 'required'],
            ['field' => 'petugas_di_lokasi_penemuan_jenazah', 'label' => 'Petugas di Lokasi Penemuan Jenazah', 'rules' => 'required'],
            ['field' => 'dokumentasi_penemuan_jenazah', 'label' => 'Dokumentasi Penemuan Jenzah', 'rules' => 'required']
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
    // Add more methods for CRUD operations related to form_penemuan_jenazah
}
