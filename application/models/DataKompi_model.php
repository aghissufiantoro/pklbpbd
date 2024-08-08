<?php

class DataKompi_model extends CI_Model {
    
    public function get_all_personel() {
        $this->db->select('id_staff, nama_staff');
        $query = $this->db->get('daftar_nama');
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

   public function get_all_personel() {
    $this->db->distinct();
    $this->db->select('nama_staff');
    $this->db->from('daftar_nama');
    $query = $this->db->get();

    return $query->result();
}

public function insert_kegiatan($data) {
    $data['id_kegiatan'] = $this->generate_id_kegiatan($data['tanggal']);
    if ($this->db->insert($this->_table, $data)) {
        return $data['id_kegiatan'];
    } else {
        log_message('error', 'Failed to insert kegiatan: ' . $this->db->error()['message']);
        return false;
    }
}


    public function delete_kegiatan($id)
    {
        return $this->db->delete($this->_table, array("id_kegiatan" => $id));
    }


    private function generate_id_kegiatan($tanggal) {
        $date = date('dmY', strtotime($tanggal));
        $prefix = 'PL';
        $counter = 1;
        $unique = false;

        do {
            $id = $prefix . $date . str_pad($counter, 3, '0', STR_PAD_LEFT);
            $this->db->where('id_kegiatan', $id);
            $exists = $this->db->count_all_results($this->_table) > 0;
            if (!$exists) {
                $unique = true;
            } else {
                $counter++;
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
    
        $data = [
            'tanggal' => $post['tanggal'],
            'shift' => $post['shift'],
            'waktu_kegiatan' => $post['waktu_kegiatan'],
            'kegiatan' => $post['kegiatan'],
            'lokasi_kegiatan' => $post['lokasi_kegiatan'],
            'jenis_kompi' => $post['jenis_kompi'],
            'jumlah_personel' => $post['jumlah_personel'],
            'jumlah_jarko' => $post['jumlah_jarko'],
            'no_wa' => $post['no_wa'],
            'keterangan' => $post['keterangan']
        ];
    
        $this->db->update($this->_table, $data, array('id_kegiatan' => $post['id_kegiatan']));
    }
    
}

class PenugasanPetugas_model extends CI_Model {
    private $_table = "tabel_penugasan_petugas";

    public function generate_id_penugasan($tanggal) {
        $date = date('dmY', strtotime($tanggal));
        $prefix = 'TL' . $date;
        $counter = 1;
        $unique = false;

        do {
            $id = $prefix . str_pad($counter, 3, '0', STR_PAD_LEFT);
            $this->db->where('id_penugasan', $id);
            $exists = $this->db->count_all_results($this->_table) > 0;
            if (!$exists) {
                $unique = true;
            } else {
                $counter++;
            }
        } while (!$unique);

        return $id;
    }

    public function insert_penugasan($data) {
        if ($this->db->insert($this->_table, $data)) {
            return true;
        } else {
            log_message('error', 'Failed to insert penugasan: ' . $this->db->error()['message']);
            return false;
        }
    }

    public function _uploadImage()
    {
        $config['upload_path'] = './upload/kegiatan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;
    
        $this->load->library('upload', $config);
    
        $file_names = array();
    
        if (isset($_FILES['dokumentasi']) && count($_FILES['dokumentasi']['name']) > 0) {
            $files = $_FILES;
            $file_count = count($_FILES['dokumentasi']['name']);
    
            for ($i = 0; $i < $file_count; $i++) {
                $_FILES['dokumentasi']['name'] = $files['dokumentasi']['name'][$i];
                $_FILES['dokumentasi']['type'] = $files['dokumentasi']['type'][$i];
                $_FILES['dokumentasi']['tmp_name'] = $files['dokumentasi']['tmp_name'][$i];
                $_FILES['dokumentasi']['error'] = $files['dokumentasi']['error'][$i];
                $_FILES['dokumentasi']['size'] = $files['dokumentasi']['size'][$i];
    
                if ($this->upload->do_upload('dokumentasi')) {
                    $file_data = $this->upload->data();
                    $file_names[] = $file_data['file_name'];
                } else {
                    // Jika ada kesalahan dalam upload, Anda bisa menangani di sini
                    $error = $this->upload->display_errors();
                    log_message('error', 'Upload error: ' . $error);
                    return false; // Atau beri respons lain sesuai kebutuhan aplikasi Anda
                }
            }
        }
    
        if (count($file_names) > 0) {
            return json_encode($file_names);
        }
    
        return json_encode(['default.png']);
    }
    
    

    

    public function get_penugasan_by_kegiatan($id_kegiatan) {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function get_penugasan_by_id($id_penugasan)
    {
        $this->db->where('id_penugasan', $id_penugasan);
        $query = $this->db->get('tabel_penugasan_petugas');
        return $query->row();
    }

    public function get_jumlah_personel($id_kegiatan)
    {
        $this->db->select('jumlah_personel');
        $this->db->from('tabel_kegiatan');
        $this->db->where('id_kegiatan', $id_kegiatan);
        $query = $this->db->get();
        $result = $query->row();
        return $result ? $result->jumlah_personel : 0;
    }

    public function get_jumlah_jarko($id_kegiatan)
    {
        $this->db->select('jumlah_jarko');
        $this->db->from('tabel_kegiatan');
        $this->db->where('id_kegiatan', $id_kegiatan);
        $query = $this->db->get();
        $result = $query->row();
        return $result ? $result->jumlah_jarko : 0;
    }

    public function update_penugasan($id_penugasan, $data) {
        $this->db->where('id_penugasan', $id_penugasan);
        return $this->db->update($this->_table, $data);
    }
    

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_penugasan" => $id));
    }

    private function _deleteImage($id)
    {
        $dokumentasi = $this->get_penugasan_by_id($id);
        if ($dokumentasi->dokumentasi != "default.png") {
            $filename = explode(".", $dokumentasi->dokumentasi)[0];
            return array_map('unlink', glob(FCPATH."upload/tugas_harian/$filename.*"));
        }
    }

    public function get_all_penugasan() {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
}
