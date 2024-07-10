<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stock_master extends CI_Controller
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
        
        $this->load->model("m_stockmaster");
        $this->load->library('form_validation');
        $this->load->library('pdf1');
        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
        $this->load->helper('usia');
        $this->load->library('pdfgenerator'); // Make sure this line is correct

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
            $this->db->select('data_master_sembako.*, data_stock_logistik.qty_masuk, data_stock_logistik.qty_keluar,data_stock_logistik.qty_rusak ,data_stock_logistik.qty_tersedia');
            $this->db->from('data_master_sembako');
            $this->db->join('data_stock_logistik', 'data_master_sembako.kode_barang = data_stock_logistik.kode_barang', 'left');
            $this->db->order_by('data_master_sembako.kode_barang', 'DESC');
            $data["stock_master"] = $this->db->get()->result();
            
            $this->load->view("admin/stock_master/list_stock", $data);
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
        $stock = $this->m_stockmaster;
        $validation = $this->form_validation;
        $validation->set_rules($stock->rules());

        if ($validation->run())
        {
            $kode_barang = $this->input->post('kode_barang');
            // Debug statement
            log_message('debug', 'Adding to data_master_sembako: ' . $kode_barang);
            // Save to `data_master_sembako`
            $stock->save();

            // Debug statement
            log_message('debug', 'Checking for existing data_stock_logistik entry for: ' . $kode_barang);
            // Insert initial quantities into `data_stock_logistik` only once
            if ($this->db->where('kode_barang', $kode_barang)->get('data_stock_logistik')->num_rows() == 0) {
                // Debug statement
                log_message('debug', 'Inserting new entry into data_stock_logistik for: ' . $kode_barang);
                $this->db->insert('data_stock_logistik', [
                    'kode_barang' => $kode_barang,
                    'qty_masuk' => 0,
                    'qty_keluar' => 0,
                    'qty_rusak' => 0,
                    'qty_tersedia' => 0
                ]);
            }

            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
            redirect('admin/stock_master');
        }

        $this->load->view("admin/stock_master/new_form_stock");
    }
    else
    {
        show_404();
    }
}



    public function edit($id = null)
{
    if ($this->session->userdata('role') == "1") {
        if (!isset($id)) redirect('admin/stock_master');
       
        $stock = $this->m_stockmaster;
        $validation = $this->form_validation;
        $validation->set_rules($stock->rules());

        if ($validation->run()) {
            $stock->update();
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            redirect('admin/stock_master'); // Redirect after updating
        }

        $data["db_stock"] = $stock->getById($id); // Pass $id to getById() method
        if (!$data["db_stock"]) show_404();
        
        $this->load->view("admin/stock_master/edit_form_stock", $data); // Pass $data to view
    } else {
        show_404();
    }
}


    public function delete($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) show_404();
            
            if ($this->m_stockmaster->delete($id)) {
                redirect(site_url('admin/stock_master'));
            }
        }
        else
        {
            show_404();
        }
    }

    public function generate_pdf()
    {
        if($this->session->userdata('role') == "1")
        {
            $data['title'] = "Data Stock";
            $file_pdf = $data['title'];
            $paper = 'A4';
            $orientation = "landscape";
            $html = $this->load->view('admin/stock_master/list_stock', $data, true);
            $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        }
        else
        {
            show_404();
        }
    }
    public function edit_quantity($id = null)
    {
        if ($this->session->userdata('role') == "1") {
            if (!isset($id)) redirect('admin/stock_master');
        
            $this->db->select('data_master_sembako.*, data_stock_logistik.qty_masuk, data_stock_logistik.qty_keluar, data_stock_logistik.qty_rusak ,data_stock_logistik.qty_tersedia');
            $this->db->from('data_master_sembako');
            $this->db->join('data_stock_logistik', 'data_master_sembako.kode_barang = data_stock_logistik.kode_barang', 'left');
            $this->db->where('data_master_sembako.kode_barang', $id);
            $stock = $this->db->get()->row();
            
            if (!$stock) show_404();
            
            $data["stock"] = $stock;
            $this->load->view("admin/stock_master/edit_qty", $data);
        } else {
            show_404();
        }
    }
    

    public function update_quantity()
    {
        if ($this->session->userdata('role') == "1") {
            $post = $this->input->post();
            $kode_barang = $post['kode_barang'];
    
            // Debugging: Print the form values to see what is being submitted
            log_message('debug', 'Form Input - kode_barang: ' . $kode_barang);
            log_message('debug', 'Form Input - qty_masuk: ' . $post['qty_masuk']);
            log_message('debug', 'Form Input - qty_keluar: ' . $post['qty_keluar']);
            log_message('debug', 'Form Input - qty_rusak: ' . $post['qty_rusak']);
    
            // Calculate the new qty_tersedia based on the new input values
            $qty_masuk = $post['qty_masuk'];
            $qty_keluar = $post['qty_keluar'];
            $qty_rusak = $post['qty_rusak'];
            $qty_tersedia = $qty_masuk - $qty_keluar - $qty_rusak;
    
            // Debugging: Print the calculated qty_tersedia
            log_message('debug', 'Calculated qty_tersedia: ' . $qty_tersedia);
    
            // Update the database with the new values
            $this->db->where('kode_barang', $kode_barang);
            $this->db->update('data_stock_logistik', [
                'qty_masuk' => $qty_masuk,
                'qty_keluar' => $qty_keluar,
                'qty_rusak' => $qty_rusak,
                'qty_tersedia' => $qty_tersedia
            ]);
    
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            redirect('admin/stock_master');
        } else {
            show_404();
        }
    }
}