<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class review extends CI_Controller
{
    private $filename = "import_data";

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login"));
        }

        $this->load->model('M_review');
        $this->load->library('form_validation');
        $this->load->library('pdf1');
        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
        $this->load->helper('usia');
    }

    public function index()
    {
        if($this->session->userdata('role') == "1")
        {
            $data["review"] = $this->M_review->getAll();
            $this->load->view("admin/review/list_review", $data);
        }
        else
        {
            show_404();
        }
    }

    public function manage_reviews()
    {
        $data['reviews'] = $this->M_review->getAll();
        $this->load->view('review', $data);
    }

    public function delete($id = null)
    {
        if ($this->session->userdata('role') == "1" || 
            $this->session->userdata('role') == "13" || 
            $this->session->userdata('role') == "14" || 
            $this->session->userdata('role') == "15" || 
            $this->session->userdata('role') == "16" || 
            $this->session->userdata('role') == "17" || 
            $this->session->userdata('role') == "20" || 
            $this->session->userdata('role') == "21" || 
            $this->session->userdata('role') == "22" || 
            $this->session->userdata('role') == "23" || 
            $this->session->userdata('role') == "24")
        {
            if (!isset($id)) show_404();

            if ($this->M_review->delete($id)) {
                redirect(site_url('admin/review'));
            }
        }
        else
        {
            show_404();
        }
    }

    public function update_review_status()
    {
        $review_id = $this->input->post('review_id');
        $tampilkan = $this->input->post('tampilkan');

        $data = array(
            'tampilkan' => $tampilkan
        );

        if ($this->M_review->update_review($review_id, $data)) {
            $this->session->set_flashdata('message', 'Review status updated successfully.');
        } else {
            $this->session->set_flashdata('message', 'Failed to update review status.');
        }

        redirect('admin/review');
    }
}
