<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_giat_os extends CI_Model
{
	private $_table  = "giat_os";

	public function rules()
	{
		return [
			['field' => 'nama_os',
			'label' => 'Nama giat_os',
			'rules' => 'required']
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}
	
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_giat_os" => $id])->row();
	}

	public function insertimport($data)
    {
        $this->db->insert_batch('giat_os', $data);
        return $this->db->insert_id();
    }

	public function save()
	{
		$post = $this->input->post();
		$this->id_bio_os 		= $post['id_bio_os'];
		$this->nama_os      	= strtoupper($post['nama_os']);
		$this->nik_giat_os 		= $post['nik_giat_os'];
		$this->tgl_giat_os      = $post['tgl_giat_os'];
		$this->nama_giat_os 	= $post['nama_giat_os'];
		$this->foto_giat_os	 	= $this->_uploadImage();

		if ($this->session->userdata('username') == "3526011409000001")
		{
			$this->date_created = $post['tgl_giat_os']." ".date('H:i:s');
		}
		else
		{
			$this->date_created = date('Y-m-d H:i:s');
		}		
		
		$this->db->insert($this->_table, $this);
	}

	public function approve()
	{
		$post = $this->input->post();
		$id_giat_os 	= $post['id_giat_os'];
		$nama_os      	= $post['nama_os'];
		$tgl_giat_os    = $post['tgl_giat_os'];
		$nama_giat_os 	= $post['nama_giat_os'];
		$status_giat_os = $post['status_giat_os'];
		$date_approve 	= date('Y-m-d H:i:s');
		
		$this->db->query("UPDATE giat_os SET status_giat_os = '$status_giat_os' WHERE id_giat_os = '$id_giat_os'");
	}

	public function update()
	{
		$post = $this->input->post();

		$this->id_giat_os 	= $post['id_giat_os'];
		$this->nama_os      = strtoupper($post['nama_os']);
		$this->nik_giat_os 	= $post['nik_giat_os'];
		$this->tgl_giat_os  = $post['tgl_giat_os'];
		$this->nama_giat_os = $post['nama_giat_os'];

		if (empty($_FILES['foto_giat_os']['name']))
	    {
	        $this->foto_giat_os = $post['foto_lawas'];
	    }
	    else
	    {
	        $this->foto_giat_os = $this->_uploadImage();
	    }

		$this->date_updated = date('Y-m-d H:i:s');

		$this->db->update($this->_table, $this, array('id_giat_os' => $post['id_giat_os']));
	}

	public function delete($id)
	{
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("id_giat_os" => $id));
	}

	public function approvel($id)
	{
		$approved_by = $this->session->userdata('nama_depan')." ".$this->session->userdata('nama_belakang');
		$date_approve = date('Y-m-d H:i:s');
		return $this->db->query("UPDATE giat_os SET status_giat_os = 'Approved', approved_by_giat_os = '$approved_by', date_approve = '$date_approve' WHERE id_giat_os = '$id'");
	}

	private function _uploadImage()
	{
		$post = $this->input->post();

		$config['upload_path']          = './upload/giat_os/';
		$config['allowed_types']        = 'png|jpg|jpeg';
		$config['file_name']            = uniqid();
		$config['max_size']             = 50024;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto_giat_os'))
		{
			$gbr = $this->upload->data();
            //Compress Image
            $config['image_library']	= 'gd2';
            $config['source_image']		= './upload/giat_os/'.$gbr['file_name'];
            $config['create_thumb']		= FALSE;
            $config['maintain_ratio']	= FALSE;
            $config['quality']			= '70%';
            $config['width']			= 1280;
            $config['height']			= 720;
            $config['new_image']		= './upload/giat_os/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $gbr['file_name'];
		}
		
		return "default.png";
	}

	private function _deleteImage($id)
	{
		$artikel = $this->getById($id);
		if ($artikel->foto_giat_os != "default.png") {
			$filename = explode(".", $artikel->foto_giat_os)[0];
			return array_map('unlink', glob(FCPATH."upload/giat_os/$filename.*"));
		}
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

    $config['upload_path'] = './upload/giat_os/';
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
    $this->db->insert_batch('giat_os', $data);
  }
}