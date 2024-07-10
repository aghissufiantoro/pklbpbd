<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_tugas_harian extends CI_Model
{
    private $_table   = "tugas_harian";        

    public function rules_harian()
    {
        return [
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'lokasi',
            'label' => 'Lokasi',
            'rules' => 'required']
        ];
    }

    public function save()
    {
        $post = $this->input->post();

        $this->id_tugas_harian  = $post['id_tugas_harian'];
        $this->nama_staff       = $post['nama_staff'];
        $this->tanggal          = $post['tanggal'];
        $this->waktu            = $post['waktu'];
        $this->lokasi           = $post['lokasi'];
        $this->uraian_kegiatan  = $post['uraian_kegiatan'];
        $this->penanggung_jawab = $post['penanggung_jawab'];
        $this->hasil_kegiatan   = $post['hasil_kegiatan'];
        $this->dokumentasi      = $this->_uploadImage();
        $this->date_created     = date('Y-m-d H:i:s');
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        
        $this->id_tugas_harian  = $post['id_tugas_harian'];
        $this->nama_staff       = $post['nama_staff'];
        $this->tanggal          = $post['tanggal'];
        $this->waktu            = $post['waktu'];
        $this->lokasi           = $post['lokasi'];
        $this->uraian_kegiatan  = $post['uraian_kegiatan'];
        $this->penanggung_jawab = $post['penanggung_jawab'];
        $this->hasil_kegiatan   = $post['hasil_kegiatan'];
        $this->dokumentasi      = $this->_uploadImage();
        $this->date_updated     = date('Y-m-d H:i:s');

        $this->db->update($this->_table, $this, array('id_tugas_harian' => $post['id_tugas_harian']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_tugas_harian" => $id));
    }

    private function _uploadImage()
    {
        $post = $this->input->post();

        $config['upload_path']          = './upload/dokumentasi_tugas_harian/';
        $config['allowed_types']        = 'png|jpg|jpeg|JPG';
        $config['file_name']            = uniqid();
        $config['max_size']             = 50024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_pegawai'))
        {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']    = 'gd2';
            $config['source_image']     = './upload/dokumentasi_tugas_harian/'.$gbr['file_name'];
            $config['create_thumb']     = FALSE;
            $config['maintain_ratio']   = FALSE;
            $config['quality']          = '70%';
            $config['width']            = 720;
            $config['height']           = 1280;
            $config['new_image']        = './upload/dokumentasi_tugas_harian/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $gbr['file_name'];
        }
        
        return "default.png";
    }

    private function _deleteImage($id)
    {
        $artikel = $this->getById($id);
        if ($artikel->foto_pegawai != "default.png") {
            $filename = explode(".", $artikel->foto_pegawai)[0];
            return array_map('unlink', glob(FCPATH."upload/foto_pegawai/$filename.*"));
        }
    }


    public function insert_tugas_harian($data) {
        $data['id_tugas_harian'] = $this->generate_id_tugas_harian($data['tanggal']);
        if ($this->db->insert('tugas_harian', $data)) {
            log_message('debug', 'Tugas Harian inserted: ' . $data['id_tugas_harian']);
            return $data['id_tugas_harian'];
        } else {
            log_message('error', 'Failed to insert tugas harian: ' . $this->db->error()['message']);
            return false;
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

    public function is_tugas_harian_exists($id_tugas_harian) {
        $this->db->select('id_tugas_harian');
        $this->db->from('tugas_harian');
        $this->db->where('id_tugas_harian', $id_tugas_harian);
        $query = $this->db->get();
        return $query->num_rows() > 0;
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
        // Fungsi untuk mendapatkan semua personel
        $query = $this->db->get('kontak_opd');
        return $query->result();
    }
}
