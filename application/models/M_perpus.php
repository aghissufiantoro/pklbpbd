<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_perpus extends CI_Model
{
    private $_table  = "perpus";
    private $_table1 = "survey_kepuasan";

    public function rules()
    {
        return [
            ['field' => 'judul_perpus',
            'label' => 'Nama perpus',
            'rules' => 'required']
        ];
    }
    function perpus()
    {
        $this->db->select('*');
        $this->db->from('perpus');
    
        return $this->db->get()->num_rows();
    }
    function jumlah_data()
    {
        return $this->db->get('perpus')->num_rows();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_perpus" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->judul_perpus     = $post['judul_perpus'];
        $this->jenis_perpus     = $post['jenis_perpus'];
        $this->tgl_perpus       = $post['tgl_perpus'];
        $this->ket_perpus       = $post['ket_perpus'];
        $this->thumbnail_perpus = $this->_uploadImage1();
        $this->dok_perpus       = $this->_uploadImage();
        $this->date_created     = date('Y-m-d H:i:s');

        $this->db->insert($this->_table, $this);
    }    

    public function update()
    {
        $post = $this->input->post();

        $this->judul_perpus     = $post['judul_perpus'];
        $this->jenis_perpus     = $post['jenis_perpus'];
        $this->tgl_perpus       = $post['tgl_perpus'];
        $this->ket_perpus       = $post['ket_perpus'];

        $this->date_updated     = date('Y-m-d H:i:s');

        $this->db->update($this->_table, $this, array('id_perpus' => $post['id_perpus']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_perpus" => $id));
    }

    private function _uploadImage()
    {
        //$post = $this->input->post();
        $config['upload_path']      = './upload/perpus/';
        $config['allowed_types']    = 'pdf';
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);
 
        $this->upload->initialize($config);
        if(!empty($_FILES['dok_perpus']['name']))
        {
            if ($this->upload->do_upload('dok_perpus'))
            {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './upload/perpus/'.$gbr['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = FALSE;
                // $config['quality']          = '60%';
                // $config['width']            = 710;
                // $config['height']           = 420;
                $config['new_image']        = './upload/perpus/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                return $this->upload->data("file_name");
            }
        }
        else
        {
            echo "default.png";
        }

        return "default.png";
    }

    private function _uploadImage1()
    {
        //$post = $this->input->post();
        $config['upload_path']      = './upload/perpus/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);
 
        $this->upload->initialize($config);
        if(!empty($_FILES['thumbnail_perpus']['name']))
        {
            if ($this->upload->do_upload('thumbnail_perpus'))
            {
                $gbr1 = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './upload/perpus/'.$gbr1['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = FALSE;
                $config['quality']          = '60%';
                // $config['width']            = 710;
                // $config['height']           = 420;
                $config['new_image']        = './upload/perpus/'.$gbr1['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                return $this->upload->data("file_name");
            }
        }
        else
        {
            echo "default.png";
        }

        return "default.png";
    }

    private function _deleteImage($id)
    {
        $perpus = $this->getById($id);
        if ($perpus->dok_perpus != "default.png") {
            $filename = explode(".", $perpus->dok_perpus)[0];
            return array_map('unlink', glob(FCPATH."upload/perpus/$filename.*"));
        }
    }
}