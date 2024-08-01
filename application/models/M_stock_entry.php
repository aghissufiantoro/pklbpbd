<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_stock_entry extends CI_Model
{
    private $_table  = "data_entry_sembako";

    public function rules()
{
    return [
        [
            'field' => 'kode_barang',
            'label' => 'kode Barang',
            'rules' => 'required'
        ],
        [
            'field' => 'status_barang',
            'label' => 'Status Barang',
            'rules' => 'required'
        ],
        [
            'field' => 'qty_barang',
            'label' => 'Quantity Barang',
            'rules' => 'required|numeric'
        ]
    ];
}


    public function getAll()
    {
        $this->db->order_by('tanggal_entry', 'ASC');
    return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_transaksi" => $id])->row();
    }

    
    public function save($data)
    {
    
        // Perform the necessary calculations and insertion
        if($data['status_barang'] ==='keluar'){
        $this->db->set('qty_keluar', (int)$data['qty_barang'], FALSE);
        $this->db->set('qty_masuk', 0, FALSE);
        $this->db->set('qty_tersedia', (int)$data['qty_awal'].'-'.(int)$data['qty_barang'], FALSE);
        unset($data['qty_barang']);
        $this->db->insert($this->_table, $data);

        
    }
    }


    public function update()
    {
        $post = $this->input->post();
        $this->id_transaksi = $post["id_transaksi"];
        $this->id_kejadian = $post["id_kejadian"];
        $this->tanggal_entry = date('Y-m-d');  // Set current date
        $this->kode_barang = $post["kode_barang"];
        $this->status_barang = $post["status_barang"];
        $this->qty_awal =$this->getAvailableStock($this->kode_barang);
        $this->qty_keluar = $post["qty_barang"];
        $this->qty_masuk = 0;
        $this->qty_tersedia = (int)$this->qty_awal - (int)$this->qty_keluar;
        $this->lokasi_diterima = $post["lokasi_diterima"];
        $this->penerima_barang = $post["penerima_barang"];
        $this->kelurahan = $post["kelurahan"];
        $this->kecamatan = $post["kecamatan"];
        $this->keterangan_barang = $post["keterangan_barang"];
    
        $this->db->update('data_entry_sembako', $this, array('id_transaksi' => $post['id_transaksi']));
    }


    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_transaksi" => $id));
    }

    public function getLastTransactionID($formatted_date) {
        // Query to fetch the last transaction ID for the given date
        $this->db->select('id_transaksi');
        $this->db->from('data_entry_sembako');
        $this->db->like('id_transaksi', 'T' . $formatted_date, 'after');
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            // If there are transactions for the given date, extract the last transaction ID
            $last_transaction_id = $query->row()->id_transaksi;
            // Extract the numeric part of the transaction ID
            $numeric_part = substr($last_transaction_id, -2);
            // Convert the numeric part to an integer and increment by 1
            $new_numeric_part = (int)$numeric_part + 1;
        } else {
            // If there are no transactions for the given date, start with 1
            $new_numeric_part = 1;
        }
    
        // Pad the numeric part with leading zeros
        $padded_new_numeric_part = str_pad($new_numeric_part, 2, '0', STR_PAD_LEFT);
    
        // Construct the new transaction ID
        $new_transaction_id = 'T' . $formatted_date . $padded_new_numeric_part;
    
        return $new_transaction_id;
    }
    

    public function increase_stock($kode_barang, $qty_keluar) {
        $this->db->set('qty_tersedia', 'qty_tersedia + ' . (int)$qty_keluar, FALSE);
        $this->db->where('kode_barang', (string)$kode_barang);
        $this->db->update('data_stock_logistik');
    }
    
    public function decrease_stock($kode_barang, $qty_keluar) {
        $this->db->set('qty_tersedia', 'qty_tersedia - ' . (int)$qty_keluar, FALSE);
        $this->db->where('kode_barang', (string)$kode_barang);
        $this->db->update('data_stock_logistik');
    }

    public function mark_as_damaged($kode_barang, $qty)
{
    $this->db->set('qty_rusak', 'qty_rusak + ' . (int)$qty, FALSE);
    $this->db->set('qty_tersedia', 'qty_masuk - qty_keluar - qty_rusak', FALSE);
    $this->db->where('kode_barang', $kode_barang);
    $this->db->update('data_stock_logistik');
}
public function repair_stock($kode_barang, $qty) {
    $this->db->set('qty_rusak', 'qty_rusak - ' . (int)$qty, FALSE);
    $this->db->set('qty_tersedia', 'qty_masuk - qty_keluar - qty_rusak', FALSE);
    $this->db->where('kode_barang', $kode_barang);
    $this->db->update('data_stock_logistik');
}
public function check_kode_barang_exists($kode_barang)
{
    $query = $this->db->get_where('data_master_sembako', ['kode_barang' => $kode_barang]);
    return $query->num_rows() > 0;
}

public function check_id_kejadian_exists($id_kejadian)
{
    $query = $this->db->get_where('data_kejadian', ['id_kejadian' => $id_kejadian]);
    return $query->num_rows() > 0;
}

public function getKejadianOptions() {
    $query = $this->db->get('kejadian');
    return $query->result();
}

public function getBarangOptions() {
    $query = $this->db->get('data_master_sembako');
    return $query->result();
}

public function getKodeBarangByName($nama_barang)
{
    $query = $this->db->get_where('data_master_sembako', ['nama_barang' => $nama_barang]);
    if ($query->num_rows() > 0) {
        return $query->row()->kode_barang;
    }
    return null;
}
public function getKodeBarang($kode_barang)
{
    $query = $this->db->get_where('data_master_sembako', ['kode_barang' => $kode_barang]);
    if ($query->num_rows() > 0) {
        return $query->row()->kode_barang;
    }
    return null;
}

public function getAvailableStock($kode_barang) {
    $this->db->select('qty_tersedia');
    $this->db->from('data_stock_logistik');
    $this->db->where('kode_barang', $kode_barang);
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        return $query->row()->qty_tersedia;
    }
    return 0;
}

public function get_all_kecamatan() {
    $this->db->distinct();
    $this->db->select('kecamatan');
    $query = $this->db->get('wilayah_2022');
    return $query->result();
}

public function get_desa_by_kecamatan($kecamatan)
{
    $this->db->select('desa');
    $this->db->where('kecamatan', $kecamatan);
    $query = $this->db->get('wilayah_2022');
    return $query->result();
}




}

?>