<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_pos extends CI_Controller
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
        
        $this->load->model("m_lokasi_pos");
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

    public function index()
    {
        if($this->session->userdata('role') == "1")
        {
            $data["front"] = $this->m_lokasi_pos->getAll();
            $this->load->view("admin/lokasi_pos/list_lokasi_pos", $data);
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
            $front = $this->m_lokasi_pos;
            $validation = $this->form_validation;
            $validation->set_rules($front->rules());

            if ($validation->run())
            {
                $front->save();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/lokasi_pos/new_form_lokasi_pos");
        }
        else
        {
            show_404();
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
                <select class="js-example-basic-single form-select" id="form_kab" name="kota_kab_survey" required>
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
                <select class="js-example-basic-single form-select" id="form_kec" name="kec_lokasi_pos" required>
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
        else if ($data == "desa")
        {
            ?>
            <div class="col-md-6">
                <label>Kelurahan / Desa</label>
                <select class="js-example-basic-single form-select" id="form_kel" name="kel_lokasi_pos" required>
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

    public function edit($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) redirect('admin/lokasi_pos');
           
            $lokasi_pos = $this->m_lokasi_pos;
            $validation = $this->form_validation;
            $validation->set_rules($lokasi_pos->rules());

            if ($validation->run()) {
                $lokasi_pos->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["lokasi_pos"] = $lokasi_pos->getById($id);
            if (!$data["lokasi_pos"]) show_404();
            
            $this->load->view("admin/lokasi_pos/edit_form_lokasi_pos", $data);
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
            
            if ($this->m_lokasi_pos->delete($id)) {
                redirect(site_url('admin/lokasi_pos'));
            }
        }
        else
        {
            show_404();
        }
    }
}
//tesss