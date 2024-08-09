<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Giat_os extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login")
        {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login_v3"));
        }

        if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "2" || $this->session->userdata('role') == "3" || $this->session->userdata('role') == "4")
        {
            $this->load->model("m_giat_os");
            $this->load->library('form_validation');
            $this->load->library('secure');
            $this->load->helper('short_number');
            $this->load->helper('indonesian_date');
        }
    }

    public function index()
    {
        if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "2" || $this->session->userdata('role') == "3" || $this->session->userdata('role') == "4")
        {
            $data["giat_os"] = $this->m_giat_os->getAll();
            $this->load->view("admin/v3/giat_os/list_giat_os", $data);
        }
        else
        {
            show_404();
        }
    }

    public function view_os()
    {
        if ($this->session->userdata('role') == "3" || $this->session->userdata('role') == "4")
        {
            $this->load->view("admin/v3/giat_os/list_view_os");
        }
        else
        {
            show_404();
        }
    }

    public function view_giat()
    {
        if ($this->session->userdata('role') == "3" || $this->session->userdata('role') == "4")
        {
            $this->load->view("admin/v3/giat_os/list_view_giat");
        }
        else
        {
            show_404();
        }
    }

    public function print($id = null)
    {
        $this->load->view("admin/v3/_partials/giat_os/print");
    }

    public function print_month()
    {
        $giat_os = $this->m_giat_os;

        $get    = $this->input->get();
        $nik     = $get['nik_os'];
        $bulan   = $get['bln_filter'];
        $tahun   = $get['thn_filter'];

        //$que = $this->db->query("SELECT * FROM giat_os WHERE nama_os = '$nama' AND month(tgl_giat_os) = '$bulan' AND year(tgl_giat_os) = '$tahun'")->result();
        $data['print_data'] = $this->db->select('*')
                               ->from('giat_os')
                               ->where('nik_giat_os', $nik)
                               ->where('MONTH(tgl_giat_os)', $bulan)
                               ->where('YEAR(tgl_giat_os)', $tahun)
                               ->get()
                               ->result();
        // $data['print_data'] = $this->db->query("SELECT * FROM giat_os WHERE nik_giat_os = '$nik' AND month(tgl_giat_os) = '$bulan' AND year(tgl_giat_os) = '$tahun'")->result();
        $this->load->view("admin/v3/_partials/giat_os/print", $data);
    }

    public function add()
    {
        if ($this->session->userdata('role') == "2")
        {
            $giat_os = $this->m_giat_os;
            $validation = $this->form_validation;
            $validation->set_rules($giat_os->rules());

            if ($validation->run())
            {
                $post   = $this->input->post();
                $nama_giat_os = $post['nama_giat_os'];
                $tgl_giat_os  = $post['tgl_giat_os'];

                // $qq = $this->db->query("SELECT * from giat_os where nama_giat_os = '$nama_giat_os' AND tgl_giat_os = '$tgl_giat_os'")->row();

                // if($qq <= "")
                // {
                    $giat_os->save();
                    $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
                // }
                // else
                // {
                //     $this->session->set_flashdata('sama', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
                // }
            }

            $nik_os = $this->session->userdata('username');
            // Menggunakan method chaining untuk mempersingkat kode
            $cek_db = $this->db->get_where('bio_os', ['nik_bio_os' => $nik_os])->row();
            $null = $this->db->get_where('bio_os', [
                'nik_bio_os' => $nik_os,
                'tgl_lahir_bio_os' => NULL,
                'tmp_lahir_bio_os' => NULL,
                'prk_bio_os' => NULL,
                'agm_bio_os' => NULL
            ])->row();

            if ($cek_db == NULL || $cek_db <= "" || $cek_db == " " || $null == true)
            {
                show_404();
            }
            else
            {
                //show_404();
                $this->load->view("admin/v3/giat_os/new_form_giat_os");
            }
        }
        else
        {
            show_404();
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata('role') == "2")
        {
            $id_decode = $this->secure->decrypt_url($this->uri->segment(5));
           
            $front = $this->m_giat_os;
            $validation = $this->form_validation;
            $validation->set_rules($front->rules());

            if ($validation->run()) {
                $front->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["giat_os"] = $front->getById($id_decode);
            if (!$data["giat_os"]) show_404();
            
            $this->load->view("admin/v3/giat_os/edit_form_giat_os", $data);
        }
        else
        {
            show_404();
        }
    }

    public function approve($id=null)
    {
        if ($this->session->userdata('role') == "3")
        {
            if (!isset($id)) show_404();
            
            if ($this->m_giat_os->approvel($id))
            {
                redirect(site_url('admin/v3/giat_os'));
            }
        }
        else
        {
            show_404();
        }
    }

    public function delete($id=null)
    {
        if ($this->session->userdata('role') == "2")
        {
            $id_decode = $this->secure->decrypt_url($this->uri->segment(5));
            
            if ($this->m_giat_os->delete($id_decode))
            {
                redirect(site_url('admin/v3/giat_os'));
            }
        }
        else
        {
            show_404();
        }
    }
}

