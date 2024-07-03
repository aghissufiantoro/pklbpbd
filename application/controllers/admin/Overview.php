<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login")
        {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login"));
        }

        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
        $this->load->model('m_chart');
        $this->load->model('m_artikel'); 
        $this->load->model('m_pegawai'); 
        $this->load->model('m_perpus'); 
        $this->load->model('m_kepala_opd'); 
        $this->load->model('m_lokasi_pos'); 
    }

    public function index()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Get chart data from the model
        $data['chartDataKejadian'] = $this->m_chart->getChartDataKejadian($start_date, $end_date);
        $data['chartDataLokasi'] = $this->m_chart->getChartDataLokasi($start_date, $end_date);

        $data["artikel"] = $this->m_artikel->jumlah_data();
        $data["pegawai"] = $this->m_pegawai->jumlah_data();
        $data["perpus"] = $this->m_perpus->jumlah_data();
        $data["kontak_opd"] = $this->m_kepala_opd->jumlah_data();
        $data["lokasi_pos"] = $this->m_lokasi_pos->jumlah_data();

        $this->load->view("admin/overview", $data); // Pass data to the view
    }
}
