<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dokumentasi extends CI_Controller
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
        
        $this->load->model("m_dokumentasi");
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
            $data["dokumentasi"] = $this->m_dokumentasi->getAll();
            $this->load->view("admin/dokumentasi/list_dokumentasi", $data);
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
            $dokumentasi = $this->m_dokumentasi;
            $validation = $this->form_validation;
            $validation->set_rules($dokumentasi->rules());

            if ($validation->run())
            {
                $dokumentasi->save();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/dokumentasi/new_form_dokumentasi");
        }
        else
        {
            show_404();
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) redirect('admin/dokumentasi');
           
            $dokumentasi = $this->m_dokumentasi;
            $validation = $this->form_validation;
            $validation->set_rules($dokumentasi->rules());

            if ($validation->run()) {
                $dokumentasi->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["dokumentasi"] = $dokumentasi->getById($id);
            if (!$data["dokumentasi"]) show_404();
            
            $this->load->view("admin/dokumentasi/edit_form_dokumentasi", $data);
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
            
            if ($this->m_dokumentasi->delete($id)) {
                redirect(site_url('admin/dokumentasi'));
            }
        }
        else
        {
            show_404();
        }
    }
}
