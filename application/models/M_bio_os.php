<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_bio_os extends CI_Model
{
	private $_table  = "bio_os";
	private $_table1 = "user";

	public function rules()
	{
		return [
			['field' => 'nama_bio_os',
			'label' => 'Nama bio_os',
			'rules' => 'required']
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}
	
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_bio_os" => $id])->row();
	}

	public function upload_foto()
	{
		$nik = $this->session->userdata('username');
		$this->foto_bio_os = $this->_uploadImage();
		$this->db->update($this->_table, $this, array('nik' => $nik));
	}

	public function insertimport($data)
    {
        $this->db->insert_batch('bio_os', $data);
        return $this->db->insert_id();
    }

	public function save()
	{
		$post = $this->input->post();
		$this->nama_bio_os   	= strtoupper($post['nama_bio_os']);
		$this->nik_bio_os 		= $post['nik_bio_os'];
		$this->no_telp_bio_os 	= $post['no_telp_bio_os'];
		$this->email_bio_os 	= $post['email_bio_os'];
		$this->ttl_bio_os     	= $post['ttl_bio_os'];
		$this->almt_bio_os 		= $post['almt_bio_os'];
		$this->pnd_trk_bio_os 	= $post['pnd_trk_bio_os'];
		$this->jk_bio_os 		= $post['jk_bio_os'];
		$this->agm_bio_os 		= $post['agm_bio_os'];
		$this->jbt_bio_os 		= $post['jbt_bio_os'];
		$this->kpl_bio_os 		= $post['kpl_bio_os'];
		$this->prk_bio_os 		= $post['prk_bio_os'];
		$this->tm_bio_os 		= $post['tm_bio_os'];
		$this->foto_bio_os    	= $this->_uploadImage();
		$this->date_created 	= date('Y-m-d H:i:s');
		
		$this->db->insert($this->_table, $this);
	}

	public function tambah_bio()
	{
		$post = $this->input->post();
		
		$this->nik_bio_os 		= $post['nik_bio_os'];
		$this->nama_bio_os   	= strtoupper($post['nama_bio_os']);
		$this->almt_bio_os 		= $post['almt_bio_os'];
		$this->no_telp_bio_os 	= $post['no_telp_bio_os'];
		$this->email_bio_os 	= $post['email_bio_os'];
		$this->prk_bio_os 		= $post['prk_bio_os'];
		$this->tmp_lahir_bio_os = $post['tmp_lahir_bio_os'];
		$this->tgl_lahir_bio_os = $post['tgl_lahir_bio_os'];
		$this->jk_bio_os 		= $post['jk_bio_os'];
		$this->agm_bio_os 		= $post['agm_bio_os'];
		$this->tmt_awal_bio_os 	= $post['tmt_awal_bio_os'];
		$this->pnd_bio_os 		= $post['pnd_bio_os'];
		$this->jurusan_bio_os 	= $post['jurusan_bio_os'];
		$this->asal_sklh_bio_os = $post['asal_sklh_bio_os'];
		$this->foto_bio_os    = $this->_uploadImage();
		$this->date_created 	= date('Y-m-d H:i:s');
		
		$this->db->insert($this->_table, $this);
	}

	public function approve()
	{
		$post = $this->input->post();
		$id_bio_os 		= $post['id_bio_os'];
		$nama_os      	= $post['nama_os'];
		$tgl_os       	= $post['tgl_os'];
		$nama_bio_os 	= $post['nama_bio_os'];
		$status_bio_os = $post['status_bio_os'];
		$date_approve 	= date('Y-m-d H:i:s');
		
		$this->db->query("UPDATE bio_os SET status_bio_os = '$status_bio_os' WHERE id_bio_os = '$id_bio_os'");
	}

	public function update()
	{
		$post = $this->input->post();

		$this->id_bio_os 			= $post['id_bio_os'];
		$this->nama_bio_os   	= strtoupper($post['nama_bio_os']);
		$this->nik_bio_os 		= $post['nik_bio_os'];
		$this->no_telp_bio_os 	= $post['no_telp_bio_os'];
		$this->email_bio_os 	= $post['email_bio_os'];
		$this->ttl_bio_os     = $post['ttl_bio_os'];
		$this->almt_bio_os 		= $post['almt_bio_os'];
		$this->pnd_trk_bio_os = $post['pnd_trk_bio_os'];
		$this->jk_bio_os 			= $post['jk_bio_os'];
		$this->agm_bio_os 		= $post['agm_bio_os'];
		$this->jbt_bio_os 		= $post['jbt_bio_os'];
		$this->kpl_bio_os 		= $post['kpl_bio_os'];
		$this->tm_bio_os 			= $post['tm_bio_os'];
		$this->date_updated 	= date('Y-m-d H:i:s');

		$this->db->update($this->_table, $this, array('id_bio_os' => $post['id_bio_os']));
	}

	public function update_pass()
	{
		$post = $this->input->post();

		$this->password  		= password_hash($post['newPassword'], PASSWORD_BCRYPT);

		$this->db->update($this->_table1, $this, array('username' => $post['username']));
	}

	public function update_bio()
	{
		$post = $this->input->post();

		$this->id_bio_os 		=	 $post['id_bio_os'];
		$this->nik_bio_os 			= $post['nik_bio_os'];
		$this->nama_bio_os   		= strtoupper($post['nama_bio_os']);
		$this->almt_bio_os 			= $post['almt_bio_os'];
		$this->no_telp_bio_os 		= $post['no_telp_bio_os'];
		$this->email_bio_os 		= $post['email_bio_os'];
		$this->prk_bio_os 			= $post['prk_bio_os'];
		$this->tmp_lahir_bio_os 	= $post['tmp_lahir_bio_os'];
		$this->tgl_lahir_bio_os 	= $post['tgl_lahir_bio_os'];
		$this->jk_bio_os 			= $post['jk_bio_os'];
		$this->agm_bio_os 			= $post['agm_bio_os'];
		$this->jbt_bio_os 			= $post['jbt_bio_os'];
		$this->unit_kerja_bio_os	= $post['unit_kerja_bio_os'];
		$this->tmt_awal_bio_os 		= $post['tmt_awal_bio_os'];
		$this->pnd_bio_os 			= $post['pnd_bio_os'];
		$this->jurusan_bio_os 		= $post['jurusan_bio_os'];
		$this->asal_sklh_bio_os 	= $post['asal_sklh_bio_os'];
		
		if (empty($_FILES['foto_bio_os']['name']))
		{
			$this->foto_bio_os = $post['foto_lawas'];
		}
		else
		{
			$this->foto_bio_os = $this->_uploadImage();
		}

		$this->date_updated 	= date('Y-m-d H:i:s');

		$this->db->update($this->_table, $this, array('id_bio_os' => $post['id_bio_os']));
	}

	public function delete($id)
	{
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("id_bio_os" => $id));
	}

	public function approvel($id)
	{
		$approved_by = $this->session->userdata('nama_depan')." ".$this->session->userdata('nama_belakang');
		$date_approve = date('Y-m-d H:i:s');
		return $this->db->query("UPDATE bio_os SET status_bio_os = 'Approved', approved_by_bio_os = '$approved_by', date_approve = '$date_approve' WHERE id_bio_os = '$id'");
	}

	private function _uploadImage()
	{
		$post = $this->input->post();

        $config['upload_path']          = './upload/bio_os/';
        $config['allowed_types']        = 'png|jpg|jpeg';
        $config['file_name']            = $nik;
        $config['max_size']             = 50024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_os'))
        {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']    = 'gd2';
            $config['source_image']     = './upload/bio_os/'.$gbr['file_name'];
            $config['create_thumb']     = FALSE;
            $config['maintain_ratio']   = FALSE;
            $config['quality']          = '70%';
            $config['width']            = 1280;
            $config['height']           = 720;
            $config['new_image']        = './upload/bio_os/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $gbr['file_name'];
        }
        
        return "default.png";
	}

	private function _deleteImage($id)
	{
		$artikel = $this->getById($id);
		if ($artikel->foto_bio_os != "default.png") {
			$filename = explode(".", $artikel->foto_bio_os)[0];
			return array_map('unlink', glob(FCPATH."upload/bio_os/$filename.*"));
		}
	}

	function simpan_upload($image){
		$nik = $this->session->userdata('username');

        $data = array(
                'foto_bio_os' => $image
            );  
        $result= $this->db->update($this->_table, $data, array('nik_bio_os' => $nik));
        return $result;
    }

	private function konv_uang($angka)
    {
        $jadi = str_replace(".","",$angka);
        return $jadi;
    }

    // Fungsi untuk melakukan proses upload file
  public function upload_file($filename)
  {
    $this->load->library('upload'); // Load librari upload

    $config['upload_path'] = './upload/bio_os/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '5000';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;

    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')) // Lakukan upload dan Cek jika proses upload berhasil
    { 
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }
    else
    {
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data)
  {
    $this->db->insert_batch('bio_os', $data);
  }
}