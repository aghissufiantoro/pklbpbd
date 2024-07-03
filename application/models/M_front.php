<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_front extends CI_Model
{
    private $_table  = "artikel";
    private $_table1 = "survey_kepuasan";

    public function rules()
    {
        return [
            ['field' => 'judul_artikel',
            'label' => 'Nama artikel',
            'rules' => 'required'],

            ['field' => 'tgl_artikel',
            'label' => 'Jenis kelamin artikel',
            'rules' => 'required'],
            
            ['field' => 'isi_artikel',
            'label' => 'Alamat artikel',
            'rules' => 'required']
        ];
    }

    public function rules1()
    {
        return [
            ['field' => 'nama_survey',
            'label' => 'Nama artikel',
            'rules' => 'required']
        ];
    }

    function kabupaten($provId)
    {
        $kabupaten = "<option value=''>--- Pilih Kabupaten / Kota ---</option>";

        $this->db->order_by('name','ASC');
        $kab = $this->db->get_where('regencies',array('province_id'=>$provId));

        foreach ($kab->result_array() as $data )
        {
            $kabupaten .= "<option value='$data[id]'>$data[name]</option>";
        }

        return $kabupaten;

    }

    function kecamatan($kabId)
    {
        $kecamatan = "<option value=''>--- Pilih kecamatan ---</option>";

        $this->db->order_by('name','ASC');
        $kec= $this->db->get_where('districts',array('regency_id'=>$kabId));

        foreach ($kec->result_array() as $data )
        {
            $kecamatan .= "<option value='$data[id]'>$data[name]</option>";
        }

        return $kecamatan;
    }

    function kelurahan($kecId)
    {
        $kelurahan="<option value=''>--- Pilih kelurahan / desa ---</option>";

        $this->db->order_by('name','ASC');
        $kel= $this->db->get_where('villages',array('district_id'=>$kecId));

        foreach ($kel->result_array() as $data )
        {
            $kelurahan.= "<option value='$data[id]'>$data[name]</option>";
        }

        return $kelurahan;
    }

    function data($number, $offset)
    {
        $this->db->order_by("tgl_artikel", "desc");
        return $query = $this->db->get('artikel', $number, $offset)->result();       
    }

    function jumlah_data()
    {
        return $this->db->get('artikel')->num_rows();
    }

    function get_post_by_slug($slug)
    { 
        $hsl = $this->db->query("SELECT * FROM artikel WHERE slug_artikel = '$slug'");
        return $hsl;
    }

    function get_artikel_list($limit, $start)
    {
        $query = $this->db->get('artikel', $limit, $start);
        return $query;
    }
    
    function get_all_post()
    { 
        $hsl = $this->db->query("SELECT * FROM artikel ORDER BY slug_artikel DESC");
        return $hsl;
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAllHasilSurvey()
    {
        return $this->db->get($this->_table1)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_artikel" => $id])->row();
    }

    public function save_survey()
    {
        $post = $this->input->post();
        $this->nama_survey       = $post['nama_survey'];
        $this->alamat_survey     = $post['alamat_survey'];
        $this->prov_survey       = $post['prov_survey'];
        $this->kota_kab_survey   = $post['kota_kab_survey'];
        $this->kec_survey        = $post['kec_survey'];
        $this->kel_survey        = $post['kel_survey'];
        $this->nilai             = $post['nilai'];
        $this->alasan            = $post['alasan'];
        $this->status            = "Tampil";
        $this->date_created      = date('Y-m-d H:i:s');
        
        $this->db->insert($this->_table1, $this);
    }

    public function save()
    {
        $post = $this->input->post();
        $judul = strtolower($post['judul_artikel']);

        //Buat slug
        $string   = preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", " ", $judul); //filter karakter unik dan replace dengan kosong ('')
        $trim     = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
        $pre_slug = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
        $slug     = $pre_slug.'.html'; // tambahkan ektensi .html pada slug

        $this->penulis_artikel  = $post['penulis_artikel'];
        $this->judul_artikel    = ucwords($post['judul_artikel']);
        $this->slug_artikel     = $slug;
        $this->tgl_artikel      = $post['tgl_artikel'];
        $this->jenis_artikel    = $post['jns_artikel'];
        $this->moto_artikel     = NULL;
        $this->isi_artikel      = $post['isi_artikel'];
        $this->foto_artikel     = $this->_uploadImage();
        $this->foto_artikel1    = $this->_uploadImage1();
        $this->foto_artikel2    = $this->_uploadImage2();
        $this->date_created     = date('Y-m-d H:i:s');

        $this->db->insert($this->_table, $this);
    }    

    public function update()
    {
        $post = $this->input->post();

        $judul = strtolower($post['judul_artikel']);

        //Buat slug
        $string   = preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", " ", $judul); //filter karakter unik dan replace dengan kosong ('')
        $trim     = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
        $pre_slug = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
        $slug     = $pre_slug.'.html'; // tambahkan ektensi .html pada slug

        $this->id_artikel       = $post['id_artikel'];
        $this->penulis_artikel  = $post['penulis_artikel'];
        $this->judul_artikel    = ucwords($post['judul_artikel']);
        $this->slug_artikel     = $slug;
        $this->tgl_artikel      = $post['tgl_artikel'];
	    $this->jenis_artikel    = $post['jns_artikel'];
        $this->moto_artikel     = NULL;
        $this->isi_artikel      = $post['isi_artikel'];

        if (!empty($_FILES["foto_artikel"]["name"]))
        {
            $this->foto_artikel = $this->_uploadImage();
        }
        else
        {
            $this->foto_artikel = $post['foto_old'];
        }

        if (!empty($_FILES["foto_artikel1"]["name"]))
        {
            $this->foto_artikel1 = $this->_uploadImage1();
        }
        else
        {
            $this->foto_artikel1 = $post['foto_old1'];
        }

        if (!empty($_FILES["foto_artikel2"]["name"]))
        {
            $this->foto_artikel2 = $this->_uploadImage2();
        }
        else
        {
            $this->foto_artikel2 = $post['foto_old2'];
        }

        $this->date_updated     = date('Y-m-d H:i:s');

        $this->db->update($this->_table, $this, array('id_artikel' => $post['id_artikel']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_artikel" => $id));
    }

    private function _uploadImage()
    {
        //$post = $this->input->post();
        $config['upload_path']      = './upload/kegiatan/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);
 
        $this->upload->initialize($config);
        if(!empty($_FILES['foto_artikel']['name']))
        {
            if ($this->upload->do_upload('foto_artikel'))
            {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './upload/kegiatan/'.$gbr['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = FALSE;
                $config['quality']          = '60%';
                // $config['width']            = 710;
                // $config['height']           = 420;
                $config['new_image']        = './upload/kegiatan/'.$gbr['file_name'];
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
        $config['upload_path']      = './upload/kegiatan/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);
 
        $this->upload->initialize($config);
        if(!empty($_FILES['foto_artikel1']['name']))
        {
            if ($this->upload->do_upload('foto_artikel1'))
            {
                $gbr1 = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './upload/kegiatan/'.$gbr1['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = FALSE;
                $config['quality']          = '60%';
                // $config['width']            = 710;
                // $config['height']           = 420;
                $config['new_image']        = './upload/kegiatan/'.$gbr1['file_name'];
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

    private function _uploadImage2()
    {
        //$post = $this->input->post();
        $config['upload_path']      = './upload/kegiatan/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);
 
        $this->upload->initialize($config);
        if(!empty($_FILES['foto_artikel2']['name']))
        {
            if ($this->upload->do_upload('foto_artikel2'))
            {
                $gbr2 = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './upload/kegiatan/'.$gbr2['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = FALSE;
                $config['quality']          = '60%';
                // $config['width']            = 710;
                // $config['height']           = 420;
                $config['new_image']        = './upload/kegiatan/'.$gbr2['file_name'];
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
        $artikel = $this->getById($id);
        if ($artikel->foto_artikel != "default.png") {
            $filename = explode(".", $artikel->foto_artikel)[0];
            return array_map('unlink', glob(FCPATH."upload/kegiatan/$filename.*"));
        }
    }
}