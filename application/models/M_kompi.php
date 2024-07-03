<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kompi extends CI_Model
{
    private $_table  = "data_kompi";

    public function rules()
    {
        return [            
            ['field' => 'nama_petugas',
            'label' => 'Alamat artikel',
            'rules' => 'required']
        ];
    }

    public function rules1()
    {
        return [
            ['field' => 'instansi_pegawai',
            'label' => 'Nama artikel',
            'rules' => 'required']
        ];
    }

    function jumlah_data()
    {
        return $this->db->get('kompi')->num_rows();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_petugas" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->jenis_kompi       = $post['jenis_kompi'];
        $this->regu              = $post['regu'];
        $this->kedudukan         = $post['kedudukan'];
        $this->nama_petugas      = $post['nama_petugas'];
        $this->jenis_kelamin     = $post['jenis_kelamin'];

        $this->db->insert($this->_table, $this);
    }    

    public function update()
    {
        $post = $this->input->post();

        $this->jenis_kompi       = $post['jenis_kompi'];
        $this->regu              = $post['regu'];
        $this->kedudukan         = $post['kedudukan'];
        $this->nama_petugas      = $post['nama_petugas'];
        $this->jenis_kelamin     = $post['jenis_kelamin'];

        $this->db->update($this->_table, $this, array('id_petugas' => $post['id_petugas']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_petugas" => $id));
    }
}
