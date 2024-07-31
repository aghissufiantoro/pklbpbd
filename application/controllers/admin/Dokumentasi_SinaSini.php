<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi_sinasini extends CI_Controller
{
    private $filename = "import_data";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login"));
        }

        $this->load->model("M_dokumentasi_sinasini");
        $this->load->library('form_validation');
        $this->load->library('pdf1');
        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
        $this->load->helper('usia');
    }

    public function index()
    {
        if ($this->session->userdata('role') == "1") {
            $data["dokumentasi_sinasini"] = $this->M_dokumentasi_sinasini->getAll();
            $this->load->view("admin/dokumentasi_sinasini/list_dokumentasi_sinasini", $data);
        } else {
            show_404();
        }
    }

    public function add()
    {
        if ($this->session->userdata('role') == "1") {
            $dokumentasi_sinasini = $this->M_dokumentasi_sinasini;
            $validation = $this->form_validation;
            $validation->set_rules($dokumentasi_sinasini->rules());

            if ($validation->run()) {
                log_message('info', 'Form validation success');
                $dokumentasi_sinasini->save();
                $this->session->set_flashdata('success_add', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
                redirect('admin/dokumentasi_sinasini');
            } else {
                log_message('info', 'Form validation failed: ' . validation_errors());
            }

            $this->load->view("admin/dokumentasi_sinasini/new_form_dokumentasi_sinasini");
        } else {
            show_404();
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata('role') == "1") {
            if (!isset($id)) redirect('admin/dokumentasi_sinasini');

            $dokumentasi_sinasini = $this->M_dokumentasi_sinasini;
            $validation = $this->form_validation;
            $validation->set_rules($dokumentasi_sinasini->rules());

            if ($validation->run()) {
                $dokumentasi_sinasini->update();
                $this->session->set_flashdata('success_edit', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
                redirect('admin/dokumentasi_sinasini');
            }

            $data["dokumentasi_sinasini"] = $dokumentasi_sinasini->getById($id);
            if (!$data["dokumentasi_sinasini"]) show_404();

            $this->load->view("admin/dokumentasi_sinasini/edit_form_dokumentasi_sinasini", $data);
        } else {
            show_404();
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata('role') == "1") {
            if (!isset($id)) show_404();

            if ($this->M_dokumentasi_sinasini->delete($id)) {
                redirect(site_url('admin/dokumentasi_sinasini'));
            }
        } else {
            show_404();
        }
    }

    public function view($id = null)
    {
        if ($this->session->userdata('role') == "1") {
            if (!isset($id)) redirect('admin/dokumentasi_sinasini');

            $data["dokumentasi_sinasini"] = $this->M_dokumentasi_sinasini->getById($id);
            if (!$data["dokumentasi_sinasini"]) show_404();

            $this->load->view("admin/dokumentasi_sinasini/view_dokumentasi_sinasini", $data);
        } else {
            show_404();
        }
    }
}
