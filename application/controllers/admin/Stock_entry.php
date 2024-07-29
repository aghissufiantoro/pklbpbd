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


            // Fetch options for id_kejadian and nama_barang
            $data['kejadian_options'] = $this->m_stock_entry->getKejadianOptions();
            $data['barang_options'] = $this->m_stock_entry->getBarangOptions();
            $data['kecamatan_options'] = $this->m_stock_entry->get_all_kecamatan();
            

            $this->load->view("admin/stock_entry/new_form_stock", $data);
        } else {
            show_404();
        }
    }

   

    public function save_stock_entry(){
        $this->load->model('m_stock_entry');
        $this->load->library('form_validation');
        
        // Decode the JSON payload
        $input = json_decode(trim(file_get_contents('php://input')), true);
    
        if (!is_array($input)) {
            $response = ['status' => 'error', 'message' => 'Invalid input format. Expected an array.'];
            echo json_encode($response);
            return;
        }
    
        foreach ($input as $entry) {
            // Ensure required fields are set to avoid passing null to validation
            $entry['nama_barang'] = $entry['id_barang'] ?? '';
            $entry['status_barang'] = $entry['statusBarang'] ?? '';
            $entry['qty_barang'] = $entry['qtyBarang'] ?? '';
    
            // Set validation rules for each entry
            $this->form_validation->set_data($entry);
            $validation = $this->form_validation;
            $validation->set_rules($this->m_stock_entry->rules());
    
            // Run validation
            if ($validation->run()) {
                // Extract the input data
                $id_kejadian = $entry['idKejadian'] ?? null;
                $id_barang = $entry['id_barang'] ?? null;
                $status_barang = $entry['statusBarang'] ?? null;
                $qty_barang = $entry['qtyBarang'] ?? null;
                $lokasi_diterima = $entry['lokasi_diterima'] ?? null;
                $penerima_barang = $entry['penerima_barang'] ?? null;
                $kecamatan = $entry['kecamatan'] ?? null;
                $kelurahan = $entry['kelurahan'] ?? null;
                $keterangan_barang = $entry['keteranganBarang'] ?? null;
    
                // Get the kode_barang based on nama_barang
                $kode_barang = $this->m_stock_entry->getKodeBarang($id_barang);
    
                if ($kode_barang) {
                    // Check stock availability for 'Keluar' status
                    if ($status_barang == 'Keluar') {
                        $available_stock = $this->m_stock_entry->getAvailableStock($kode_barang);
                        if ($available_stock < $qty_barang) {
                            $response = ['status' => 'error', 'message' => 'Jumlah barang yang tersedia tidak cukup.'];
                            echo json_encode($response);
                            return;
                        }
                    }
                    
                    $formatted_date = $entry['tanggalEntry'] ;
                    $new_transaction_id = $this->generateTransactionID($formatted_date);
    
                    // Save data with new transaction ID and id_kejadian
                    $data_to_save = [
                        'id_transaksi' => $new_transaction_id,
                        'id_kejadian' => $id_kejadian,
                        'tanggal_entry' => $entry['tanggalEntry'] ?? date('Y-m-d'),  // Use provided date or current date
                        'kode_barang' => $kode_barang,
                        'status_barang' => $status_barang,
                        'qty_barang' => $qty_barang,
                        'lokasi_diterima' => $lokasi_diterima,
                        'penerima_barang' => $penerima_barang,
                        'kecamatan' => $kecamatan,
                        'kelurahan' => $kelurahan,
                        'keterangan_barang' => $keterangan_barang,
                    ];
    
                    $this->m_stock_entry->save($data_to_save);
    
                    // Update data_stock_logistik based on status_barang
                    if ($status_barang == 'masuk') {
                        $this->m_stock_entry->increase_stock($kode_barang, $qty_barang);
                    } elseif ($status_barang == 'keluar') {
                        $this->m_stock_entry->decrease_stock($kode_barang, $qty_barang);
                    } elseif ($status_barang == 'rusak') {
                        $this->m_stock_entry->mark_as_damaged($kode_barang, $qty_barang);
                    }
    
                    $response = ['status' => 'success', 'message' => 'Data berhasil disimpan.'];
                } else {
                    $response = ['status' => 'error', 'message' => 'Kode Barang tidak ditemukan.'];
                }
            } else {
                $response = ['status' => 'error', 'message' => validation_errors()];
            }
    
            echo json_encode($response);
        }
    }
    
    

    public function checkStock() {
        $kode_barang = $this->input->post('kode_barang'); // Corrected syntax
        $response = [];
    
        if ($kode_barang) {
            // Check stock availability for 'Keluar' status
            $available_stock = $this->m_stock_entry->getAvailableStock($kode_barang);
            $response = ['available_stock' => $available_stock];
        }
    
        echo json_encode($response);
    }
    

    public function get_filtered_id(){
        $data = $this->input->post('data');
    $value_search = $this->input->post('search');
    $value_search2 = $this->input->post('search2');
    $response = [];

    if ($data == "tanggal") {
        $kejadian = $this->db->query("SELECT kejadian FROM data_kejadian WHERE tanggal=? GROUP BY tanggal ORDER BY tanggal", [$value_search])->result();
        foreach ($kejadian as $d) {
            $response[] = ['value' => $d->kejadian, 'label' => $d->kejadian];
        }
    }else if ($data == "kejadian") {
        $id_kejadian = $this->db->query("SELECT id_kejadian, kejadian, alamat_kejadian FROM data_kejadian where kejadian=? and tanggal=? GROUP BY id_kejadian order by id_kejadian", [$value_search,$value_search2])->result();
        foreach ($id_kejadian as $d) {
            $response[] = ['value' => $d->id_kejadian, 'label' => $d->id_kejadian."-".$d->kejadian."-".$d->alamat_kejadian];
        }
    }

    echo json_encode($response); // Encode resp // Encode resp
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
        $formatted_date = date('dmY');
    
        // Generate new transaction ID based on the input date
        $new_transaction_id = $this->m_stock_entry->getLastTransactionID($formatted_date);
    
        return $new_transaction_id;
    }

    public function filter_id_kejadian() {
        $tanggal_entry = $this->input->post('tanggal_entry');
        $kejadian = $this->input->post('kejadian');
    
        $query = $this->db->select('id_kejadian, kejadian, alamat_kejadian')
                          ->from('data_kejadian')
                          ->where('tanggal_entry', $tanggal_entry)
                          ->where('kejadian', $kejadian)
                          ->get();
    
        $result = $query->result();
        echo json_encode($result);
    }

    
}
