<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller
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
        
        $this->load->model("m_front");
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
            $data["front"] = $this->m_front->getAll();
            $this->load->view("admin/artikel/list_artikel", $data);
        }
        else
        {
            show_404();
        }
    }

    public function tampil()
    {
        if ($this->session->userdata('role') == "1")
        {            
            $this->m_front->tampil();
            redirect(site_url('admin/hasil_survey'));
        }
        else
        {
            show_404();
        }
    }

    public function sembunyikan()
    {
        if ($this->session->userdata('role') == "1")
        {            
            $this->m_front->sembunyikan();
            redirect(site_url('admin/hasil_survey'));
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
            
            if ($this->m_front->delete($id)) {
                redirect(site_url('admin/artikel'));
            }
        }
        else
        {
            show_404();
        }
    }
}
