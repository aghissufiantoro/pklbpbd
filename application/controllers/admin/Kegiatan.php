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
        $this->load->library('form_validation');
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
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
        $this->form_validation->set_rules('lokasi_kegiatan', 'Lokasi Kegiatan', 'required');
        $this->form_validation->set_rules('jumlah_personel', 'Jumlah Personel', 'required|numeric');
        $this->form_validation->set_rules('jumlah_jarko', 'Jumlah Jarko', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/kegiatan/plot_kegiatan', $data);
        } else {
            // Collect form data
            $tanggal = $this->input->post('tanggal');
            $shift = $this->input->post('shift');
            $kegiatan = $this->input->post('kegiatan');
            $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
            $jumlah_personel = $this->input->post('jumlah_personel');
            $jumlah_jarko = $this->input->post('jumlah_jarko');
            $keterangan = $this->input->post('keterangan');

            // Insert into tabel_kegiatan
            $kegiatan_data = array(
                'tanggal' => $tanggal,
                'shift' => $shift,
                'kegiatan' => $kegiatan,
                'lokasi_kegiatan' => $lokasi_kegiatan,
                'jumlah_personel' => $jumlah_personel,
                'jumlah_jarko' => $jumlah_jarko,
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

    public function edit_plot_kegiatan($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) redirect('admin/kegiatan/view_kegiatan');
           
            $kegiatan = $this->Kegiatan_model;
            $validation = $this->form_validation;

            if ($validation->run()) {
                $kegiatan->update_kegiatan();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["kegiatan"] = $kegiatan->get_kegiatan_by_id($id);
            if (!$data["kegiatan"]) show_404();
            
            $this->load->view("admin/kegiatan/edit_kegiatan", $data);
        }
        else
        {
            show_404();
        }
    }

    public function delete_plot_kegiatan($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) show_404();
            
            if ($this->Kegiatan_model->delete_kegiatan($id)) {
                redirect(site_url('admin/kegiatan/view_kegiatan'));
            }
        }
        else
        {
            show_404();
        }
    }

    public function tambah_petugas($id_kegiatan = null) {
        $this->load->helper('form');
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('id_kegiatan', 'ID Kegiatan', 'required');
        $this->form_validation->set_rules('petugas[]', 'ID Petugas', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['personel'] = $this->DataKompi_model->get_all_personel();
            $data['id_kegiatan'] = $id_kegiatan;
    
            // Get lokasi kegiatan from the database
            $kegiatan = $this->Kegiatan_model->get_kegiatan_by_id($id_kegiatan);
            if ($kegiatan) {
                $data['lokasi_kegiatan'] = $kegiatan->lokasi_kegiatan;
            } else {
                $data['lokasi_kegiatan'] = ''; // Handle the case where the kegiatan is not found
            }
    
            $this->load->view('admin/kegiatan/tambah_petugas', $data);
        } else {
            $id_kegiatan        = $this->input->post('id_kegiatan');
            $id_petugas         = $this->input->post('petugas');
            $lokasi_kegiatan    = $this->input->post('lokasi_kegiatan');
            $shift              = $this->input->post('shift');
            $no_wa              = $this->input->post('no_wa');
            $uraian_kegiatan    = $this->input->post('uraian_kegiatan');
            $dokumentasi        = $this->_uploadImage(); // Call the function to upload images and get JSON string
    
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
                $penugasan_data = array(
                    'id_kegiatan' => $id_kegiatan,
                    'id_penugasan' => $id_penugasan,
                    'id_petugas' => $petugas,
                    'lokasi_kegiatan' => $lokasi_kegiatan,
                    'tanggal' => $tanggal,
                    'shift' => $shift,
                    'no_wa' => $no_wa,
                    'uraian_kegiatan' => $uraian_kegiatan,
                    'dokumentasi' => $dokumentasi
                );
    
                // Debug log for checking penugasan data before insertion
                log_message('debug', 'Penugasan data: ' . json_encode($penugasan_data));
    
                $this->PenugasanPetugas_model->insert_penugasan($penugasan_data);
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
    
    private function _uploadImage()
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
                    log_message('debug', 'File uploaded: ' . $file_data['file_name']); // Logging file name
                } else {
                    log_message('error', 'File upload failed: ' . $this->upload->display_errors()); // Logging upload errors
                }
            }
        }

        if (count($file_names) > 0) {
            return json_encode($file_names);
        }

        return json_encode(['default.png']);
    }

  

    public function view_penugasan_petugas()
    {
        $this->load->model('PenugasanPetugas_model');
        $data['penugasan_petugas'] = $this->PenugasanPetugas_model->get_all_penugasan();
        $this->load->view('admin/kegiatan/view_penugasan_petugas', $data);
    }

    public function delete_penugasan_petugas($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) show_404();
            
            if ($this->PenugasanPetugas_model->delete_penugasan_petugas($id)) {
                redirect(site_url('admin/kegiatan/view_penugasan_petugas'));
            }
        }
        else
        {
            show_404();
        }
    }
}
