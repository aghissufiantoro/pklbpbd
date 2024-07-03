<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class tugas_harian extends CI_Controller
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
        
        $this->load->model("m_tugas_harian");
        $this->load->library('PDF_MC_Table');
        $this->load->library('form_validation');
        $this->load->helper('indonesian_date');
        
    }

    public function index()
    {
        $data["tugas_harian"] = $this->m_tugas_harian->getAll();
        $this->load->view("admin/tugas_harian/list_tugas_harian", $data);
    }

    public function Printtugasharian()
    {
        $data["tugas_harian"] = $this->m_tugas_harian->getAll();
        $this->load->view("admin/tugas_harian/print_tugas_harian", $data);
    }

    public function printbydate()
    {
        $tgl = $this->uri->segment(4);
        $que = $this->db->query("SELECT * FROM tugas_harian WHERE DATE(tgl_tugas_harian) = ?", array($tgl));
        $data["tgltugas"] = $que ->row();
        $this->load->view("admin/tugas_harian/print_tugas_harian", $data);
    }

    public function add()
    {
        $tugasharian = $this->m_tugas_harian;
        $validation = $this->form_validation;
        $validation->set_rules($tugasharian->rules_harian());

        if ($validation->run()) {
            $tugasharian->save();
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            redirect('admin/tugas_harian');
        } else {
            $this->session->set_flashdata('error', 'Error');
        }

        $this->load->view("admin/tugas_harian/new_form_tugas_harian");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/tugas_harian');
       
        $tugasharian = $this->m_tugas_harian;
        $validation = $this->form_validation;
        $validation->set_rules($tugasharian->rules_harian());

        if ($validation->run()) {
            $tugasharian->update($id);
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            redirect('admin/tugas_harian');
        }

        $data["tugas_harian"] = $tugasharian->getById($id);
        if (!$data["tugas_harian"]) show_404();

        $this->load->view("admin/tugas_harian/edit_form_tugas_harian", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->m_tugas_harian->delete($id)) {
            redirect(site_url('admin/tugas_harian'));
        }
    }


}
