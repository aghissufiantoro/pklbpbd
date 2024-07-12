<?php

class DataKompi_model extends CI_Model {
    
    public function get_all_personel() {
        // Fungsi untuk mendapatkan semua personel
        $query = $this->db->get('data_kompi');
        return $query->result();
    }

    public function get_personel_by_kompi($jenis_kompi) {
        // Fungsi untuk mendapatkan personel berdasarkan jenis kompi
        $this->db->where('jenis_kompi', $jenis_kompi);
        $query = $this->db->get('data_kompi');
        return $query->result();
    }
}

class Kegiatan_model extends CI_Model {

   private $_table ="tabel_kegiatan";

    public function insert_kegiatan($data) {
        $data['id_kegiatan'] = $this->generate_id_kegiatan($data['tanggal']);
        if ($this->db->insert('tabel_kegiatan', $data)) {
            log_message('debug', 'Kegiatan inserted: ' . $data['id_kegiatan']);
            return $data['id_kegiatan'];
        } else {
            log_message('error', 'Failed to insert kegiatan: ' . $this->db->error()['message']);
            return false;
        }
    }

    private function generate_id_kegiatan($tanggal) {
        $date = date('dmY', strtotime($tanggal)); // Format tanggal menjadi ddmmyyyy
        $prefix = 'PL';
        $counter = 1;
        $unique = false;

        do {
            $id = $prefix . $date . str_pad($counter, 3, '0', STR_PAD_LEFT); // Menggunakan 3 digit untuk urutan
            $this->db->where('id_kegiatan', $id);
            $exists = $this->db->count_all_results('tabel_kegiatan') > 0;
            if (!$exists) {
                $unique = true; // Jika ID tidak ada di database, maka ID tersebut unik
            } else {
                $counter++; // Jika ID sudah ada, tambahkan counter
            }
        } while (!$unique);

        return $id;
    }

    public function is_kegiatan_exists($id_kegiatan) {
        $this->db->select('id_kegiatan');
        $this->db->from('tabel_kegiatan');
        $this->db->where('id_kegiatan', $id_kegiatan);
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }

    public function get_kegiatan_by_id($id_kegiatan)
    {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $query = $this->db->get('tabel_kegiatan');
        return $query->row();
    }


    public function get_all_kegiatan() {
        $query = $this->db->get('tabel_kegiatan');
        return $query->result();
    }

    public function update_kegiatan()
    {
        $post = $this->input->post();

        $this->tanggal              = $post['tanggal'];
        $this->shift                = $post['shift'];
        $this->lokasi_kegiatan      = $post['lokasi_kegiatan'];
        $this->jumlah_personel      = $post['jumlah_personel'];
        $this->jumlah_jarko         = $post['jumlah_jarko'];
        $this->keterangan           = $post['keterangan'];

        $this->date_updated     = date('Y-m-d H:i:s');

        $this->db->update($this->_table, $this, array('id_kegiatan' => $post['id_kegiatan']));
    }

    public function delete_kegiatan($id)
    {
        return $this->db->delete($this->_table, array("id_kegiatan" => $id));
    }
}

class PenugasanPetugas_model extends CI_Model {

    public function generate_id_petugas($tanggal) {
        $date = date('dmY', strtotime($tanggal)); // Format DDMMYY dari tanggal input
        $prefix = 'TL' . $date;
        $counter = 1;
        do {
            $id = $prefix . str_pad($counter, 3, '0', STR_PAD_LEFT);
            $this->db->where('id_penugasan', $id);
            $exists = $this->db->count_all_results('tabel_penugasan_petugas') > 0;
            $counter++;
        } while ($exists);
        return $id;
    }

    public function generate_id_penugasan($tanggal) {
        $date = date('dmY', strtotime($tanggal)); // Format tanggal menjadi ddmmyyyy
        $prefix = 'TL' . $date;
        $counter = 1;
        $unique = false;

        do {
            $id = $prefix . str_pad($counter, 3, '0', STR_PAD_LEFT); // Menggunakan 3 digit untuk urutan
            $this->db->where('id_penugasan', $id);
            $exists = $this->db->count_all_results('tabel_penugasan_petugas') > 0;
            if (!$exists) {
                $unique = true; // Jika ID tidak ada di database, maka ID tersebut unik
            } else {
                $counter++; // Jika ID sudah ada, tambahkan counter
            }
        } while (!$unique);

        return $id;
    }

    public function insert_penugasan($id_kegiatan, $id_penugasan, $id_petugas, $lokasi_kegiatan, $tanggal, $shift, $no_wa, $uraian_kegiatan, $dokumentasi) {
        $this->load->model('Kegiatan_model');
        if ($this->Kegiatan_model->is_kegiatan_exists($id_kegiatan)) {
            $data = array(
                'id_kegiatan' => $id_kegiatan,
                'id_penugasan' => $id_penugasan,
                'id_petugas' => $id_petugas,
                'lokasi_kegiatan' => $lokasi_kegiatan,
                'tanggal' => $tanggal,
                'shift' => $shift,
                'no_wa' => $no_wa,
                'uraian_kegiatan' => $uraian_kegiatan,
                'dokumentasi' => $dokumentasi
            );
            if ($this->db->insert('tabel_penugasan_petugas', $data)) {
                return true;
            } else {
                log_message('error', $this->db->error()['message']);
                return false;
            }
        } else {
            return false;
        }
    }

    public function get_penugasan_by_kegiatan($id_kegiatan) {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $query = $this->db->get('tabel_penugasan_petugas');
        return $query->result();
    }

    public function update_penugasan($id_penugasan, $data) {
        $this->db->where('id_penugasan', $id_penugasan);
        $this->db->update('tabel_penugasan_petugas', $data);
    }
    
    public function get_all_penugasan()
    {
        $query = $this->db->get('tabel_penugasan_petugas');
        return $query->result();
    }

    private function _uploadImage()
	{
		$config['upload_path'] = './upload/dokumentasi/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		$files = $_FILES;
		$file_count = count($_FILES['dokumentasi']['name']);
		$file_names = array();

		for ($i = 0; $i < $file_count; $i++) {
			$_FILES['dokumentasi']['name'] = $files['dokumentasi']['name'][$i];
			$_FILES['dokumentasi']['type'] = $files['dokumentasi']['type'][$i];
			$_FILES['dokumentasi']['tmp_name'] = $files['dokumentasi']['tmp_name'][$i];
			$_FILES['dokumentasi']['error'] = $files['dokumentasi']['error'][$i];
			$_FILES['dokumentasi']['size'] = $files['dokumentasi']['size'][$i];

			if ($this->upload->do_upload('dokumentasi')) {
				$file_data = $this->upload->data();
				$file_names[] = $file_data['file_name'];
			}
		}

		if (count($file_names) > 0) {
			return json_encode($file_names);
		}

		return json_encode(['default.png']);
	}

    private function _deleteImage($id)
	{
		$dokumentasi = $this->getById($id);
		if ($dokumentasi->dokumentasi != "default.png") {
			$filename = explode(".", $dokumentasi->dokumentasi)[0];
			return array_map('unlink', glob(FCPATH . "upload/dokumentasi/$filename.*"));
		}
	}
}