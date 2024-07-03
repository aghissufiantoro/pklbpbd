<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kepala_opd extends CI_Model
{
    private $_table  = "kontak_opd";

    public function rules()
    {
        return [            
            ['field' => 'jabatan_kontak_opd',
            'label' => 'Alamat artikel',
            'rules' => 'required']
        ];
    }

    function kontak_opd()
    {
        $this->db->select('*');
        $this->db->from('kontak_opd');
    
        return $this->db->get()->num_rows();
    } 
    function jumlah_data()
    {
        return $this->db->get('kontak_opd')->num_rows();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kontak_opd" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->jabatan_kontak_opd = $post['jabatan_kontak_opd'];
        $this->nama_kontak_opd    = $post['nama_kontak_opd'];
        $this->telp_kontak_opd    = $post['telp_kontak_opd'];

        $this->db->insert($this->_table, $this);
    }    

    public function update()
    {
        $post = $this->input->post();

        $this->jabatan_kontak_opd = $post['jabatan_kontak_opd'];
        $this->nama_kontak_opd    = $post['nama_kontak_opd'];
        $this->telp_kontak_opd    = $post['telp_kontak_opd'];

        $this->db->update($this->_table, $this, array('id_kontak_opd' => $post['id_kontak_opd']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kontak_opd" => $id));
    }
}