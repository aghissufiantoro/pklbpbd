<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
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
        
        $this->load->model("m_pegawai");
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
            $data["front"] = $this->m_pegawai->getAll();
            $this->load->view("admin/pegawai/list_pegawai", $data);
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
            $front = $this->m_pegawai;
            $validation = $this->form_validation;
            $validation->set_rules($front->rules());

            if ($validation->run())
            {
                $front->save();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/pegawai/new_form_pegawai");
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
            if (!isset($id)) redirect('admin/pegawai');
           
            $front = $this->m_pegawai;
            $validation = $this->form_validation;
            $validation->set_rules($front->rules());

            if ($validation->run()) {
                $front->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["pegawai"] = $front->getById($id);
            if (!$data["pegawai"]) show_404();
            
            $this->load->view("admin/pegawai/edit_form_pegawai", $data);
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
            
            if ($this->m_pegawai->delete($id)) {
                redirect(site_url('admin/pegawai'));
            }
        }
        else
        {
            show_404();
        }
    }
}
