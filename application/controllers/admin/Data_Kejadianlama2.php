<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Kejadian extends CI_Controller
{
    private $filename = "import_data";

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login")
        {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login"));
        }

        $this->load->database('default');
        $this->load->model("m_data_kejadian");
        $this->load->model('M_form_penemuan_jenazah');
        $this->load->model('M_form_darurat_medis');
        $this->load->model('M_form_kebakaran');
        $this->load->model('M_form_lain');
        $this->load->model('M_form_laka');
        $this->load->model('M_form_orang_tenggelam');
        $this->load->model('M_form_pohon_tumbang');
        $this->load->library('form_validation');
        $this->load->library('pdf1');
        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
        $this->load->helper('usia');
    }

    private function konv_uang($angka)
    {
        return str_replace(".", "", $angka);
    }

    private function generateIDkejadian($date) {
        $formatted_date = date('dmy', strtotime($date));
        return $this->m_data_kejadian->getLastIDKejadian($formatted_date);
    }

    public function index()
    {
        if ($this->session->userdata('role') == "1")
        {
            $data["data_kejadian"] = $this->m_data_kejadian->getAll();
            $this->load->view("admin/data_kejadian/list_datakejadian", $data);
        }
        else
        {
            show_404();
        }
    }

    public function add()
{
    if ($this->session->userdata('role') == "1")
    {
        $data_kejadian = $this->m_data_kejadian;
        $validation = $this->form_validation;
        $validation->set_rules($data_kejadian->rules());

        if ($validation->run())
        {
            $tanggal = $this->input->post('tanggal');
            $formatted_date = date('dmy', strtotime($tanggal));
            $new_id_kejadian = $this->m_data_kejadian->getLastIDkejadian($formatted_date);

            // Log data yang diterima dan ID yang dihasilkan
            log_message('debug', 'Form Data - tanggal: ' . $tanggal);
            log_message('debug', 'Generated new_id_kejadian: ' . $new_id_kejadian);

            // Simpan data dengan ID transaksi baru dan id_kejadian
            $data_kejadian->save($new_id_kejadian, $new_id_kejadian);
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            redirect(site_url('admin/data_kejadian'));
        }
        else
        {
            // Jika validasi gagal, muat ulang formulir dan log pesan kesalahan
            log_message('error', 'Validation failed: ' . validation_errors());
            $this->load->view("admin/data_kejadian/new_form_datakejadian");
        }
    }
    else
    {
        show_404();
    }
}

    public function edit($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) redirect('admin/data_kejadian');
            
            $data_kejadian = $this->m_data_kejadian;
            $validation = $this->form_validation;
            $validation->set_rules($data_kejadian->rules());

            if ($validation->run())
            {
                $data_kejadian->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
                redirect(site_url('admin/data_kejadian'));
            }

            $data["data_kejadian"] = $data_kejadian->getById($id);
            if (!$data["data_kejadian"]) show_404();
            
            $this->load->view("admin/data_kejadian/edit_form_datakejadian", $data);
        }
        else
        {
            show_404();
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) show_404();
            
            if ($this->m_data_kejadian->delete($id))
            {
                redirect(site_url('admin/data_kejadian'));
            }
        }
        else
        {
            show_404();
        }
    }

    public function detail($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) redirect('admin/data_kejadian');
            
            $data_kejadian = $this->m_data_kejadian;
            $validation = $this->form_validation;
            $validation->set_rules($data_kejadian->rules());

            if ($validation->run())
            {
                $data_kejadian->detail();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["data_kejadian"] = $data_kejadian->getById($id);
            if (!$data["data_kejadian"]) show_404();
            
            $this->load->view("admin/data_kejadian/detail_datakejadian", $data);
        }
        else
        {
            show_404();
        }
    }

    public function get_daerah()
    {
        $data = $_POST['data'];
        $id = $_POST['id'];

        $n = strlen($id);
        $m = ($n == 2 ? 5 : ($n == 5 ? 8 : 13));

        $query = $this->db->query("SELECT kode,nama FROM wilayah_2022 WHERE LEFT(kode,'$n')='$id' AND CHAR_LENGTH(kode)=$m ORDER BY nama")->result();

        if ($data == "kabupaten") {
            echo '<div class="col-md-6">';
            echo '<label>Kabupaten / Kota</label>';
            echo '<select class="js-example-basic-single form-select" id="kabkota_kejadian" name="kabkota_kejadian" required>';
            echo '<option value="">--- Pilih Kabupaten / Kota ---</option>';
            foreach ($query as $d) {
                echo '<option value="' . $d->kode . '">' . $d->nama . '</option>';
            }
            echo '</select>';
            echo '</div>';
        } elseif ($data == "kecamatan") {
            echo '<div class="col-md-6">';
            echo '<label>Kecamatan</label>';
            echo '<select class="js-example-basic-single form-select" id="kecamatan_kejadian" name="kecamatan_kejadian" required>';
            echo '<option value="">--- Pilih Kecamatan ---</option>';
            foreach ($query as $d) {
                echo '<option value="' . $d->kode . '">' . $d->nama . '</option>';
            }
            echo '</select>';
            echo '</div>';
        } elseif ($data == "kelurahan") {
            echo '<div class="col-md-6">';
            echo '<label>Kelurahan / Desa</label>';
            echo '<select class="js-example-basic-single form-select" id="kelurahan_kejadian" name="kelurahan_kejadian" required>';
            echo '<option value="">--- Pilih Kelurahan / Desa ---</option>';
            foreach ($query as $d) {
                echo '<option value="' . $d->kode . '">' . $d->nama . '</option>';
            }
            echo '</select>';
            echo '</div>';
        }
    }

    private function save_data($data, $model)
    {
        $this->$model->save($data);
        redirect('some_success_page');
    }

    public function save_penemuan_jenazah()
    {
        $data = array(
            'id_kejadian' => $this->input->post('id_kejadian'),
            'nama_saksi' => $this->input->post('nama_saksi'),
            'usia_saksi' => $this->input->post('usia_saksi'),
            'alamat_saksi' => $this->input->post('alamat_saksi'),
            'nama_korban' => $this->input->post('nama_korban'),
            'usia_korban' => $this->input->post('usia_korban'),
            'alamat_korban' => $this->input->post('alamat_korban'),
            'alamat_domisili_korban' => $this->input->post('alamat_domisili_korban')
        );

        $this->save_data($data, 'M_form_penemuan_jenazah');
    }

    public function save_darurat_medis()
    {
        $data = array(
            'id_kejadian' => $this->input->post('id_kejadian'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'usia' => $this->input->post('usia'),
            'kondisi' => $this->input->post('kondisi'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        );

        $this->save_data($data, 'M_form_darurat_medis');
    }

    public function save_kebakaran()
    {
        $data = array(
            'id_kejadian' => $this->input->post('id_kejadian'),
            'objek_terbakar' => $this->input->post('objek_terbakar'),
            'luas_terbakar' => $this->input->post('luas_terbakar'),
            'luas_bangunan' => $this->input->post('luas_bangunan'),
            'penyebab' => $this->input->post('penyebab'),
            'status_bangunan' => $this->input->post('status_bangunan'),
            'nama' => $this->input->post('nama'),
            'usia' => $this->input->post('usia'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'lebar_jalan' => $this->input->post('lebar_jalan'),
            'kondisi_bangunan' => $this->input->post('kondisi_bangunan')
        );

        $this->save_data($data, 'M_form_kebakaran');
    }

    public function save_lain()
    {
        $data = array(
            'id_kejadian' => $this->input->post('id_kejadian'),
            'jenis_kejadian_lain' => $this->input->post('jenis_kejadian_lain'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'detail_obyek' => $this->input->post('detail_obyek')
        );

        $this->save_data($data, 'M_form_lain');
    }

    public function save_laka()
    {
        $data = array(
            'id_kejadian' => $this->input->post('id_kejadian'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'usia' => $this->input->post('usia'),
            'alamat' => $this->input->post('alamat'),
            'kendaraan' => $this->input->post('kendaraan'),
            'luka' => $this->input->post('luka'),
            'kondisi' => $this->input->post('kondisi')
        );

        $this->save_data($data, 'M_form_laka');
    }

    public function save_orang_tenggelam()
    {
        $data = array(
            'id_kejadian' => $this->input->post('id_kejadian'),
            'nama_saksi' => $this->input->post('nama_saksi'),
            'usia_saksi' => $this->input->post('usia_saksi'),
            'alamat_saksi' => $this->input->post('alamat_saksi'),
            'hubungan_saksi' => $this->input->post('hubungan_saksi'),
            'nama_korban' => $this->input->post('nama_korban'),
            'usia_korban' => $this->input->post('usia_korban'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'kondisi' => $this->input->post('kondisi')
        );

        $this->save_data($data, 'M_form_orang_tenggelam');
    }

    public function save_pohon_tumbang()
    {
        $data = array(
            'id_kejadian' => $this->input->post('id_kejadian'),
            'jenis_pohon' => $this->input->post('jenis_pohon'),
            'diameter' => $this->input->post('diameter'),
            'tinggi' => $this->input->post('tinggi')
        );

        $this->save_data($data, 'M_form_pohon_tumbang');
    }
}
