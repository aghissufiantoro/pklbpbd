<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class perpus extends CI_Controller
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
        
        $this->load->model("m_perpus");
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
            $data["perpus"] = $this->m_perpus->getAll();
            $this->load->view("admin/perpus/list_perpus", $data);
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
            $perpus = $this->m_perpus;
            $validation = $this->form_validation;
            $validation->set_rules($perpus->rules());

            if ($validation->run())
            {
                $perpus->save();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/perpus/new_form_perpus");
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
            if (!isset($id)) redirect('admin/perpus');
           
            $perpus = $this->m_perpus;
            $validation = $this->form_validation;
            $validation->set_rules($perpus->rules());

            if ($validation->run()) {
                $perpus->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["perpus"] = $perpus->getById($id);
            if (!$data["perpus"]) show_404();
            
            $this->load->view("admin/perpus/edit_form_perpus", $data);
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
            
            if ($this->m_perpus->delete($id)) {
                redirect(site_url('admin/perpus'));
            }
        }
        else
        {
            show_404();
        }
    }
}
