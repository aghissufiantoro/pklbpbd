<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    private $_table  = "data_pegawai";

    public function rules()
    {
        return [            
            ['field' => 'ni_pegawai',
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
        return $this->db->get('artikel')->num_rows();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pegawai" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->ni_pegawai        = $post['ni_pegawai'];
        $this->tmp_lahir_pegawai = $post['tmp_lahir_pegawai'];
        $this->tgl_lahir_pegawai = $post['tgl_lahir_pegawai'];
        $this->instansi_pegawai  = $post['instansi_pegawai'];
        $this->pangkat_pegawai   = $post['pangkat_pegawai'];
        $this->golongan_pegawai  = $post['golongan_pegawai'];
        $this->jabatan_pegawai   = $post['jabatan_pegawai'];
        $this->plt_pegawai       = $post['plt_pegawai'];
        $this->eselon_pegawai    = $post['eselon_pegawai'];
        $this->nama_pegawai      = $post['nama_pegawai'];
        $this->jk_pegawai        = $post['jk_pegawai'];
        $this->foto_pegawai      = $this->_uploadImage();
        $this->date_created      = date('Y-m-d H:i:s');

        $this->db->insert($this->_table, $this);
    }    

    public function update()
    {
        $post = $this->input->post();

        $this->id_pegawai        = $post['id_pegawai'];
        $this->ni_pegawai        = $post['ni_pegawai'];
        $this->tmp_lahir_pegawai = $post['tmp_lahir_pegawai'];
        $this->tgl_lahir_pegawai = $post['tgl_lahir_pegawai'];
        $this->instansi_pegawai  = $post['instansi_pegawai'];
        $this->pangkat_pegawai   = $post['pangkat_pegawai'];
        $this->golongan_pegawai  = $post['golongan_pegawai'];
        $this->jabatan_pegawai   = $post['jabatan_pegawai'];
        $this->plt_pegawai       = $post['plt_pegawai'];
        $this->eselon_pegawai    = $post['eselon_pegawai'];
        $this->nama_pegawai      = $post['nama_pegawai'];
        $this->jk_pegawai        = $post['jk_pegawai'];
        $this->date_created      = date('Y-m-d H:i:s');

        if (!empty($_FILES["foto_pegawai"]["name"]))
        {
            $this->foto_pegawai = $this->_uploadImage();
        }
        else
        {
            $this->foto_pegawai = $post['foto_old'];
        }

        $this->date_updated     = date('Y-m-d H:i:s');

        $this->db->update($this->_table, $this, array('id_pegawai' => $post['id_pegawai']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_pegawai" => $id));
    }

    private function _uploadImage()
    {
        $post = $this->input->post();

        $config['upload_path']          = './upload/pegawai/';
        $config['allowed_types']        = 'png|jpg|jpeg|JPG';
        $config['file_name']            = uniqid();
        $config['max_size']             = 50024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_pegawai'))
        {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']    = 'gd2';
            $config['source_image']     = './upload/pegawai/'.$gbr['file_name'];
            $config['create_thumb']     = FALSE;
            $config['maintain_ratio']   = FALSE;
            $config['quality']          = '70%';
            $config['width']            = 720;
            $config['height']           = 1280;
            $config['new_image']        = './upload/pegawai/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $gbr['file_name'];
        }
        
        return "default.png";
    }

    private function _deleteImage($id)
    {
        $artikel = $this->getById($id);
        if ($artikel->foto_pegawai != "default.png") {
            $filename = explode(".", $artikel->foto_pegawai)[0];
            return array_map('unlink', glob(FCPATH."upload/foto_pegawai/$filename.*"));
        }
    }
}