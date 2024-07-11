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
        
        $this->load->model("M_tugas_harian");
        $this->load->library('form_validation');
        $this->load->helper('indonesian_date');
        
    }

    public function index()
    {
        $data["tugas_harian"] = $this->M_tugas_harian->get_all_tugas_harian();
        $this->load->view("admin/tugas_harian/list_tugas_harian", $data);
    }

    public function get_all_staff() {
        $staff = $this->M_tugas_harian->get_all_staff();
        echo json_encode($staff);
    }


    public function add()
    {
        $tugasharian = $this->M_tugas_harian;
        $validation = $this->form_validation;
        $validation->set_rules($tugasharian->rules_harian());

        // Fetch options for nama staff
        $data['staff_options'] = $this->M_tugas_harian->get_all_staff();

        if ($validation->run()) {
            $tugasharian->save();
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            redirect('admin/tugas_harian');
        } else {
            $this->session->set_flashdata('error', 'Error');
        }

        $this->load->view("admin/tugas_harian/new_form_tugas_harian", $data);
    }

    public function edit($id = null)
{
    if (!isset($id)) redirect('admin/tugas_harian');

    $this->load->model('M_tugas_harian');
    $tugasharian = $this->M_tugas_harian;
    $validation = $this->form_validation;
    $validation->set_rules($tugasharian->rules_harian());

    if ($validation->run()) {
        $tugasharian->update($id);
        $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
        redirect('admin/tugas_harian');
    }

    $data['staff_options'] = $tugasharian->get_all_staff();
    $data['tugas_harian'] = $tugasharian->get_tugas_harian_by_id($id);
    if (!$data['tugas_harian']) show_404();

    $this->load->view("admin/tugas_harian/edit_form_tugas_harian", $data);
}

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->M_tugas_harian->delete($id)) {
            redirect(site_url('admin/tugas_harian'));
        }
    }


}
