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
<<<<<<< HEAD
=======
            ['field' => 'id_kejadian', 'label' => 'ID Kejadian', 'rules' => 'required'],
>>>>>>> 1f0d5330506277d183445e7d76137c8e49d57f17
            ['field' => 'nama', 'label' => 'Nama', 'rules' => 'required'],
            ['field' => 'jenis_kelamin', 'label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'usia', 'label' => 'Usia', 'rules' => 'required|integer'],
            ['field' => 'kondisi', 'label' => 'Kondisi', 'rules' => 'required'],
<<<<<<< HEAD
            // Add more rules as needed
        ];
    }

=======
            ['field' => 'riwayat_penyakit', 'label' => 'Riwayat Penyakit', 'rules' => 'required'],
            ['field' => 'kronologi_darurat_medis', 'label' => 'Kronologi Darurat Medis', 'rules' => 'required'],
            ['field' => 'tindak_lanjut_darurat_medis', 'label' => 'Tindak Lanjut Darurat Medis', 'rules' => 'required'],
            ['field' => 'petugas_di_lokasi_darurat_medis', 'label' => 'Petugas Di Lokasi Darurat Medis', 'rules' => 'required'],
            ['field' => 'dokumentasi_darurat_medis', 'label' => 'Dokumentasi Darurat Medis', 'rules' => 'required']
        ];
    }


>>>>>>> 1f0d5330506277d183445e7d76137c8e49d57f17
    public function save($data)
    {
        return $this->db->insert($this->_table, $data);
    }

<<<<<<< HEAD
=======

    public function get_all_by_id($id_kejadian)
    {
        $this->db->where('id_kejadian', $id_kejadian);
        return $this->db->get($this->_table)->result();
    }

>>>>>>> 1f0d5330506277d183445e7d76137c8e49d57f17
    // Add more methods for CRUD operations related to form_darurat_medis if needed
}

