<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kompi2 extends CI_Controller
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
        
        $this->load->model("m_kompi");
        $this->load->library('form_validation');
        $this->load->library('pdf1');
        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
        $this->load->helper('usia');
    }


    public function index()
    {
        if($this->session->userdata('role') == "1")
        {
            $data["front"] = $this->m_kompi->getAll();
            $this->load->view("admin/kompi2/list_kompi", $data);
        }
        else
        {
            show_404();
        }
    }


}
