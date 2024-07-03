<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_dokumentasi extends CI_Model
{
	private $_table = "dokumentasi";

	public function rules()
	{
		return [
			['field' => 'nama_kegiatan',
				'label' => 'Nama dokumentasi',
				'rules' => 'required']
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_dokumentasi" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();

		$this->nama_kegiatan = $post['nama_kegiatan'];
		$this->video_dokumentasi = $post['video_dokumentasi'];
		$this->tgl_dokumentasi = $post['tgl_dokumentasi'];
		$this->narasumber = $post['narasumber'];
		$this->lokasi_dokumentasi = $post['lokasi_dokumentasi'];
		$this->alamat_dokumentasi = $post['alamat_dokumentasi'];
		$this->thumbnail_dokumentasi = $this->_uploadImage1();
		$this->dok_dokumentasi = $this->_uploadImage();
		$this->date_created = date('Y-m-d H:i:s');

		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();

		$this->nama_kegiatan = $post['nama_kegiatan'];
		$this->video_dokumentasi = $post['video_dokumentasi'];
		$this->tgl_dokumentasi = $post['tgl_dokumentasi'];
		$this->narasumber = $post['narasumber'];
		$this->lokasi_dokumentasi = $post['lokasi_dokumentasi'];
		$this->alamat_dokumentasi = $post['alamat_dokumentasi'];

		$this->date_updated = date('Y-m-d H:i:s');

		$this->db->update($this->_table, $this, array('id_dokumentasi' => $post['id_dokumentasi']));
	}

	public function delete($id)
	{
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("id_dokumentasi" => $id));
	}

	private function _uploadImage()
	{
		$config['upload_path'] = './upload/dokumentasi/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		$files = $_FILES;
		$file_count = count($_FILES['dok_dokumentasi']['name']);
		$file_names = array();

		for ($i = 0; $i < $file_count; $i++) {
			$_FILES['dok_dokumentasi']['name'] = $files['dok_dokumentasi']['name'][$i];
			$_FILES['dok_dokumentasi']['type'] = $files['dok_dokumentasi']['type'][$i];
			$_FILES['dok_dokumentasi']['tmp_name'] = $files['dok_dokumentasi']['tmp_name'][$i];
			$_FILES['dok_dokumentasi']['error'] = $files['dok_dokumentasi']['error'][$i];
			$_FILES['dok_dokumentasi']['size'] = $files['dok_dokumentasi']['size'][$i];

			if ($this->upload->do_upload('dok_dokumentasi')) {
				$file_data = $this->upload->data();
				$file_names[] = $file_data['file_name'];
			}
		}

		if (count($file_names) > 0) {
			return json_encode($file_names);
		}

		return json_encode(['default.png']);
	}

	private function _uploadImage1()
	{
		//$post = $this->input->post();
		$config['upload_path'] = './upload/dokumentasi/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		$this->upload->initialize($config);
		if (!empty($_FILES['thumbnail_dokumentasi']['name'])) {
			if ($this->upload->do_upload('thumbnail_dokumentasi')) {
				$gbr1 = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './upload/dokumentasi/' . $gbr1['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				// $config['width']            = 710;
				// $config['height']           = 420;
				$config['new_image'] = './upload/dokumentasi/' . $gbr1['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				return $this->upload->data("file_name");
			}
		} else {
			echo "default.png";
		}

		return "default.png";
	}

	private function _deleteImage($id)
	{
		$dokumentasi = $this->getById($id);
		if ($dokumentasi->dok_dokumentasi != "default.png") {
			$filename = explode(".", $dokumentasi->dok_dokumentasi)[0];
			return array_map('unlink', glob(FCPATH . "upload/dokumentasi/$filename.*"));
		}
	}

	function dokumentasi()
	{
		$this->db->select('*');
		$this->db->from('dokumentasi');

		return $this->db->get()->num_rows();
	}
}