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
        if($this->session->userdata('role') == "1" || $this->session->userdata('role') == "13" || $this->session->userdata('role') == "14" || $this->session->userdata('role') == "15" || $this->session->userdata('role') == "16" || $this->session->userdata('role') == "17" || $this->session->userdata('role') == "20" || $this->session->userdata('role') == "21" || $this->session->userdata('role') == "22" || $this->session->userdata('role') == "23" || $this->session->userdata('role') == "24")
        {
            $data["front"] = $this->m_front->getAll();
            $this->load->view("admin/artikel/list_artikel", $data);
        }
        else
        {
            show_404();
        }
    }

    public function add()
    {
        if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "13" || $this->session->userdata('role') == "14" || $this->session->userdata('role') == "15" || $this->session->userdata('role') == "16" || $this->session->userdata('role') == "17" || $this->session->userdata('role') == "20" || $this->session->userdata('role') == "21" || $this->session->userdata('role') == "22" || $this->session->userdata('role') == "23" || $this->session->userdata('role') == "24")
        {
            $front = $this->m_front;
            $validation = $this->form_validation;
            $validation->set_rules($front->rules());

            if ($validation->run())
            {
                $front->save();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            }

            $this->load->view("admin/artikel/new_form_artikel");
        }
        else
        {
            show_404();
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "13" || $this->session->userdata('role') == "14" || $this->session->userdata('role') == "15" || $this->session->userdata('role') == "16" || $this->session->userdata('role') == "17" || $this->session->userdata('role') == "20" || $this->session->userdata('role') == "21" || $this->session->userdata('role') == "22" || $this->session->userdata('role') == "23" || $this->session->userdata('role') == "24")
        {
            if (!isset($id)) redirect('admin/artikel');
           
            $front = $this->m_front;
            $validation = $this->form_validation;
            $validation->set_rules($front->rules());

            if ($validation->run()) {
                $front->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["front"] = $front->getById($id);
            if (!$data["front"]) show_404();
            
            $this->load->view("admin/artikel/edit_form_artikel", $data);
        }
        else
        {
            show_404();
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "13" || $this->session->userdata('role') == "14" || $this->session->userdata('role') == "15" || $this->session->userdata('role') == "16" || $this->session->userdata('role') == "17" || $this->session->userdata('role') == "20" || $this->session->userdata('role') == "21" || $this->session->userdata('role') == "22" || $this->session->userdata('role') == "23" || $this->session->userdata('role') == "24")
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
