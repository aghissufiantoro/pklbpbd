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
            ['field' => 'riwayat_penyakit', 'label' => 'Riwayat Penyakit', 'rules' => 'required'],
            ['field' => 'kronologi_darurat_medis', 'label' => 'Kronologi Darurat Medis', 'rules' => 'required'],
            ['field' => 'tindak_lanjut_darurat_medis', 'label' => 'Tindak Lanjut Darurat Medis', 'rules' => 'required'],
            ['field' => 'petugas_di_lokasi_darurat_medis', 'label' => 'Petugas Di Lokasi Darurat Medis', 'rules' => 'required'],
            ['field' => 'dokumentasi_darurat_medis', 'label' => 'Dokumentasi Darurat Medis', 'rules' => 'required']
        ];
    }


=======
            // Add more rules as needed
        ];
    }

    public function get_all_by_id($id_kejadian)
    {
        $this->db->where('id_kejadian', $id_kejadian);
        return $this->db->get($this->_table)->result();
    }


