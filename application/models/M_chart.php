<?php
class M_chart extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
    }

    public function getChartDataKejadian($start_date = null, $end_date = null) {
        $this->db->select('kejadian, COUNT(*) AS jumlah_kejadian');
        $this->db->from('data_kejadian');
        if ($start_date && $end_date) {
            $this->db->where('tanggal >=', $start_date);
            $this->db->where('tanggal <=', $end_date);
        }
        $this->db->group_by('kejadian');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getChartDataLokasi($start_date = null, $end_date = null) {
        $this->db->select('lokasi_kejadian, COUNT(*) AS jumlah_kejadian');
        $this->db->from('data_kejadian');
        if ($start_date && $end_date) {
            $this->db->where('tanggal >=', $start_date);
            $this->db->where('tanggal <=', $end_date);
        }
        $this->db->group_by('lokasi_kejadian');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getChartDataKejadianfront($start_date = null, $end_date = null) {
        $this->db->select('kejadian, COUNT(*) AS jumlah_kejadian');
        $this->db->from('data_kejadian');
        if ($start_date && $end_date) {
            $this->db->where('tanggal >=', $start_date);
            $this->db->where('tanggal <=', $end_date);
        }
        $this->db->group_by('kejadian');
        $query = $this->db->get();
        
        // Log the last executed query for debugging
        log_message('debug', 'Last Query: ' . $this->db->last_query());
        
        return $query->result_array();
    }

    public function getChartDataLokasifront($start_date = null, $end_date = null) {
        $this->db->select('lokasi_kejadian, COUNT(*) AS jumlah_kejadian');
        $this->db->from('data_kejadian');
        if ($start_date && $end_date) {
            $this->db->where('tanggal >=', $start_date);
            $this->db->where('tanggal <=', $end_date);
        }
        $this->db->group_by('lokasi_kejadian');
        $query = $this->db->get();

        log_message('debug', 'Last Query: ' . $this->db->last_query());

        return $query->result_array();
    }
}
