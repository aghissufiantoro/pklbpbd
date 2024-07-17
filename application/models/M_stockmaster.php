<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_stockmaster extends CI_Model
{
    private $_table  = "data_master_sembako";

    public function rules()
    {
        return [
            ['field' => 'nama_barang',
            'label' => 'Data Master Sembako',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_barang" => $id])->row();
    }

//     public function save()
// {
//     $post = $this->input->post();

//     // Log the input data for debugging purposes
//     log_message('debug', 'Form Input - nama_barang: ' . $post['nama_barang']);
//     log_message('debug', 'Form Input - kategori_barang: ' . $post['kategori_barang']);
//     log_message('debug', 'Form Input - satuan_barang: ' . $post['satuan_barang']);

//     // Generate kode_barang
//     $kode_barang = $this->generate_kode_barang();

//     // Prepare data array for insertion
//     $data = array(
//         'kode_barang' => $kode_barang,
//         'nama_barang' => $post['nama_barang'],
//         'kategori_barang' => $post['kategori_barang'],
//         'satuan_barang' => $post['satuan_barang']
//     );

//     // Log the data to be inserted
//     log_message('debug', 'Data Insert - kode_barang: ' . $kode_barang);
//     log_message('debug', 'Data Insert - nama_barang: ' . $post['nama_barang']);
//     log_message('debug', 'Data Insert - kategori_barang: ' . $post['kategori_barang']);
//     log_message('debug', 'Data Insert - satuan_barang: ' . $post['satuan_barang']);

//     // Insert data into the database
//     $this->db->insert($this->_table, $data);

//     // Log the query executed
//     log_message('debug', 'Query Insert: ' . $this->db->last_query());

//     // Check if the query was successful
//     if ($this->db->affected_rows() > 0) {
//         log_message('debug', 'Data berhasil disimpan');
//     } else {
//         log_message('error', 'Gagal menyimpan data');
//     }
// }

public function save()
{
    $post = $this->input->post();

    // Echo the input data for debugging purposes
    echo 'Form Input - nama_barang: ' . $post['nama_barang'] . '<br>';
    echo 'Form Input - kategori_barang: ' . $post['kategori_barang'] . '<br>';
    echo 'Form Input - satuan_barang: ' . $post['satuan_barang'] . '<br>';

    // Generate kode_barang
    $kode_barang = $this->generate_kode_barang();

    // Prepare data array for insertion
    $data = array(
        'kode_barang' => $kode_barang,
        'nama_barang' => $post['nama_barang'],
        'kategori_barang' => $post['kategori_barang'],
        'satuan_barang' => $post['satuan_barang']
    );

    // Echo the data to be inserted
    echo 'Data Insert - kode_barang: ' . $kode_barang . '<br>';
    echo 'Data Insert - nama_barang: ' . $post['nama_barang'] . '<br>';
    echo 'Data Insert - kategori_barang: ' . $post['kategori_barang'] . '<br>';
    echo 'Data Insert - satuan_barang: ' . $post['satuan_barang'] . '<br>';

    // Insert data into the database
    $this->db->insert($this->_table, $data);

    // Echo the query executed
    echo 'Query Insert: ' . $this->db->last_query() . '<br>';

    // Check if the query was successful
    if ($this->db->affected_rows() > 0) {
        echo 'Data berhasil disimpan<br>';
    } else {
        echo 'Gagal menyimpan data<br>';
    }

    // Terminate the script to ensure echoed data is displayed
    exit;
}



    public function update()
    {
        $post = $this->input->post();

        // $this->kode_barang     = 
        $this->nama_barang     = $post['nama_barang'];
        $this->kategori_barang = $post['kategori_barang'];
        $this->satuan_barang     = $post['satuan_barang'];


        $this->db->update($this->_table, $this, array('kode_barang' => $post['kode_barang']));
    }

    public function delete($id)
    {
        // Remove the recursive call $this->delete($id);
        return $this->db->delete($this->_table, array("kode_barang" => $id));
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

    
}