<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class tugas_harian extends CI_Controller
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
        
        $this->load->model("M_tugas_harian");
        $this->load->library('form_validation');
        $this->load->helper('indonesian_date');
        
    }

    public function index()
    {
        $data["tugas_harian"] = $this->M_tugas_harian->get_all_tugas_harian();
        $this->load->view("admin/tugas_harian/list_tugas_harian", $data);
    }

    public function tugas_harian() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_staff', 'Nama Staff', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('uraian_kegiatan', 'Uraian Kegiatan', 'required');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('hasil_kegiatan', 'Hasil Kegiatan', 'required');
        $this->form_validation->set_rules('dokumentasi', 'Dokumentasi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['staff'] = $this->M_tugas_harian->get_all_staff();
            $this->load->view('admin/tugas_harian/tugas_harian', $data);
        } else {
            // Collect form data
            $nama_staff = $this->input->post('nama_staff');
            $tanggal = $this->input->post('tanggal');
            $waktu= $this->input->post('waktu');
            $lokasi = $this->input->post('lokasi');
            $uraian_kegiatan = $this->input->post('uraian_kegiatan');
            $penanggung_jawab = $this->input->post('penanggung_jawab');
            $hasil_kegiatan = $this->input->post('hasil_kegiatan');
            $dokumentasi = $this->input->post('dokumentasi');

            // Insert into tugas_harian
            $tugas_harian_data = array(
                'nama_staff' => $nama_staff,
                'tanggal' => $tanggal,
                'waktu' => $waktu,
                'lokasi' => $lokasi,
                'uraian_kegiatan' => $uraian_kegiatan,
                'penanggung_jawab' => $penanggung_jawab,
                'hasil_kegiatan' => $hasil_kegiatan,
                'dokumentasi' => $dokumentasi,
            );

            $id_tugas_harian = $this->M_tugas_harian->insert_tugas_harian($tugas_harian_data);

            if ($id_tugas_harian) {
                log_message('debug', 'Tugas harian inserted with ID: ' . $id_tugas_harian);
                $this->session->set_flashdata('success', 'Tugas harian berhasil ditambahkan dengan ID: ' . $id_tugas_harian);
            } else {
                log_message('error', 'Failed to insert tugas harian.');
                $this->session->set_flashdata('error', 'Gagal menambahkan tugas harian.');
            }

            redirect('admin/tugas_harian/index');
        }
    }

    public function get_all_staff() {
        $staff = $this->M_tugas_harian->get_all_staff();
        echo json_encode($staff);
    }


    public function add()
    {
        $tugasharian = $this->M_tugas_harian;
        $validation = $this->form_validation;
        $validation->set_rules($tugasharian->rules_harian());

        if ($validation->run()) {
            $tugasharian->save();
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            redirect('admin/tugas_harian');
        } else {
            $this->session->set_flashdata('error', 'Error');
        }

        $this->load->view("admin/tugas_harian/new_form_tugas_harian");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/tugas_harian');
       
        $tugasharian = $this->M_tugas_harian;
        $validation = $this->form_validation;
        $validation->set_rules($tugasharian->rules_harian());

        if ($validation->run()) {
            $tugasharian->update($id);
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            redirect('admin/tugas_harian');
        }

        $data["tugas_harian"] = $tugasharian->getById($id);
        if (!$data["tugas_harian"]) show_404();

        $this->load->view("admin/tugas_harian/edit_form_tugas_harian", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->M_tugas_harian->delete($id)) {
            redirect(site_url('admin/tugas_harian'));
        }
    }


}
