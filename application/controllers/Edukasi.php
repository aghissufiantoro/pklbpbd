<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edukasi extends CI_Controller {
    public function index() {
        $this->load->model('PPTModel');
        $data['ppt_url'] = $this->PPTModel->get_ppt_url();
        $this->load->view('display_ppt', $data);
    }
}
