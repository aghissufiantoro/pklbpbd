<?php
class M_edukasi extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_ppt_url() {
        $query = $this->db->get_where('edukasi', array('id' => 1));
        return $query->row_array()['MateriMitigasiBencana'];
    }
}
