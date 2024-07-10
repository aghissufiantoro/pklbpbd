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

    public function insert_penugasan($id_kegiatan, $id_petugas, $id_penugasan) {
        $this->load->model('Kegiatan_model');
        if ($this->Kegiatan_model->is_kegiatan_exists($id_kegiatan)) {
            $data = array(
                'id_kegiatan' => $id_kegiatan,
                'id_petugas' => $id_petugas,
                'id_penugasan' => $id_penugasan
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

}