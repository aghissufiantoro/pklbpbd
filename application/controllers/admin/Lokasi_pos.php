<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_pos extends CI_Controller
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
        
        $this->load->model("m_lokasi_pos");
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
            $data["front"] = $this->m_lokasi_pos->getAll();
            $this->load->view("admin/lokasi_pos/list_lokasi_pos", $data);
        }
        else
        {
            show_404();
        }
    }

  
    
    public function add()
    {
        if ($_POST) {
            $this->form_validation->set_rules('nama_lokasi_pos', 'Nama Lokasi POS', 'required');
            // Add validation rules for other fields if necessary

            if ($this->form_validation->run()) {
                $data = array(
                    'nama_lokasi_pos' => $this->input->post('nama_lokasi_pos'),
                    'kecamatan' => $this->input->post('kecamatan'),
                    'desa' => $this->input->post('desa'),
                    'kec_lokasi_pos' => $this->input->post('kecamatan'), // sesuaikan dengan nama field di database
                    'kel_lokasi_pos' => $this->input->post('desa'), // sesuaikan dengan nama field di database
                    'lat_lokasi_pos' => $this->input->post('lat_lokasi_pos'),
                    'lon_lokasi_pos' => $this->input->post('lon_lokasi_pos'),
                    'alamat_lokasi_pos' => $this->input->post('alamat_lokasi_pos'),
                    'ket_lokasi_pos' => $this->input->post('ket_lokasi_pos')
                );

                if ($this->db->insert('lokasi_pos', $data)) {
                    $this->session->set_flashdata('success', 'Data lokasi pos telah ditambahkan.');
                    redirect('admin/lokasi_pos');
                } else {
                    $this->session->set_flashdata('error', 'Terjadi kesalahan saat menambahkan data.');
                }
            }
        }

        $data['kecamatan'] = $this->db->query('SELECT DISTINCT kecamatan FROM wilayah_2022')->result();
        $this->load->view('admin/lokasi_pos/new_form_lokasi_pos', $data);
    }

    






    public function getDesaByKecamatan() {
        $kecamatan = $this->input->post('kecamatan');
        $desa = $this->m_lokasi_pos->getDesaByKecamatan($kecamatan);
        echo json_encode($desa);
    }
    

    

    public function edit($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) redirect('admin/lokasi_pos');
           
            $lokasi_pos = $this->m_lokasi_pos;
            $validation = $this->form_validation;
            $validation->set_rules($lokasi_pos->rules());

            if ($validation->run()) {
                $lokasi_pos->update($id);
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
                redirect('admin/lokasi_pos');
            }

            $data["lokasi_pos"] = $lokasi_pos->getById($id);
            if (!$data["lokasi_pos"]) show_404();
            
            $this->load->view("admin/lokasi_pos/edit_form_lokasi_pos", $data);
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
            
            if ($this->m_lokasi_pos->delete($id)) {
                redirect(site_url('admin/lokasi_pos'));
            }
        }
        else
        {
            show_404();
        }
    }
}
//tesss