<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_stockmaster extends CI_Model
{
    private $_table  = "data_master_sembako";

    public function rules()
    {
        return [
            ['field' => 'kode_barang',
            'label' => 'Data Master Sembako',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_barang" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
    
        $this->kode_barang     = $post['kode_barang'];
        $this->nama_barang     = $post['nama_barang'];
        $this->kategori_barang = $post['kategori_barang'];
        $this->unit_barang     = $post['unit_barang'];
    
        $this->db->insert($this->_table, $this);
    }
    
      

    public function update()
    {
        $post = $this->input->post();

        $this->kode_barang     = $post['kode_barang'];
        $this->nama_barang     = $post['nama_barang'];
        $this->kategori_barang = $post['kategori_barang'];
        $this->unit_barang     = $post['unit_barang'];


        $this->db->update($this->_table, $this, array('kode_barang' => $post['kode_barang']));
    }

    public function delete($id)
    {
        // Remove the recursive call $this->delete($id);
        return $this->db->delete($this->_table, array("kode_barang" => $id));
    }
    
}