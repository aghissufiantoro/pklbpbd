<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_stockmaster extends CI_Model
{
    private $_table  = "data_master_sembako";

    public function rules()
    {
        return [
            [
                'field' => 'nama_barang',
                'label' => 'Data Master Sembako',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->where('is_deleted', 0);
        $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_barang" => $id])->row();
    }


    public function save()
    {
        $post = $this->input->post();

        // Generate kode_barang
        $kode_barang = $this->generate_kode_barang();
        $qty_tersedia = $post['qty_tersedia'];

        // Prepare data array for insertion
        $data = array(
            'kode_barang' => $kode_barang,
            'nama_barang' => $post['nama_barang'],
            'kategori_barang' => $post['kategori_barang'],
            'satuan_barang' => $post['satuan_barang']
        );

        // Insert data into the database
        $this->db->insert($this->_table, $data);

        return array(
            'kode_barang' => $kode_barang,
            'qty_tersedia' => $qty_tersedia
        );
    }

    public function update()
    {
        $post = $this->input->post();

        $this->nama_barang     = $post['nama_barang'];
        $this->kategori_barang = $post['kategori_barang'];
        $this->satuan_barang     = $post['satuan_barang'];


        $this->db->update($this->_table, $this, array('kode_barang' => $post['kode_barang']));
    }

    public function delete($id)
    {
        // Remove the recursive call $this->delete($id);
        $this->db->where('kode_barang', $id);
        return $this->db->update($this->_table, array('is_deleted' => 1));
        // return $this->db->update($this->_table, array("kode_barang" => $id));
    }

    public function generate_kode_barang()
    {
        // Ambil kode barang terakhir dari database
        $this->db->select('kode_barang');
        $this->db->order_by('kode_barang', 'DESC');
        $this->db->limit(1);
        $last_kode_barang = $this->db->get($this->_table)->row();

        if ($last_kode_barang) {
            // Jika ada, ambil nomor urutnya dan tambahkan 1
            $last_number = intval(substr($last_kode_barang->kode_barang, 2));
            $new_number = $last_number + 1;
            $new_kode_barang = 'BR' . sprintf('%04d', $new_number); // Format nomor urut dengan leading zero
        } else {
            // Jika belum ada data, mulai dari BR0001
            $new_kode_barang = 'BR0001';
        }

        return $new_kode_barang;
    }

    public function getLastTransactionID($formatted_date)
    {
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
}
