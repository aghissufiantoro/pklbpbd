<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_opd extends CI_Controller
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
        
        $this->load->model("m_kepala_opd");
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->library('secure');
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
        if($this->session->userdata('username') == "admin" || $this->session->userdata('username') == "kepala_opd")
        {
            $data["front"] = $this->m_kepala_opd->getAll();
            $this->load->view("admin/kepala_opd/list_kepala_opd", $data);
        }
        else
        {
            show_404();
        }
    }

    public function add()
    {
        if ($this->session->userdata('username') == "admin" || $this->session->userdata('username') == "kepala_opd")
        {
            $front = $this->m_kepala_opd;
            $validation = $this->form_validation;
            $validation->set_rules($front->rules());

            if ($validation->run())
            {
                $front->save();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/kepala_opd/new_form_kepala_opd");
        }
        else
        {
            show_404();
        }
    }

    public function edit()
    {
        if ($this->session->userdata('username') == "admin" || $this->session->userdata('username') == "kepala_opd")
        {
            $id_decode = $this->secure->decrypt_url($this->uri->segment(4));

            $front = $this->m_kepala_opd;
            $validation = $this->form_validation;
            $validation->set_rules($front->rules());

            if ($validation->run()) {
                $front->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["kepala_opd"] = $front->getById($id_decode);
            if (!$data["kepala_opd"]) show_404();
            
            $this->load->view("admin/kepala_opd/edit_form_kepala_opd", $data);
        }
        else
        {
            show_404();
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata('username') == "admin" || $this->session->userdata('username') == "kepala_opd")
        {
            if (!isset($id)) show_404();
            
            if ($this->m_kepala_opd->delete($id)) {
                redirect(site_url('admin/kepala_opd'));
            }
        }
        else
        {
            show_404();
        }
    }
}
