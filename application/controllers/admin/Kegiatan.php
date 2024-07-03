<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

    private $filename = "import_data";

    public function __construct() {
        parent::__construct();
        
        if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login"));
        }

        $this->load->model('DataKompi_model');
        $this->load->model('Kegiatan_model');
        $this->load->model('PenugasanPetugas_model');
        $this->load->helper('url_helper');
    }

    public function view_kegiatan() {
        // Mengambil data kegiatan dari model
        $data['kegiatan'] = $this->Kegiatan_model->get_all_kegiatan();

        // Menampilkan view plot_kegiatan.php dengan data kegiatan
        $this->load->view('admin/kegiatan/view_kegiatan', $data);
    }

    public function plot_kegiatan() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['personel'] = $this->DataKompi_model->get_all_personel();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('shift', 'Shift', 'required');
        $this->form_validation->set_rules('giat', 'Giat', 'required');
        $this->form_validation->set_rules('waktu_kegiatan', 'Waktu Kegiatan', 'required');
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
        $this->form_validation->set_rules('lokasi_kejadian', 'Lokasi Kejadian', 'required');
        $this->form_validation->set_rules('jumlah_personel', 'Jumlah Personel', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/kegiatan/plot_kegiatan', $data);
        } else {
            // Collect form data
            $tanggal = $this->input->post('tanggal');
            $shift = $this->input->post('shift');
            $giat = $this->input->post('giat');
            $waktu_kegiatan = $this->input->post('waktu_kegiatan');
            $kegiatan = $this->input->post('kegiatan');
            $lokasi_kejadian = $this->input->post('lokasi_kejadian');
            $jumlah_personel = $this->input->post('jumlah_personel');
            $keterangan = $this->input->post('keterangan');

            // Insert into tabel_kegiatan
            $kegiatan_data = array(
                'tanggal' => $tanggal,
                'shift' => $shift,
                'giat' => $giat,
                'waktu_kegiatan' => $waktu_kegiatan,
                'kegiatan' => $kegiatan,
                'lokasi_kejadian' => $lokasi_kejadian,
                'jumlah_personel' => $jumlah_personel,
                'keterangan' => $keterangan,
            );

            $id_kegiatan = $this->Kegiatan_model->insert_kegiatan($kegiatan_data);

            if ($id_kegiatan) {
                log_message('debug', 'Kegiatan inserted with ID: ' . $id_kegiatan);
                $this->session->set_flashdata('success', 'Kegiatan berhasil ditambahkan dengan ID: ' . $id_kegiatan);
            } else {
                log_message('error', 'Failed to insert kegiatan.');
                $this->session->set_flashdata('error', 'Gagal menambahkan kegiatan.');
            }

            redirect('admin/kegiatan/plot_kegiatan');
        }
    }

    public function tambah_petugas($id_kegiatan = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('id_kegiatan', 'ID Kegiatan', 'required');
        $this->form_validation->set_rules('petugas[]', 'ID Petugas', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['personel'] = $this->DataKompi_model->get_all_personel();
            $data['id_kegiatan'] = $id_kegiatan; // Pass id_kegiatan to the view
            $this->load->view('admin/kegiatan/tambah_petugas', $data);
        } else {
            $id_kegiatan = $this->input->post('id_kegiatan');
            $id_petugas = $this->input->post('petugas');
    
            // Get the date of the selected kegiatan
            $kegiatan = $this->Kegiatan_model->get_kegiatan_by_id($id_kegiatan);
            if (!$kegiatan) {
                show_error('Kegiatan tidak ditemukan');
                return;
            }
            $tanggal = $kegiatan->tanggal;
    
            // Begin transaction
            $this->db->trans_start();
    
            foreach ($id_petugas as $petugas) {
                $id_penugasan = $this->PenugasanPetugas_model->generate_id_penugasan($tanggal);
                $this->PenugasanPetugas_model->insert_penugasan($id_kegiatan, $petugas, $id_penugasan);
            }
    
            // Complete transaction
            $this->db->trans_complete();
    
            if ($this->db->trans_status() === FALSE) {
                // Transaction failed, handle the error
                $this->session->set_flashdata('error', 'Failed to save the data. Please try again.');
                log_message('error', 'Transaction failed.');
            } else {
                // Transaction succeeded, handle success
                $this->session->set_flashdata('success', 'Penugasan berhasil disimpan.');
                log_message('debug', 'Transaction succeeded.');
            }
    
            redirect('admin/kegiatan/view_kegiatan');
        }
    }

    public function get_personel_by_kompi($jenis_kompi) {
        $personel = $this->DataKompi_model->get_personel_by_kompi($jenis_kompi);
        echo json_encode($personel);
    }

    public function laporan_kegiatan($id_kegiatan) {
        if (!$id_kegiatan) {
            log_message('error', 'No ID provided to laporan_kegiatan');
            show_error('ID Kegiatan is required');
            return;
        }
    
        $this->load->helper('form');
        $this->load->library('form_validation');
    
        $data['penugasan'] = $this->PenugasanPetugas_model->get_penugasan_by_kegiatan($id_kegiatan);
    
        $this->form_validation->set_rules('laporan[]', 'Laporan', 'required');
        $this->form_validation->set_rules('dokumentasi[]', 'Dokumentasi', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/kegiatan/laporan_kegiatan', $data);
        } else {
            $laporan = $this->input->post('laporan');
            $dokumentasi = $this->input->post('dokumentasi');
            $id_penugasan = $this->input->post('id_penugasan');
    
            for ($i = 0; $i < count($id_penugasan); $i++) {
                $update_data = array(
                    'laporan' => $laporan[$i],
                    'dokumentasi' => $dokumentasi[$i]
                );
                $this->PenugasanPetugas_model->update_penugasan($id_penugasan[$i], $update_data);
            }
    
            redirect('admin/kegiatan/plot_kegiatan');
        }
    }
       

    public function view_penugasan_petugas()
    {
        $this->load->model('PenugasanPetugas_model');
        $data['penugasan_petugas'] = $this->PenugasanPetugas_model->get_all_penugasan();
        $this->load->view('admin/kegiatan/view_penugasan_petugas', $data);
    }

}
