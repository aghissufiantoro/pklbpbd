<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_tugas_harian extends CI_Model
{
    private $_table   = "tugas_harian";        

    public function rules_harian()
    {
        return [
            ['field' => 'nama_staff',
            'label' => 'Nama Staff',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'waktu',
            'label' => 'Waktu',
            'rules' => 'required'],

            ['field' => 'lokasi',
            'label' => 'Lokasi',
            'rules' => 'required'],

            ['field' => 'uraian_kegiatan',
            'label' => 'Uraian Kegiatan',
            'rules' => 'required'],

            ['field' => 'penanggung_jawab',
            'label' => 'Penanggung Jawab',
            'rules' => 'required'],

            ['field' => 'hasil_kegiatan',
            'label' => 'Hasil Kegiatan',
            'rules' => 'required'],

            
        ];
    }

    public function save()
    {
        $post = $this->input->post();

        $this->id_tugas_harian  = $this->generate_id_tugas_harian($post['tanggal']);
        $this->nama_staff       = $post['nama_staff'];
        $this->tanggal          = $post['tanggal'];
        $this->waktu            = $post['waktu'];
        $this->lokasi           = $post['lokasi'];
        $this->uraian_kegiatan  = $post['uraian_kegiatan'];
        $this->penanggung_jawab = $post['penanggung_jawab'];
        $this->hasil_kegiatan   = $post['hasil_kegiatan'];
        $this->dokumentasi      = $this->_uploadImage();

        $this->db->insert($this->_table, $this);
    }

    public function update($id)
{
    $post = $this->input->post();
    $this->nama_staff = $post["nama_staff"];
    $this->tanggal = $post["tanggal"];
    $this->waktu = $post["waktu"];
    $this->lokasi = $post["lokasi"];
    $this->uraian_kegiatan = $post["uraian_kegiatan"];
    $this->penanggung_jawab = $post["penanggung_jawab"];
    $this->hasil_kegiatan = $post["hasil_kegiatan"];
    $this->dokumentasi      = $this->_uploadImage();

    // Tambahkan debug output
    print_r($post); // Lihat data yang diterima
    $this->db->update($this->_table, $this, array('id_tugas_harian' => $id));
    echo $this->db->last_query(); // Lihat query yang dihasilkan
}

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_tugas_harian" => $id));
    }

    private function _uploadImage()
{
    $config['upload_path'] = './upload/tugas_harian/';
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
            }
        }
    }

    if (count($file_names) > 0) {
        return json_encode($file_names);
    }

    return json_encode(['default.png']);
}


    private function _deleteImage($id)
    {
        $dokumentasi = $this->get_tugas_harian_by_id($id);
        if ($dokumentasi->dokumentasi != "default.png") {
            $filename = explode(".", $dokumentasi->dokumentasi)[0];
            return array_map('unlink', glob(FCPATH."upload/tugas_harian/$filename.*"));
        }
    }

    private function generate_id_tugas_harian($tanggal) {
        $date = date('dmY', strtotime($tanggal)); // Format tanggal menjadi ddmmyyyy
        $prefix = 'TH';
        $counter = 1;
        $unique = false;

        do {
            $id = $prefix . $date . str_pad($counter, 3, '0', STR_PAD_LEFT); // Menggunakan 3 digit untuk urutan
            $this->db->where('id_tugas_harian', $id);
            $exists = $this->db->count_all_results('tugas_harian') > 0;
            if (!$exists) {
                $unique = true; // Jika ID tidak ada di database, maka ID tersebut unik
            } else {
                $counter++; // Jika ID sudah ada, tambahkan counter
            }
        } while (!$unique);

        return $id;
    }

    public function get_tugas_harian_by_id($id_tugas_harian)
    {
        $this->db->where('id_tugas_harian', $id_tugas_harian);
        $query = $this->db->get('tugas_harian');
        return $query->row();
    }

    public function get_all_tugas_harian() {
        $query = $this->db->get('tugas_harian');
        return $query->result();
    }

    public function get_all_staff() {
        // Fungsi untuk mendapatkan semua staff
        $query = $this->db->get('kontak_opd');
        return $query->result();
    }
}
