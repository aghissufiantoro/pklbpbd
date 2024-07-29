<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_form_laka extends CI_Model
{
    private $_table = "form_laka";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function rules(){
        return [
            ['field' => 'id_kejadian', 'label' => 'ID Kegiatan', 'rules' => 'required'],
            ['field' => 'nama', 'label' => 'Nama', 'rules' => 'required'],
            ['field' => 'jenis_kelamin', 'label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'usia', 'label' => 'Usia', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'kendaraan', 'label' => 'Kendaraan', 'rules' => 'required'],
            ['field' => 'luka', 'label' => 'Luka', 'rules' => 'required'],
            ['field' => 'kondisi', 'label' => 'Kondisi', 'rules' => 'required'],
            ['field' => 'kronologi_laka', 'label' => 'Kronologi Laka', 'rules' => 'required'],
            ['field' => 'tindak_lanjut_laka', 'label' => 'Tindak Lanjut Laka', 'rules' => 'required'],
            ['field' => 'petugas_di_lokasi_laka', 'label' => 'Petugas di Lokasi Laka', 'rules' => 'required'],
            ['field' => 'dokumentasi_laka', 'label' => 'Dokumentasi Laka', 'rules' => 'required']
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

    // Add more methods for CRUD operations related to form_laka
}
