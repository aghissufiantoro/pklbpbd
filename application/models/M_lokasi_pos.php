<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_lokasi_pos extends CI_Model
{
    private $_table  = "lokasi_pos";

    public function rules()
    {
        return [            
            ['field' => 'nama_lokasi_pos',
            'label' => 'Alamat artikel',
            'rules' => 'required']
        ];
    }

    function lokasi_pos()
    {
        $this->db->select('*');
        $this->db->from('lokasi_pos');
    
        return $this->db->get()->num_rows();
    }
    function jumlah_data()
    {
        return $this->db->get('lokasi_pos')->num_rows();
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_lokasi_pos" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->nama_lokasi_pos = $post['nama_lokasi_pos'];
        $this->lat_lokasi_pos = $post['lat_lokasi_pos'];
        $this->lon_lokasi_pos = $post['lon_lokasi_pos'];
        $this->kec_lokasi_pos = $post['kecamatan'];
        $this->kel_lokasi_pos = $post['desa'];
        $this->kecamatan = $post['kecamatan'];
        $this->desa = $post['desa'];
        $this->alamat_lokasi_pos = $post['alamat_lokasi_pos'];
        $this->ket_lokasi_pos = $post['ket_lokasi_pos'];
        $this->date_created = date('Y-m-d H:i:s');

        $this->db->insert($this->_table, $this);
    }


    public function update($id)
    {
        $post = $this->input->post();

        $this->nama_lokasi_pos      = $post['nama_lokasi_pos'];
        $this->lat_lokasi_pos       = $post['lat_lokasi_pos'];
        $this->lon_lokasi_pos       = $post['lon_lokasi_pos'];
        $this->kec_lokasi_pos       = $post['kecamatan'];
        $this->kel_lokasi_pos       = $post['desa'];
        $this->alamat_lokasi_pos    = $post['alamat_lokasi_pos'];
        $this->ket_lokasi_pos       = $post['ket_lokasi_pos'];
        $this->date_updated         = date('Y-m-d H:i:s');

        $this->db->update($this->_table, $this, array('id_lokasi_pos' => $id));
    }


    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_lokasi_pos" => $id));
    }

    private function _uploadImage()
    {
        $post = $this->input->post();

        $config['upload_path']          = './upload/pos_pantau/';
        $config['allowed_types']        = 'png|jpg|jpeg|JPG';
        $config['file_name']            = uniqid();
        $config['max_size']             = 50024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_pegawai'))
        {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']    = 'gd2';
            $config['source_image']     = './upload/pos_pantau/'.$gbr['file_name'];
            $config['create_thumb']     = FALSE;
            $config['maintain_ratio']   = FALSE;
            $config['quality']          = '70%';
            $config['width']            = 720;
            $config['height']           = 1280;
            $config['new_image']        = './upload/pos_pantau/'.$gbr['file_name'];
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
            return array_map('unlink', glob(FCPATH."upload/pos_pantau/$filename.*"));
        }
    }

    public function getDesaByKecamatan($kecamatan)
    {
        $this->db->select('desa');
        $this->db->from('wilayah_2022');
        $this->db->where('kecamatan', $kecamatan);
        $query = $this->db->get();
        return $query->result_array();
    }

}