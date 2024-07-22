<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_entry extends CI_Controller
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
        
        $this->load->model("m_stock_entry");
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
            $data["data_entry_sembako"] = $this->m_stock_entry->getAll();
            $this->load->view("admin/stock_entry/list_stock", $data);
        }
        else
        {
            show_404();
        }
    }

    public function get_kelurahan_by_kecamatan()
    {
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan_options = $this->m_stock_entry->get_desa_by_kecamatan($kecamatan);
        echo json_encode($kelurahan_options);
    }

    public function add()
    {
        if ($this->session->userdata('role') == "1") {
            $data_entry_sembako = $this->m_stock_entry;
            $validation = $this->form_validation;
            $validation->set_rules($data_entry_sembako->rules());

            // Fetch options for id_kejadian, nama_barang, dan kecamatan
            $data['kejadian_options'] = $this->m_stock_entry->getKejadianOptions();
            $data['barang_options'] = $this->m_stock_entry->getBarangOptions();
            $data['kecamatan_options'] = $this->m_stock_entry->get_all_kecamatan();
            
            
        if ($validation->run()) {
            $id_kejadian = $this->input->post('id_kejadian');
            $tanggal_entry = $this->input->post('tanggal_entry');
            $nama_barang = $this->input->post('nama_barang');
            $status_barang = $this->input->post('status_barang');
            $qty_barang = $this->input->post('qty_barang');

            // Get the kode_barang based on nama_barang
            $kode_barang = $this->m_stock_entry->getKodeBarangByName($nama_barang);

            if ($kode_barang) {
                // Check stock availability for 'Keluar' status
                if ($status_barang == 'Keluar') {
                    $available_stock = $this->m_stock_entry->getAvailableStock($kode_barang);
                    if ($available_stock < $qty_barang) {
                        $this->session->set_flashdata('error', 'Jumlah barang yang tersedia tidak cukup.');
                        redirect(site_url('admin/stock_entry/add'));
                    }
                }

                $new_transaction_id = $this->generateTransactionID($tanggal_entry);

                // Save data with new transaction ID and id_kejadian
                $data_entry_sembako->save($new_transaction_id, $id_kejadian, $kode_barang);

                // Update data_stock_logistik based on status_barang
                if ($status_barang == 'Masuk') {
                    $this->m_stock_entry->increase_stock($kode_barang, $qty_barang);
                } elseif ($status_barang == 'Keluar') {
                    $this->m_stock_entry->decrease_stock($kode_barang, $qty_barang);
                } elseif ($status_barang == 'Rusak') {
                    $this->m_stock_entry->mark_as_damaged($kode_barang, $qty_barang);
                }
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
                redirect(site_url('admin/stock_entry/add'));
            } else {
                $this->session->set_flashdata('error', 'Kode Barang tidak ditemukan.');
            }
        }

        $this->load->view("admin/stock_entry/new_form_stock", $data);
    } else {
        show_404();
    }
}

    
    
    
    
    

public function edit($id = null)
{
    if ($this->session->userdata('role') == "1") {
        if (!isset($id)) redirect('admin/stock_entry');

        $data_entry_sembako = $this->m_stock_entry;
        $validation = $this->form_validation;
        $validation->set_rules($data_entry_sembako->rules());

        if ($validation->run()) {
            $kode_barang = $this->input->post('kode_barang');
            $new_status_barang = $this->input->post('status_barang');
            $new_qty_barang = $this->input->post('qty_barang');

            // Fetch the previous entry values
            $previous_entry = $data_entry_sembako->getById($id);
            $old_qty_barang = $previous_entry->qty_barang;
            $old_status_barang = $previous_entry->status_barang;

            // Adjust stock based on the previous values
            if ($old_status_barang == 'Masuk') {
                $this->m_stock_entry->decrease_stock($kode_barang, $old_qty_barang);
            } elseif ($old_status_barang == 'Keluar') {
                $this->m_stock_entry->increase_stock($kode_barang, $old_qty_barang);
            } elseif ($old_status_barang == 'Rusak') {
                $this->m_stock_entry->repair_stock($kode_barang, $old_qty_barang);
            }

            // Check stock availability for new 'Keluar' status
            if ($new_status_barang == 'Keluar') {
                $available_stock = $this->m_stock_entry->getAvailableStock($kode_barang);
                if ($available_stock < $new_qty_barang) {
                    $this->session->set_flashdata('error', 'Jumlah barang yang tersedia tidak cukup.');
                    redirect(site_url('admin/stock_entry/edit/' . $id));
                }
            }

            // Update the entry data
            $data_entry_sembako->update();

            // Adjust stock based on the new values
            if ($new_status_barang == 'Masuk') {
                $this->m_stock_entry->increase_stock($kode_barang, $new_qty_barang);
            } elseif ($new_status_barang == 'Keluar') {
                $this->m_stock_entry->decrease_stock($kode_barang, $new_qty_barang);
            } elseif ($new_status_barang == 'Rusak') {
                $this->m_stock_entry->mark_as_damaged($kode_barang, $new_qty_barang);
            }

            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Data logistik telah dirubah.');
            redirect(site_url('admin/stock_entry/edit/' . $id));
        }

        $data["data_entry_sembako"] = $data_entry_sembako->getById($id);
        if (!$data["data_entry_sembako"]) show_404();

        $this->load->view("admin/stock_entry/edit_form_stock", $data);
    } else {
        show_404();
    }
}


    public function delete($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) show_404();
            
            if ($this->m_stock_entry->delete($id)) {
                redirect(site_url('admin/stock_entry'));
            }
        }
        else
        {
            show_404();
        }
    }
    private function generateTransactionID($date) {
        // Format the date to 'dmY'
        $formatted_date = date('dmY', strtotime($date));
    
        // Generate new transaction ID based on the input date
        $new_transaction_id = $this->m_stock_entry->getLastTransactionID($formatted_date);
    
        return $new_transaction_id;
    }
    
}
