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

    public function rules() {
        return [
            ['field' => 'id_kejadian', 'label' => 'ID Kejadian', 'rules' => 'required'],
            ['filed' => 'jenis_pohon', 'label' => 'Jenis Pohon', 'rules' => 'required'],
            ['field' => 'diameter', 'label' => 'Diameter', 'rules' => 'required'],
            ['field' => 'tinggi', 'label' => 'Tinggi', 'rules' => 'required'],
            ['field' => 'tindak_lanjut_pohon_tumbang', 'label' => 'Tindak Lanjut Pohon Tumbang', 'rules' => 'required'],
            ['field' => 'petugas_di_lokasi_pohon_tumbang', 'label' => 'Petugas di Lokasi Pohon Tumbang', 'rules' => 'required'],
            ['field' => 'dokumentasi_pohon_tumbang', 'label' => 'Dokumentasi Pohon Tumbang', 'rules' => 'required']
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

}
