<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_data_kejadian extends CI_Model
{
    private $_table                  = "data_kejadian";
    private $_tablepenemuanjenazah   = "form_penemuan_jenazah";
    private $_tabledaruratmedis      = "form_darurat_medis";
    private $_tablekebakaran         = "form_kebakaran";
    private $_tablelain              = "form_lain";
    private $_tablelaka              = "form_laka";
    private $_tableorangtenggelam    = "form_orang_tenggelam";
    private $_tablepohontumbang      = "form_pohon_tumbang";

    public function rules()
    {
        return [
            [
                'field' => 'tanggal',
                'label' => 'tanggal',
                'rules' => 'required'
            ]
        ];
    }

    public function rules1()
    {
        return [
            [
                'field' => 'kejadian',
                'label' => 'Nama artikel',
                'rules' => 'required'
            ]
        ];
    }

    public function rules2()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama artikel',
                'rules' => 'required'
            ]
        ];
    }

    public function rules3()
    {
        return [
            [
                'field' => 'objek_terbakar',
                'label' => 'Nama artikel',
                'rules' => 'required'
            ]
        ];
    }

    public function rules4()
    {
        return [
            [
                'field' => 'jenis_kejadian_lain',
                'label' => 'Nama artikel',
                'rules' => 'required'
            ]
        ];
    }

    public function rules5()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama artikel',
                'rules' => 'required'
            ]
        ];
    }


    public function rules6()
    {
        return [
            [
                'field' => 'nama_saksi',
                'label' => 'Nama artikel',
                'rules' => 'required'
            ]
        ];
    }

    public function rules7()
    {
        return [
            [
                'field' => 'nama_saksi',
                'label' => 'Nama artikel',
                'rules' => 'required'
            ]
        ];
    }


    public function rules8()
    {
        return [
            [
                'field' => 'jenis_pohon',
                'label' => 'Nama artikel',
                'rules' => 'required'
            ]
        ];
    }


    function jumlah_data()
    {
        return $this->db->get('data_kejadian')->num_rows();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kejadian" => $id])->row();
    }
    public function getLastIDkejadian($formatted_date) {
        // Query to fetch the last ID Kejadian for the given date
        $this->db->select('id_kejadian');
        $this->db->from('data_kejadian');
        $this->db->like('id_kejadian', 'DK' . $formatted_date, 'after');
        $this->db->order_by('id_kejadian', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // If there are transactions for the given date, extract the last transaction ID
            $last_id_kejadian = $query->row()->id_kejadian;
            // Extract the numeric part of the ID kejadian (e.g., if ID is DK230624001, extract 001)
            $numeric_part = substr($last_id_kejadian, -3);
            // Convert the numeric part to an integer and increment by 1
            $new_numeric_part = (int)$numeric_part + 1;
        } else {
            // If there are no transactions for the current date, start with 001
            $new_numeric_part = 1;
        }

        // Pad the numeric part with leading zeros (e.g., 1 becomes 001)
        $padded_new_numeric_part = str_pad($new_numeric_part, 3, '0', STR_PAD_LEFT);

        // Construct the new transaction ID by concatenating 'DK', the current date, and the padded numeric part
        $new_id_kejadian = 'DK' . $formatted_date . $padded_new_numeric_part;

        return $new_id_kejadian;
    }


    public function save($new_id_kejadian, $id_kejadian)
    {
        $post = $this->input->post();

		$this->id_kejadian              = $new_id_kejadian;
        $this->tanggal                  = $post['tanggal'];
        $this->kejadian                 = $post['kejadian'];
        $this->waktu_berita             = $post['waktu_berita'];
        $this->waktu_tiba               = $post['waktu_tiba'];
        $this->lokasi_kejadian          = $post['lokasi_kejadian'];
        $this->kecamatan_kejadian       = $post['kecamatan_kejadian'];
        $this->kelurahan_kejadian       = $post['kelurahan_kejadian'];
        $this->alamat_kejadian          = $post['alamat_kejadian'];
        $this->kronologi                = $post['kronologi'];
        $this->tindak_lanjut            = $post['tindak_lanjut'];
        $this->petugas_lokasi           = $post['petugas_lokasi'];
        $this->dokumentasi              = $this->_uploadImage();

        $this->db->insert($this->_table, $this);
    }

    public function save_darurat_medis()
    {
        $post = $this->input->post();
		
        $this->nama                 = $post['nama'];
        $this->alamat               = $post['alamat'];
        $this->jenis_kelamin        = $post['jenis_kelamin'];
        $this->usia                 = $post['usia'];
        $this->kondisi              = $post['kondisi'];
        $this->riwayat_penyakit     = $post['riwayat_penyakit'];

        $this->db->insert($this->_tabledaruratmedis, $this);
    }

    public function save_kebakaran()
    {
        $post = $this->input->post();

		
        $this->objek_terbakar          = $post['objek_terbakar'];
        $this->luas_terbakar           = $post['luas_terbakar'];
        $this->luas_bangunan           = $post['luas_bangunan'];
        $this->penyebab                = $post['penyebab'];
        $this->status_bangunan         = $post['status_bangunan'];
        $this->nama                    = $post['nama'];
        $this->usia                    = $post['usia'];
        $this->jenis_kelamin           = $post['jenis_kelamin'];
        $this->alamat                  = $post['alamat'];
        $this->lebar_jalan             = $post['lebar_jalan'];
        $this->kondisi_bangunan        = $post['kondisi_bangunan'];

        $this->db->insert($this->_tablekebakaran, $this);
    }

    public function save_lain()
    {
        $post = $this->input->post();
        
        $this->jenis_kejadian_lain      = $post['jenis_kejadian_lain'];
        $this->nama                     = $post['nama'];
        $this->alamat                   = $post['alamat'];
        $this->detail_obyek             = $post['detail_obyek'];

        $this->db->insert($this->_tablelain, $this);
    }

    public function save_laka()
    {
        $post = $this->input->post();
		
        $this->nama             = $post['nama'];
        $this->jenis_kelamin    = $post['jenis_kelamin'];
        $this->usia             = $post['usia'];
        $this->alamat           = $post['alamat'];
        $this->kendaraan        = $post['kendaraan'];
        $this->luka             = $post['luka'];
        $this->kondisi          = $post['kondisi'];

        $this->db->insert($this->_tablelaka, $this);
    }

    public function save_orang_tenggelam()
    {
        $post = $this->input->post();

        $this->nama_saksi                      = $post['nama_saksi'];
        $this->usia_saksi                      = $post['usia_saksi'];
        $this->alamat_saksi                    = $post['alamat_saksi'];
        $this->hubungan_saksi                  = $post['hubungan_saksi'];
        $this->nama_korban                     = $post['nama_korban'];
        $this->usia_korban                     = $post['usia_korban'];
        $this->jenis_kelamin                   = $post['jenis_kelamin'];
        $this->alamat                          = $post['alamat'];
        $this->kondisi                         = $post['kondisi'];

        $this->db->insert($this->_tableorangtenggelam, $this);
    }


    public function save_penemuan_jenazah()
    {
        $post = $this->input->post();

        $this->nama_saksi                      = $post['nama_saksi'];
        $this->usia_saksi                      = $post['usia_saksi'];
        $this->alamat_saksi                    = $post['alamat_saksi'];
        $this->nama_korban                     = $post['nama_korban'];
        $this->usia_korban                     = $post['usia_korban'];
        $this->alamat_korban                   = $post['alamat_korban'];
        $this->alamat_domisili_korban            = $post['alamat_domisili_korban'];

        $this->db->insert($this->_tablepenemuanjenazah, $this);
    }

    public function save_pohon_tumbang()
    {
        $post = $this->input->post();

        $this->jenis_pohon               = $post['jenis_pohon'];
        $this->diameter                  = $post['diameter'];
        $this->tinggi                    = $post['tinggi'];

        $this->db->insert($this->_tablepohontumbang, $this);
    }

    public function update()
    {
        $post = $this->input->post();
		
        $this->tanggal                     = $post['tanggal'];
        $this->kejadian                   = $post['kejadian'];
        $this->waktu_berita               = $post['waktu_berita'];
        $this->waktu_tiba                = $post['waktu_tiba'];
        $this->lokasi_kejadian          = $post['lokasi_kejadian'];
        $this->kecamatan_kejadian        = $post['kecamatan_kejadian'];
        $this->kelurahan_kejadian       = $post['kelurahan_kejadian'];
        $this->alamat_kejadian             = $post['alamat_kejadian'];
        $this->kronologi                = $post['kronologi'];
        $this->tindak_lanjut            = $post['tindak_lanjut'];
        $this->petugas_lokasi            = $post['petugas_lokasi'];
        $this->dokumentasi              = $this->_uploadImage();


        $this->db->update($this->_table, $this, array('id_kejadian' => $post['id_kejadian']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kejadian" => $id));
    }
    public function detail($id)
    {
        $post = $this->input->post();
        
        // Assign all necessary fields to update
        $this->tanggal = $post['tanggal'];
        $this->kejadian = $post['kejadian'];
        $this->waktu_berita = $post['waktu_berita'];
        $this->waktu_tiba = $post['waktu_tiba'];
        $this->lokasi_kejadian = $post['lokasi_kejadian'];
        $this->kecamatan_kejadian = $post['kecamatan_kejadian'];
        $this->kelurahan_kejadian = $post['kelurahan_kejadian'];
        $this->alamat_kejadian = $post['alamat_kejadian'];
        $this->kronologi = $post['kronologi'];
        $this->tindak_lanjut = $post['tindak_lanjut'];
        $this->petugas_lokasi = $post['petugas_lokasi'];
        $this->dokumentasi = $post['dokumentasi'];
    
        // Update record based on $id
        $this->db->update($this->_table, $this, array('id_kejadian' => $id));
    }
    

    private function _uploadImage()
{
    $post = $this->input->post();

    $config['upload_path']          = './upload/data_kejadian/';
    $config['allowed_types']        = 'png|jpg|jpeg|JPG';
    $config['file_name']            = uniqid();
    $config['max_size']             = 50024;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('dokumentasi')) {
        $gbr = $this->upload->data();
        // Compress Image
        $config['image_library']    = 'gd2';
        $config['source_image']     = './upload/data_kejadian/' . $gbr['file_name'];
        $config['create_thumb']     = FALSE;
        $config['maintain_ratio']   = FALSE;
        $config['quality']          = '100%';
        $config['width']            = 720;
        $config['height']           = 1280;
        $config['new_image']        = './upload/data_kejadian/' . $gbr['file_name'];
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
            $filename = explode(".", $artikel->dokumentasi)[0];
            return array_map('unlink', glob(FCPATH . "upload/dokumentasi/$filename.*"));
        }
    }
}
