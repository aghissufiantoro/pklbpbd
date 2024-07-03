<?php
class M_stock_entryssss extends CI_Model {
    private $_table  = "data_entry_sembako";
    public function rules()
    {
        return [
            ['field' => 'id_transaksi',
            'label' => 'Data Master Sembako',
            'rules' => 'required']
        ];
    }
        public function getAllTransactions() {
                return $this->db->get($this->_table)->result();
            }
    public function getLastTransactionID($current_date) {
        // Query to fetch the last transaction ID for the current date
        $this->db->select('id_transaksi');
        $this->db->from('data_entry_sembako');
        $this->db->like('id_transaksi', 'T' . $current_date, 'after');
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // If there are transactions for the current date, extract the last transaction ID
            $last_transaction_id = $query->row()->id_transaksi;
            // Extract the numeric part of the transaction ID
            $numeric_part = substr($last_transaction_id, -2);
            // Convert the numeric part to an integer and increment by 1
            $new_numeric_part = (int)$numeric_part + 1;
        } else {
            // If there are no transactions for the current date, start with 1
            $new_numeric_part = 1;
        }

        // Pad the numeric part with leading zeros
        $padded_new_numeric_part = str_pad($new_numeric_part, 2, '0', STR_PAD_LEFT);

        // Construct the new transaction ID
        $new_transaction_id = 'T' . $current_date . $padded_new_numeric_part;

        return $new_transaction_id;
    }

    public function saveTransaction($id_transaksi, $kode_barang, $status_barang, $qty, $penerima_barang, $rt, $rw, $kelurahan, $kecamatan, $id_kejadian) {
        // Save the transaction with the generated id_transaksi and constructed lokasi_diterima
        $lokasi_diterima = "RT/RW: $rt/$rw, Kelurahan: $kelurahan, Kecamatan: $kecamatan";
        $data = array(
            'id_transaksi' => $id_transaksi,
            'kode_barang' => $kode_barang,
            'status_barang' => $status_barang,
            'qty_barang' => $qty,
            'penerima_barang' => $penerima_barang,
            'lokasi_diterima' => $lokasi_diterima, // Populate lokasi_diterima based on location information
            'id_kejadian' => $id_kejadian // Connect transaction to event
        );
        $this->db->insert('data_entry_sembako', $data);
    }

    

    public function deleteTransaction($id_transaksi) {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('data_entry_sembako');
    }
}
?>
