<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokumentasi_sinasini extends CI_Model
{
    private $table = "dokumentasi_sinasini"; // The table name

    public function rules()
    {
        return [
            [
                'field' => 'nama_kegiatan_sinasini',
                'label' => 'Alamat artikel',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_dokumentasi_sinasini" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->nama_kegiatan_sinasini 			= $post['nama_kegiatan_sinasini'];
        $this->video_dokumentasi_sinasini 		= $post['video_dokumentasi_sinasini'];
        $this->tgl_dokumentasi_sinasini 		= $post['tgl_dokumentasi_sinasini'];
        $this->lokasi_dokumentasi_sinasini 		= $post['lokasi_dokumentasi_sinasini'];
        $this->alamat_dokumentasi_sinasini 		= $post['alamat_dokumentasi_sinasini'];
        $this->thumbnail_dokumentasi_sinasini 	= $this->_uploadImage1();
        $this->dok_dokumentasi_sinasini 		= $this->_uploadImage();
        $this->date_create_sinasini = date('Y-m-d H:i:s');

		$this->db->insert($this->table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->nama_kegiatan_sinasini = $post['nama_kegiatan_sinasini'];
        $this->video_dokumentasi_sinasini = $post['video_dokumentasi_sinasini'];
        $this->tgl_dokumentasi_sinasini = $post['tgl_dokumentasi_sinasini'];
        $this->lokasi_dokumentasi_sinasini = $post['lokasi_dokumentasi_sinasini'];
        $this->alamat_dokumentasi_sinasini = $post['alamat_dokumentasi_sinasini'];
        $this->date_update_sinasini = date('Y-m-d H:i:s');

        $this->db->update($this->table, $this, array('id_dokumentasi_sinasini' => $post['id_dokumentasi_sinasini']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->table, array("id_dokumentasi_sinasini" => $id));
    }


	private function _uploadImage()
	{
		$config['upload_path'] = './upload/dokumentasi_sinasini/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		$files = $_FILES;
		$file_count = count($_FILES['dok_dokumentasi_sinasini']['name']);
		$file_names = array();

		for ($i = 0; $i < $file_count; $i++) {
			$_FILES['dok_dokumentasi_sinasini']['name'] = $files['dok_dokumentasi_sinasini']['name'][$i];
			$_FILES['dok_dokumentasi_sinasini']['type'] = $files['dok_dokumentasi_sinasini']['type'][$i];
			$_FILES['dok_dokumentasi_sinasini']['tmp_name'] = $files['dok_dokumentasi_sinasini']['tmp_name'][$i];
			$_FILES['dok_dokumentasi_sinasini']['error'] = $files['dok_dokumentasi_sinasini']['error'][$i];
			$_FILES['dok_dokumentasi_sinasini']['size'] = $files['dok_dokumentasi_sinasini']['size'][$i];

			if ($this->upload->do_upload('dok_dokumentasi_sinasini')) {
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
		$config['upload_path'] = './upload/dokumentasi_sinasini/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		$this->upload->initialize($config);
		if (!empty($_FILES['thumbnail_dokumentasi_sinasini']['name'])) {
			if ($this->upload->do_upload('thumbnail_dokumentasi_sinasini')) {
				$gbr1 = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './upload/dokumentasi_sinasini/' . $gbr1['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				// $config['width']            = 710;
				// $config['height']           = 420;
				$config['new_image'] = './upload/dokumentasi_sinasini/' . $gbr1['file_name'];
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
        $dokumentasi_sinasini = $this->getById($id);
        if ($dokumentasi_sinasini->dok_dokumentasi_sinasini != "default.png") {
            $filename = explode(".", $dokumentasi_sinasini->dok_dokumentasi_sinasini)[0];
            return array_map('unlink', glob(FCPATH . "upload/dokumentasi_sinasini/$filename.*"));
        }
    }

    function dokumentasi()
    {
        $this->db->select('*');
        $this->db->from('dokumentasi_sinasini');

        return $this->db->get()->num_rows();
    }
}
