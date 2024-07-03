<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Kejadian extends CI_Controller
{
    private $filename = "import_data";

    public function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('status') != "login")
        {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login"));
        }
        
		$this->load->database('default');
		
        $this->load->model("m_data_kejadian");
        $this->load->library('form_validation');
        $this->load->library('pdf1');
        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
        $this->load->helper('usia');
    }

    private function konv_uang($angka)
    {
        $jadi = str_replace(".", "", $angka);
        return $jadi;
    }
    private function generateIDkejadian($date) {
        // Format the date as ddmmyy
        $formatted_date = date('dmy', strtotime($date));
        // Generate new transaction ID based on the current date
        $new_id_kejadian = $this->m_data_kejadian->getLastIDKejadian($formatted_date);
        return $new_id_kejadian;
    }
    public function index()
    {
        if($this->session->userdata('role') == "1")
        {
            $data["data_kejadian"] = $this->m_data_kejadian->getAll();
            $this->load->view("admin/data_kejadian/list_datakejadian", $data);
        }
        else
        {
            show_404();
        }
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
        // Extract the numeric part of the ID kejadian (e.g., if ID is DK010124001, extract 001)
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

            if ($validation->run()) {
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

    public function delete($tanggal = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($tanggal)) show_404();
            
            if ($this->m_data_kejadian->delete($tanggal)) {
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
    if ($this->session->userdata('role') == "1") {
        if (!isset($id)) {
            redirect('admin/data_kejadian'); // Redirect if $id is not set
        }
        
        $data_kejadian = $this->m_data_kejadian;
        $validation = $this->form_validation;
        $validation->set_rules($data_kejadian->rules());

        if ($validation->run()) {
            // Assuming your model method 'detail' directly updates based on the $id
            $data_kejadian->detail($id);
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
        }

        $data["data_kejadian"] = $data_kejadian->getById($id);
        if (!$data["data_kejadian"]) {
            show_404(); // Show 404 if data is not found
        }
        
        // Load view with correct data
        $this->load->view("admin/data_kejadian/detail_datakejadian", $data);
    } else {
        show_404(); // Show 404 if user role is not valid
    }
}


    public function get_daerah()
    {
        $data = $_POST['data'];
        $id   = $_POST['id'];

        $n    = strlen($id);
        $m    = ($n==2?5:($n==5?8:13));
        // $wil=($n==2?'Kota/Kab':($n==5?'Kecamatan':'Desa/Kelurahan'));

        if ($data == "kabupaten")
        {
            ?>
            <div class="col-md-6">
                <label>Kabupaten / Kota</label>
                <select class="js-example-basic-single form-select" id="kabkota_kejadian" name="kabkota_kejadian" required>
                    <option value="">--- Pilih Kabupaten / Kota ---</option>
                    <?php
                        $daerah = $this->db->query("SELECT kode,nama FROM wilayah_2022 WHERE LEFT(kode,'$n')='$id' AND CHAR_LENGTH(kode)=$m ORDER BY nama")->result();
                        foreach ($daerah as $d)
                        {
                            ?>
                            <option value="<?= $d->kode ?>"><?= $d->nama ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>                
            <?php
        }
        else if ($data == "kecamatan")
        {
            ?>
            <div class="col-md-6">
                <label>Kecamatan</label>
                <select class="js-example-basic-single form-select" id="kecamatan_kejadian" name="kecamatan_kejadian" required>
                    <option value="">--- Pilih Kecamatan ---</option>
                    <?php
                        $daerah = $this->db->query("SELECT kode,nama FROM wilayah_2022 WHERE LEFT(kode,'$n')='$id' AND CHAR_LENGTH(kode)=$m ORDER BY nama")->result();
                        foreach ($daerah as $d)
                        {
                            ?>
                            <option value="<?= $d->kode ?>"><?= $d->nama ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <?php
        }
        else if ($data == "kelurahan")
        {
            ?>
            <div class="col-md-6">
                <label>Kelurahan / Desa</label>
                <select class="js-example-basic-single form-select" id="kelurahan_kejadian" name="kelurahan_kejadian" required>
                    <option value="">--- Pilih Kelurahan / Desa ---</option>
                    <?php
                        $daerah = $this->db->query("SELECT kode,nama FROM wilayah_2022 WHERE LEFT(kode,'$n')='$id' AND CHAR_LENGTH(kode)=$m ORDER BY nama")->result();
                        foreach ($daerah as $d)
                        {
                            ?>
                            <option value="<?= $d->kode ?>"><?= $d->nama ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <?php
        }
    }

    public function darurat_medis()
    {
        if ($this->session->userdata('role') == "1")
        {
            $data_kejadian = $this->m_data_kejadian;
            $validation = $this->form_validation;
            $validation->set_rules($data_kejadian->rules2());

            if ($validation->run())
            {
				 $new_id_kejadian = $this->input->post('new_id_kejadian');
                $data_kejadian->save_darurat_medis();
                redirect(site_url('admin/data_kejadian'));
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/data_kejadian/new_form_darurat_medis");
        }
        else
        {
            show_404();
        }
    }

    public function kebakaran()
    {
        if ($this->session->userdata('role') == "1")
        {
            $data_kejadian = $this->m_data_kejadian;
            $validation = $this->form_validation;
            $validation->set_rules($data_kejadian->rules3());

            if ($validation->run())
            {
                $data_kejadian->save_kebakaran();
                redirect(site_url('admin/data_kejadian'));
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/data_kejadian/new_form_kebakaran");
        }
        else
        {
            show_404();
        }
    }

    public function lainnya()
    {
        if ($this->session->userdata('role') == "1")
        {
            $data_kejadian = $this->m_data_kejadian;
            $validation = $this->form_validation;
            $validation->set_rules($data_kejadian->rules4());

            if ($validation->run())
            {
                $data_kejadian->save_lain();
                redirect(site_url('admin/data_kejadian'));
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/data_kejadian/new_form_lainnya");
        }
        else
        {
            show_404();
        }
    }

    public function kecelakaan_lalu_lintas()
    {
        if ($this->session->userdata('role') == "1")
        {
            $data_kejadian = $this->m_data_kejadian;
            $validation = $this->form_validation;
            $validation->set_rules($data_kejadian->rules5());

            if ($validation->run())
            {
                $data_kejadian->save_laka();
                redirect(site_url('admin/data_kejadian'));
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/data_kejadian/new_form_kecelakaan_lalu_lintas");
        }
        else
        {
            show_404();
        }
    }

    public function orang_tenggelam()
    {
        if ($this->session->userdata('role') == "1")
        {
            $data_kejadian = $this->m_data_kejadian;
            $validation = $this->form_validation;
            $validation->set_rules($data_kejadian->rules6());

            if ($validation->run())
            {
                $data_kejadian->save_orang_tenggelam();
                redirect(site_url('admin/data_kejadian'));
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/data_kejadian/new_form_orang_tenggelam");
        }
        else
        {
            show_404();
        }
    }

    public function penemuan_jenazah()
    {
        if ($this->session->userdata('role') == "1")
        {
            $data_kejadian = $this->m_data_kejadian;
            $validation = $this->form_validation;
            $validation->set_rules($data_kejadian->rules7());

            if ($validation->run())
            {
                $data_kejadian->save_penemuan_jenazah();
                redirect(site_url('admin/data_kejadian'));
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/data_kejadian/new_form_penemuan_jenazah");
        }
        else
        {
            show_404();
        }
    }

    public function pohon_tumbang()
    {
        if ($this->session->userdata('role') == "1")
        {
            $data_kejadian = $this->m_data_kejadian;
            $validation = $this->form_validation;
            $validation->set_rules($data_kejadian->rules8());

            if ($validation->run())
            {
                $data_kejadian->save_pohon_tumbang();
                redirect(site_url('admin/data_kejadian'));
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/data_kejadian/new_form_pohon_tumbang");
        }
        else
        {
            show_404();
        }
    }



}