<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tugasharian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login")
        {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
			redirect(base_url("login"));
        }
        
        $this->load->model("m_tugasharian");
        $this->load->library('PDF_MC_Table');
        $this->load->library('form_validation');
        $this->load->helper('indonesian_date');
    }

    public function index()
    {
        $data["tugasharian"] = $this->m_tugasharian->getAll();
        $this->load->view("admin/tugasharian/list_tugasharian", $data);
    }

    public function Printtugasharian()
    {
        $data["tugasharian"] = $this->m_tugasharian->getAll();
        $this->load->view("admin/_partials/tugasharian/print", $data);
    }

    public function printbydate()
    {
        $tgl = $this->uri->segment(4);
        $que = $this->db->query("SELECT * FROM tugas_harian WHERE tgl_tugas_harian = '$tgl'")->row();
        $data["tgltugas"] = $que;
        $this->load->view("admin/_partials/tugas_harian/print", $data);
    }

    public function add()
    {
        $tugasharian = $this->m_tugasharian;
        $validation = $this->form_validation;
        $validation->set_rules($tugasharian->rules_harian());
        if ($validation->run() != false)
        {
            $tugasharian->save_harian();
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
        }
        else
        {
            $this->session->set_flashdata('error', 'Error');
        }

        $this->load->view("admin/tugasharian/new_form_tugasharian");
        
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/tugasharian');
       
        $tugasharian = $this->m_tugasharian;
        $validation = $this->form_validation;
        $validation->set_rules($tugasharian->rules_harian());

        if ($validation->run()) {
            $tugasharian->update_harian();
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
        }

        $data["tugasharian"] = $tugasharian->getById($id);
        if (!$data["tugasharian"]) show_404();

        $this->load->view("admin/tugasharian/edit_form_tugasharian", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        if ($this->m_tugasharian->delete_harian($id))
        {
            redirect(site_url('admin/tugasharian'));
        }
    }
}
