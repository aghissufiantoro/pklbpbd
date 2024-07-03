<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_tugasharian extends CI_Model
{
    private $_table   = "tugas_harian";        

    public function rules_harian()
    {
        return [
            ['field' => 'tgl_tugas_harian',
            'label' => 'Tanggal / jam',
            'rules' => 'required'],

            ['field' => 'tempat_tugas_harian',
            'label' => 'Tempat / lokasi',
            'rules' => 'required'],

            ['field' => 'perihal_tugas_harian',
            'label' => 'Perihal / nama kegiatan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getByDate($date)
    {
        return $this->db->get_where($this->_table, ["tgl_tugas_harian" => $date])->row();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_tugas_harian" => $id])->row();
    }

    public function save_harian()
    {
        $post = $this->input->post();

        $this->tanggungjawab_tugas_harian   = $post['tanggungjawab_tugas_harian'];
        $this->tgl_tugas_harian             = $post['tgl_tugas_harian'];
        $this->jam_tugas_harian             = $post['jam_tugas_harian'];
        $this->no_surat_tugas_harian        = $post['no_surat_tugas_harian'];
        $this->tempat_tugas_harian          = strtoupper($post['tempat_tugas_harian']);
        $this->perihal_tugas_harian         = strtoupper($post['perihal_tugas_harian']);
        $this->petugas_tugas_harian         = $post['petugas_tugas_harian'];
        $this->status_tugas_harian          = "Pending";
        $this->hasil_tugas_harian           = "";
        $this->ket_tugas_harian             = ucwords($post['ket_tugas_harian']);
        $this->date_created                 = date('Y-m-d H:i:s');

        $this->db->insert($this->_table, $this);
    }

    public function update_harian()
    {
        $post = $this->input->post();
        
        $this->id_tugas_harian              = $post['id_tugas_harian'];
        $this->tanggungjawab_tugas_harian   = $post['tanggungjawab_tugas_harian'];
        $this->tgl_tugas_harian             = $post['tgl_tugas_harian'];
        $this->jam_tugas_harian             = $post['jam_tugas_harian'];
        $this->no_surat_tugas_harian        = $post['no_surat_tugas_harian'];
        $this->tempat_tugas_harian          = strtoupper($post['tempat_tugas_harian']);
        $this->perihal_tugas_harian         = strtoupper($post['perihal_tugas_harian']);
        $this->petugas_tugas_harian         = $post['petugas_tugas_harian'];
        $this->status_tugas_harian          = "Telah dilaksanakan";
        $this->hasil_tugas_harian           = $post['hasil_tugas_harian'];
        $this->ket_tugas_harian             = ucwords($post['ket_tugas_harian']);
        $this->date_updated                 = date('Y-m-d H:i:s');

        $this->db->update($this->_table, $this, array('id_tugas_harian' => $post['id_tugas_harian']));
    }

    public function delete_harian($id)
    {
        return $this->db->delete($this->_table, array("id_tugas_harian" => $id));
    }
}
