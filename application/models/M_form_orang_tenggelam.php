<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_form_orang_tenggelam extends CI_Model
{
    private $_table = "form_orang_tenggelam";

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
            ['field' => 'hubungan_saksi', 'label' => 'Hubungan dengan Korban', 'rules' => 'required'],
            ['field' => 'nama_korban', 'label' => 'Nama Korban', 'rules' => 'required'],
            ['field' => 'usia_korban', 'label' => 'Usia Korban', 'rules' => 'required'],
            ['field' => 'jenis_kelamin', 'label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat Korban', 'rules' => 'required'],
            ['field' => 'kondisi', 'label' => 'Kondisi', 'rules' => 'required'],
            ['field' => 'kronologi_orang_tenggelam', 'label' => 'Kronologi Orang Tenggelam', 'rules' => 'required'],
            ['field' => 'tindak_lanjut_orang_tenggelam', 'label' => 'Tindak LanjutOrang Tenggelam', 'rules' => 'required'],
            ['field' => 'petugas_di_lokasi_orang_tenggelam', 'label' => 'Petugas di Lokasi Orang Tenggelam', 'rules' => 'required'],
            ['field' => 'dokumentasi_orang_tenggelam', 'label' => 'Dokumentasi Orang Tenggelam', 'rules' => 'required']
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

    // Add more methods for CRUD operations related to form_orang_tenggelam
}
