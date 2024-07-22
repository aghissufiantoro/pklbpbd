<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Kejadian extends CI_Controller
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
        
		$this->load->database('default');
		
        $this->load->model("m_data_kejadian");
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
            $data["data_kejadian"] = $this->m_data_kejadian->getAll();
            $this->load->view("admin/data_kejadian/list_datakejadian", $data);
        }
        else
        {
            show_404();
        }
    }
    private function konv_uang($angka)
    {
        $jadi = str_replace(".", "", $angka);
        return $jadi;
    }              
    private function generateIDkejadian($date) {
        // Format the date as ddmmyy
        $formatted_date = date('dmy', strtotime($date));
        // Generate new transaction ID based on the current date
        $new_id_kejadian = $this->m_data_kejadian->getLastIDKejadian($formatted_date);
        return $new_id_kejadian;
    }
    
// Function to generate the last ID kejadian based on the formatted date
public function getLastIDkejadian($formatted_date) {
    // Query to fetch the last ID Kejadian for the given date
    $this->db->select('id_kejadian');
    $this->db->from('data_kejadian');
    $this->db->like('id_kejadian', 'DK' . $formatted_date, 'after');
    $this->db->order_by('id_kejadian', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        // Extract the last transaction ID and increment the numeric part by 1
        $last_id_kejadian = $query->row()->id_kejadian;
        $numeric_part = substr($last_id_kejadian, -3);
        $new_numeric_part = (int)$numeric_part + 1;
    } else {
        // Start with 001 if no transactions for the current date
        $new_numeric_part = 1;
    }

    // Pad the numeric part with leading zeros and construct the new ID
    $padded_new_numeric_part = str_pad($new_numeric_part, 3, '0', STR_PAD_LEFT);
    $new_id_kejadian = 'DK' . $formatted_date . $padded_new_numeric_part;

    return $new_id_kejadian;
}


public function getLastIdKejadianByAjax() {
    // Mengambil tanggal dari permintaan POST
    $formatted_date = $this->input->post('tanggal');
    
    // Memformat tanggal menjadi DDMMYY
    $date = DateTime::createFromFormat('Y-m-d', $formatted_date);
    if ($date === false) {
        echo json_encode(['error' => 'Invalid date format']);
        return;
    }
    $res = $date->format('dmy'); // Format tanggal menjadi DDMMYY

    // Query untuk mengambil ID kejadian terakhir berdasarkan tanggal yang telah diformat
    $this->db->select('id_kejadian');
    $this->db->from('data_kejadian');
    $this->db->like('id_kejadian', 'DK' . $res, 'after');
    $this->db->order_by('id_kejadian', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        // Mengambil ID kejadian terakhir dan menambah bagian numerik sebesar 1
        $last_id_kejadian = $query->row()->id_kejadian;
        $numeric_part = substr($last_id_kejadian, -3);
        $new_numeric_part = (int)$numeric_part + 1;
    } else {
        // Memulai dengan 001 jika tidak ada transaksi untuk tanggal saat ini
        $new_numeric_part = 1;
    }

    // Melengkapi bagian numerik dengan angka nol di depan dan membuat ID baru
    $padded_new_numeric_part = str_pad($new_numeric_part, 3, '0', STR_PAD_LEFT);
    $new_id_kejadian = 'DK' . $res . $padded_new_numeric_part;

    // Mengembalikan ID kejadian baru sebagai JSON
    echo json_encode(['new_id_kejadian' => $new_id_kejadian]);
    return;
}




// Function to handle adding new kejadian data

public function upload_image() {

    
    $caseType = $this->input->post('case');

    // Set the upload path based on the case type
    switch ($caseType) {
        case 'Kecelakaan Lalu Lintas':
            $uploadPath = './upload/data_kejadian/kecelakaan_lalu_lintas/';
            break;
        case 'Darurat Medis':
            $uploadPath = './upload/data_kejadian/darurat_medis/';
            break;
        case 'Kebakaran':
            $uploadPath = './upload/data_kejadian/kebakaran/';
            break;
        case 'Pohon Tumbang':
            $uploadPath = './upload/data_kejadian/pohon_tumbang/';
            break;
        case 'Penemuan Jenazah':
            $uploadPath = './upload/data_kejadian/penemuan_jenazah/';
            break;
        case 'Orang Tenggelam':
            $uploadPath = './upload/data_kejadian/orang_tenggelam/';
            break;
        case 'Lainnya':
            $uploadPath = './upload/data_kejadian/lainnya/';
            break;
        default:
            $uploadPath = './upload/data_kejadian/dokumentasi/';
    }

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $config['upload_path'] = $uploadPath;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = 2048; // 2MB
    $config['file_name'] = md5(uniqid(rand(), true)); // Generate unique filename

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('image')) {
        $response = array('status' => 'error', 'message' => $this->upload->display_errors());
        echo json_encode($response);
    } else {
        $data = $this->upload->data();
        $image_url = substr($uploadPath,1) . $data['file_name'];
        $response = array('status' => 'success', 'image_url' => $image_url);
        echo json_encode($response);
    
    }
}

public function update_image(){
   
    $caseType = $this->input->post('case');
    $pastImageSrc = $this->input->post('pastImageSrc');

    
   



    if ($pastImageSrc) {
        $file_path = FCPATH.$pastImageSrc;

        // Hapus file gambar dari direktori server
        if (file_exists($file_path)) {
            unlink($file_path);
          
        }
       

    }else{
        $response = array('status'=>'error','message'=>'bad request pastImageSrc, tidak dikirim');
        echo json_encode($response);
        return;
    }

    // Set the upload path based on the case type
    switch ($caseType) {
        case 'Kecelakaan Lalu Lintas':
            $uploadPath = './upload/data_kejadian/kecelakaan_lalu_lintas/';
            break;
        case 'Darurat Medis':
            $uploadPath = './upload/data_kejadian/darurat_medis/';
            break;
        case 'Kebakaran':
            $uploadPath = './upload/data_kejadian/kebakaran/';
            break;
        case 'Pohon Tumbang':
            $uploadPath = './upload/data_kejadian/pohon_tumbang/';
            break;
        case 'Penemuan Jenazah':
            $uploadPath = './upload/data_kejadian/penemuan_jenazah/';
            break;
        case 'Orang Tenggelam':
            $uploadPath = './upload/data_kejadian/orang_tenggelam/';
            break;
        case 'Lainnya':
            $uploadPath = './upload/data_kejadian/lainnya/';
            break;
        default:
            $uploadPath = './upload/data_kejadian/dokumentasi/';
    }

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $config['upload_path'] = $uploadPath;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = 2048; // 2MB
    $config['file_name'] = md5(uniqid(rand(), true)); // Generate unique filename

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('image')) {
        $response = array('status' => 'error', 'message' => $this->upload->display_errors());
        echo json_encode($response);
    } else {
        $data = $this->upload->data();
        $image_url = substr($uploadPath,1) . $data['file_name'];
        $response = array('status' => 'success', 'image_url' => $image_url);
        echo json_encode($response);
    
    }
}

public function add() {
    if ($this->session->userdata('role') == "1") {
        $data_kejadian = $this->m_data_kejadian;
        $validation = $this->form_validation;
        $validation->set_rules($data_kejadian->rules());

        if ($validation->run()) {
            $tanggal = $this->input->post('tanggal');
            $formatted_date = date('dmy', strtotime($tanggal));
            $new_id_kejadian = $this->m_data_kejadian->getLastIDkejadian($formatted_date);

            // Simpan data dengan ID transaksi baru dan id_kejadian
            $data_kejadian->save($new_id_kejadian, $new_id_kejadian);

            // Simpan ID kejadian baru ke session
            $this->session->set_flashdata('new_id_kejadian', $new_id_kejadian);

            // Menentukan form tujuan berdasarkan jenis kejadian
            $kejadian = $this->input->post('kejadian');
            switch ($kejadian) {
                case 'Kecelakaan Lalu Lintas':
                    $redirect_url = 'admin/data_kejadian/kecelakaan_lalu_lintas';
                    break;
                case 'Darurat Medis':
                    $redirect_url = 'admin/data_kejadian/darurat_medis';
                    break;
                case 'Kebakaran':
                    $redirect_url = 'admin/data_kejadian/kebakaran';
                    break;
                case 'Pohon Tumbang':
                    $redirect_url = 'admin/data_kejadian/pohon_tumbang';
                    break;
                case 'Penemuan Jenazah':
                    $redirect_url = 'admin/data_kejadian/penemuan_jenazah';
                    break;
                case 'Orang Tenggelam':
                    $redirect_url = 'admin/data_kejadian/orang_tenggelam';
                    break;
                case 'Lainnya':
                    $redirect_url = 'admin/data_kejadian/lainnya';
                    break;
                default:
                    $redirect_url = 'admin/data_kejadian';
            }

            // Mengatur flashdata untuk menampilkan pesan sukses
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');

            // Redirect ke form tujuan dengan ID kejadian
            redirect(site_url($redirect_url));
        }
        else
        {
            // Jika validasi gagal, muat ulang formulir
            $this->load->view("admin/data_kejadian/new_form_datakejadian");
        }
    }
    else
    {
        show_404();
    }
}




  public function edit($id = null)


    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) redirect('admin/data_kejadian');
            $data_kejadian = $this->m_data_kejadian;
           

            $data["data_kejadian"] = $data_kejadian->getById($id);
            if (!$data["data_kejadian"]) show_404();
            
            $this->load->view("admin/data_kejadian/edit_form_datakejadian", $data);
        }
        else
        {
            show_404();
        }
    }

    public function update_data(){

        $post = $this->input->post();
            $update                     = $post['update'];
            $data_kejadian = $this->m_data_kejadian;
            $validation = $this->form_validation;
            $validation->set_rules($data_kejadian->rules());

           
            if ($validation->run() || $update) {
                echo "anjing";
                $data_kejadian->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
                $response = array('status'=>'success','message','data kejadian berhasil di edit');
                return;
            }

            $response = array('status'=>'error','message','data kejadian gagal di edit');
                return;
    }

    public function delete($id_kejadian = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id_kejadian)) show_404();
            
            if ($this->m_data_kejadian->delete($id_kejadian)) {
                redirect(site_url('admin/data_kejadian'));
            }
        }
        else
        {
            show_404();
        }
    }

	public function detail($id = null)
{
    if ($this->session->userdata('role') == "1") {
        if (!isset($id)) {
            redirect('admin/data_kejadian'); // Redirect if $id is not set
        }
        
        $data_kejadian = $this->m_data_kejadian;
        $validation = $this->form_validation;
        $validation->set_rules($data_kejadian->rules());

        if ($validation->run()) {
            // Assuming your model method 'detail' directly updates based on the $id
            $data_kejadian->detail($id);
            $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
        }

        $data["data_kejadian"] = $data_kejadian->getById($id);
        if (!$data["data_kejadian"]) {
            show_404(); // Show 404 if data is not found
        }
        
        // Load view with correct data
        $this->load->view("admin/data_kejadian/detail_datakejadian", $data);
    } else {
        show_404(); // Show 404 if user role is not valid
    }
}


public function get_daerah()
{
    $data = $this->input->post('data');
    $value_wilayah = $this->input->post('wilayah');
    $response = [];

    if ($data == "kecamatan") {
        $daerah = $this->db->query("SELECT kecamatan FROM wilayah_2022 WHERE wilayah=? GROUP BY kecamatan ORDER BY kecamatan", [$value_wilayah])->result();
        foreach ($daerah as $d) {
            $response[] = ['value' => $d->kecamatan, 'label' => $d->kecamatan];
        }
    } else if ($data == "desa") {
        $daerah = $this->db->query("SELECT desa FROM wilayah_2022 WHERE kecamatan=? GROUP BY desa ORDER BY desa", [$value_wilayah])->result();
        foreach ($daerah as $d) {
            $response[] = ['value' => $d->desa, 'label' => $d->desa];
        }
    }

    echo json_encode($response); // Encode response as JSON
}



// menyimpan data korbann
public function darurat_medis()
{
    if ($this->session->userdata('role') != "1") {
        show_404();
        return;

    }

    $new_id_kejadian = $this->session->flashdata('new_id_kejadian');
    if (empty($new_id_kejadian)) {
        show_404();
        return;
    }

    $data['new_id_kejadian'] = $new_id_kejadian;
    $this->load->view("admin/data_kejadian/new_form_darurat_medis", $data);
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

public function save_darurat_medis()
{
    // Check user role
    if ($this->session->userdata('role') != "1") {
        $this->output->set_status_header(403); // Set HTTP response code 403 Forbidden
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
        return;
    }

    // Load model
    $this->load->model('M_form_darurat_medis');
    $data_kejadian = $this->M_form_darurat_medis;

    // Get the raw POST data
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, true);

    log_message('info', 'Received JSON data: ' . $inputJSON); 

    // Check if JSON is valid
    if ($input === null && json_last_error() !== JSON_ERROR_NONE) {
        // Handle JSON decode error
        $response = [
            'status' => 'error',
            'message' => 'Invalid JSON data'
        ];
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
        return;
    }

    // Log the incoming request data
    log_message('info', 'Incoming request data: ' . json_encode($input));

    // Set validation rules
    if ($input) {
        $this->form_validation->set_data($input); // Set data for validation
        $this->form_validation->set_rules($data_kejadian->rules());

        if ($this->form_validation->run() === TRUE) {
            // Validation success, prepare data to save
            $data = [
                'id_kejadian' => $input['id_kejadian'],
                'nama' => $input['nama'],
                'jenis_kelamin' => $input['jenis_kelamin'],
                'alamat' => $input['alamat'],
                'usia' => $input['usia'],
                'kondisi' => $input['kondisi'],
                'riwayat_penyakit' => $input['riwayat_penyakit'],
                'kronologi_darurat_medis' => $input['kronologi_darurat_medis'],
                'tindak_lanjut_darurat_medis' => $input['tindak_lanjut_darurat_medis'],
                'petugas_di_lokasi_darurat_medis' => $input['petugas_di_lokasi_darurat_medis'],
                'dokumentasi_darurat_medis' => $input['dokumentasi_darurat_medis'],
            ];

            // Log the data to be saved
            log_message('info', 'Data to be saved: ' . json_encode($data));

            // Save data using model
            $data_kejadian->save($data);

            // Prepare success response
            $response = [
                'status' => 'success',
                'data' => $data
            ];
        } else {
            // Validation failed, prepare error response
            $response = [
                'status' => 'error',
                'message' => validation_errors() // Return validation errors as a string
            ];

            // Log the validation errors
            log_message('error', 'Validation errors: ' . validation_errors());

        }
    } else {
        // If input data is null
        $response = [
            'status' => 'error',
            'message' => 'No valid input data received'
        ];
    }
    



    // Send JSON response
    $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($response));
}

public function kebakaran()
{
    if ($this->session->userdata('role') != "1") {
        show_404();
        return;
    }

    $new_id_kejadian = $this->session->flashdata('new_id_kejadian');
    if (empty($new_id_kejadian)) {
        show_404();
        return;
    }

    $data['new_id_kejadian'] = $new_id_kejadian;
    $this->load->view("admin/data_kejadian/new_form_kebakaran", $data);
}

public function save_kebakaran()
{
    // Check user role
    if ($this->session->userdata('role') != "1") {
        $this->output->set_status_header(403); // Set HTTP response code 403 Forbidden
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
        return;
    }

    // Load model
    $this->load->model('M_form_kebakaran');
    $data_kejadian = $this->M_form_kebakaran;

    // Get the raw POST data
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, true);

    // Log the incoming request data
    log_message('info', 'Received JSON data: ' . $inputJSON);

    // Check if JSON is valid
    if ($input === null && json_last_error() !== JSON_ERROR_NONE) {
        // Handle JSON decode error
        $response = [
            'status' => 'error',
            'message' => 'Invalid JSON format'
        ];
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
        return;
    }

    // Set validation rules
    if ($input) {
        $this->form_validation->set_data($input); // Set data for validation
        $this->form_validation->set_rules($data_kejadian->rules());

        if ($this->form_validation->run() === TRUE) {
            // Validation success, prepare data to save
            $data = [
                'id_kejadian' => $input['id_kejadian'],
                'objek_terbakar' => $input['objek_terbakar'],
                'luas_terbakar' => $input['luas_terbakar'],
                'luas_bangunan' => $input['luas_bangunan'],
                'penyebab' => $input['penyebab'],
                'status_bangunan' => $input['status_bangunan'],
                'nama' => $input['nama'],
                'usia' => $input['usia'],
                'jenis_kelamin' => $input['jenis_kelamin'],
                'alamat' => $input['alamat'],
                'lebar_jalan' => $input['lebar_jalan'],
                'kondisi_bangunan' => $input['kondisi_bangunan'],
                'kronologi_kebakaran' => $input['kronologi_kebakaran'],
                'tindak_lanjut_kebakaran' => $input['tindak_lanjut_kebakaran'],
                'petugas_di_lokasi_kebakaran' => $input['petugas_di_lokasi_kebakaran'],
                'dokumentasi_kebakaran' => $input['dokumentasi_kebakaran']
            ];

            // Log the data to be saved
            log_message('info', 'Data to be saved: ' . json_encode($data));

            // Save data using model
            $data_kejadian->save($data);

            // Prepare success response
            $response = [
                'status' => 'success',
                'data' => $data
            ];
        } else {
            // Validation failed, prepare error response
            $response = [
                'status' => 'error',
                'message' => validation_errors() // Return validation errors as a string
            ];

            // Log the validation errors
            log_message('error', 'Validation errors: ' . validation_errors());
        }
    } else {
        // If input data is null
        $response = [
            'status' => 'error',
            'message' => 'No valid input data received'
        ];
    }

    

    // Send JSON response
    $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($response));
}


    public function lainnya()
    {
        if ($this->session->userdata('role') != "1") {
            show_404();
            return;
        }
        $new_id_kejadian = $this->session->flashdata('new_id_kejadian');
        if (empty($new_id_kejadian)) {
            show_404();
            return;
        }

        $data['new_id_kejadian'] = $new_id_kejadian;
        $this->load->view("admin/data_kejadian/new_form_lainnya", $data);
    }

    public function save_lainnya(){
        if($this->session->userdata('role') != "1"){
            $this->output->set_status_header(403);
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
            return;
        }
        $this->load->model('M_form_lain');
        $data_kejadian = $this->M_form_lain;

        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        log_message('info', 'Received JSON data: ' . $inputJSON);

        if ($input === null && json_last_error() !== JSON_ERROR_NONE) {
            $response = [
                'status' => 'error',
                'message' => 'Invalid JSON format'
            ];
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode($response));
            return;
        }

        if ($input){
            $this->form_validation->set_data($input);
            $this->form_validation->set_rules($data_kejadian->rules());

            if ($this->form_validation->run() === TRUE){
                $data = [
                    'id_kejadian' => $input['id_kejadian'],
                    'jenis_kejadian_lain' => $input['jenis_kejadian_lain'],
                    'nama' => $input['nama'],
                    'alamat' => $input['alamat'],
                    'detail_obyek' => $input['detail_obyek'],
                    'kronologi_lain' => $input['kronologi_lain'],
                    'tindak_lanjut_lain' => $input['tindak_lanjut_lain'],
                    'petugas_di_lokasi_lain' => $input['petugas_di_lokasi_lain'],
                    'dokumentasi_lain' => $input['dokumentasi_lain']
                ];

                log_message('info', 'Data to be saved: ' . json_encode($data));

                $data_kejadian->save($data);

                $response = [
                    'status' => 'success',
                    'data' => $data
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => validation_errors()
                ];

                log_message('error', 'Validation errors: ' . validation_errors());
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No valid input data received'
            ];
        }

        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }

    public function kecelakaan_lalu_lintas()
    {
        if ($this->session->userdata('role') != "1") {
            show_404();
            return;
        }

        $new_id_kejadian = $this->session->flashdata('new_id_kejadian');
        if (empty($new_id_kejadian)) {
            show_404();
            return;
        }

        $data['new_id_kejadian'] = $new_id_kejadian;
        $this->load->view("admin/data_kejadian/new_form_kecelakaan_lalu_lintas", $data);
    }

    public function save_kecelakaan_lalu_lintas(){
        if($this->session->userdata('role') != "1"){
            $this->output->set_status_header(403);
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
            return;
        }
        $this->load->model('M_form_laka');
        $data_kejadian = $this->M_form_laka;

        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        log_message('info', 'Received JSON data: ' . $inputJSON);

        if ($input === null && json_last_error() !== JSON_ERROR_NONE) {
            $response = [
                'status' => 'error',
                'message' => 'Invalid JSON format'
            ];
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode($response));
            return;
        }

        if ($input){
            $this->form_validation->set_data($input);
            $this->form_validation->set_rules($data_kejadian->rules());

            if ($this->form_validation->run() === TRUE){
                $data = [
                    'id_kejadian' => $input['id_kejadian'],
                    'nama' => $input['nama'],
                    'jenis_kelamin' => $input['jenis_kelamin'],
                    'usia' => $input['usia'],
                    'alamat' => $input['alamat'],
                    'kendaraan' => $input['kendaraan'],
                    'luka' => $input['luka'],
                    'kondisi' => $input['kondisi'],
                    'kronologi_laka' => $input['kronologi_laka'],
                    'tindak_lanjut_laka' => $input['tindak_lanjut_laka'],
                    'petugas_di_lokasi_laka' => $input['petugas_di_lokasi_laka'],
                    'dokumentasi_laka' => $input['dokumentasi_laka']
                ];

                log_message('info', 'Data to be saved: ' . json_encode($data));

                $data_kejadian->save($data);

                $response = [
                    'status' => 'success',
                    'data' => $data
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => validation_errors()
                ];

                log_message('error', 'Validation errors: ' . validation_errors());
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No valid input data received'
            ];
        }

        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }

    public function orang_tenggelam()
    {
        if ($this->session->userdata('role') != "1") {
            show_404();
            return;
        }
        $new_id_kejadian = $this->session->flashdata('new_id_kejadian');
        if (empty($new_id_kejadian)) {
            show_404();
            return;
        }

        $data['new_id_kejadian'] = $new_id_kejadian;
        $this->load->view("admin/data_kejadian/new_form_orang_tenggelam", $data);
    }

    public function save_orang_tenggelam(){
        if($this->session->userdata('role') != "1"){
            $this->output->set_status_header(403);
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
            return;
        }
        $this->load->model('M_form_orang_tenggelam');
        $data_kejadian = $this->M_form_orang_tenggelam;

        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        log_message('info', 'Received JSON data: ' . $inputJSON);

        if ($input === null && json_last_error() !== JSON_ERROR_NONE) {
            $response = [
                'status' => 'error',
                'message' => 'Invalid JSON format'
            ];
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode($response));
            return;
        }

        if ($input){
            $this->form_validation->set_data($input);
            $this->form_validation->set_rules($data_kejadian->rules());

            if ($this->form_validation->run() === TRUE){
                $data = [
                    'id_kejadian' => $input['id_kejadian'],
                    'nama_saksi' => $input['nama_saksi'],
                    'usia_saksi' => $input['usia_saksi'],
                    'alamat_saksi' => $input['alamat_saksi'],
                    'hubungan_saksi' => $input['hubungan_saksi'],
                    'nama_korban' => $input['nama_korban'],
                    'usia_korban' => $input['usia_korban'],
                    'jenis_kelamin' => $input['jenis_kelamin'],
                    'alamat' => $input['alamat'],
                    'kondisi' => $input['kondisi'],
                    'kronologi_orang_tenggelam' => $input['kronologi_orang_tenggelam'],
                    'tindak_lanjut_orang_tenggelam' => $input['tindak_lanjut_orang_tenggelam'],
                    'petugas_di_lokasi_orang_tenggelam' => $input['petugas_di_lokasi_orang_tenggelam'],
                    'dokumentasi_orang_tenggelam' => $input['dokumentasi_orang_tenggelam']
                ];

                log_message('info', 'Data to be saved: ' . json_encode($data));

                $data_kejadian->save($data);

                $response = [
                    'status' => 'success',
                    'data' => $data
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => validation_errors()
                ];

                log_message('error', 'Validation errors: ' . validation_errors());
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No valid input data received'
            ];
        }

        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }

    public function penemuan_jenazah()
    {
        if ($this->session->userdata('role') != "1") {
            show_404();
            return;
        }
        $new_id_kejadian = $this->session->flashdata('new_id_kejadian');
        if (empty($new_id_kejadian)) {
            show_404();
            return;
        }

        $data['new_id_kejadian'] = $new_id_kejadian;
        $this->load->view("admin/data_kejadian/new_form_penemuan_jenazah", $data);
    }

    public function save_penemuan_jenazah(){
        if($this->session->userdata('role') != "1"){
            $this->output->set_status_header(403);
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
            return;
        }
        $this->load->model('M_form_penemuan_jenazah');
        $data_kejadian = $this->M_form_penemuan_jenazah;

        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        log_message('info', 'Received JSON data: ' . $inputJSON);

        if ($input === null && json_last_error() !== JSON_ERROR_NONE) {
            $response = [
                'status' => 'error',
                'message' => 'Invalid JSON format'
            ];
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode($response));
            return;
        }

        if ($input){
            $this->form_validation->set_data($input);
            $this->form_validation->set_rules($data_kejadian->rules());

            if ($this->form_validation->run() === TRUE){
                $data = [
                    'id_kejadian' => $input['id_kejadian'],
                    'nama_saksi' => $input['nama_saksi'],
                    'usia_saksi' => $input['usia_saksi'],
                    'alamat_saksi' => $input['alamat_saksi'],
                    'nama_korban' => $input['nama_korban'],
                    'usia_korban' => $input['usia_korban'],
                    'alamat_korban' => $input['alamat_korban'],
                    'alamat_domisili_korban' => $input['alamat_domisili_korban'],
                    'kronologi_penemuan_jenazah' => $input['kronologi_penemuan_jenazah'],
                    'tindak_lanjut_penemuan_jenazah' => $input['tindak_lanjut_penemuan_jenazah'],
                    'petugas_di_lokasi_penemuan_jenazah' => $input['petugas_di_lokasi_penemuan_jenazah'],
                    'dokumentasi_penemuan_jenazah' => $input['dokumentasi_penemuan_jenazah']
                ];

                log_message('info', 'Data to be saved: ' . json_encode($data));

                $data_kejadian->save($data);

                $response = [
                    'status' => 'success',
                    'data' => $data
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => validation_errors()
                ];

                log_message('error', 'Validation errors: ' . validation_errors());
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No valid input data received'
            ];
        }

        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }

    public function pohon_tumbang()
    {
        if ($this->session->userdata('role') != "1") {
            show_404();
            return;
        }
        $new_id_kejadian = $this->session->flashdata('new_id_kejadian');
        if (empty($new_id_kejadian)) {
            show_404();
            return;
        }

        $data['new_id_kejadian'] = $new_id_kejadian;
        $this->load->view("admin/data_kejadian/new_form_pohon_tumbang", $data);
    }

    public function save_pohon_tumbang(){
        if($this->session->userdata('role') != "1"){
            $this->output->set_status_header(403);
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
            return;
        }
        $this->load->model('M_form_pohon_tumbang');
        $data_kejadian = $this->M_form_pohon_tumbang;

        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        log_message('info', 'Received JSON data: ' . $inputJSON);

        if ($input === null && json_last_error() !== JSON_ERROR_NONE) {
            $response = [
                'status' => 'error',
                'message' => 'Invalid JSON format'
            ];
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode($response));
            return;
        }

        if ($input){
            $this->form_validation->set_data($input);
            $this->form_validation->set_rules($data_kejadian->rules());

            if ($this->form_validation->run() === TRUE){
                $data = [
                    'id_kejadian' => $input['id_kejadian'],
                    'jenis_pohon' => $input['jenis_pohon'],
                    'diameter' => $input['diameter'],
                    'tinggi' => $input['tinggi'],
                    'tindak_lanjut_pohon_tumbang' => $input['tindak_lanjut_pohon_tumbang'],
                    'petugas_di_lokasi_pohon_tumbang' => $input['petugas_di_lokasi_pohon_tumbang'],
                    'dokumentasi_pohon_tumbang' => $input['dokumentasi_pohon_tumbang']
                ];

                log_message('info', 'Data to be saved: ' . json_encode($data));

                $data_kejadian->save($data);

                $response = [
                    'status' => 'success',
                    'data' => $data
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => validation_errors()
                ];

                log_message('error', 'Validation errors: ' . validation_errors());
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No valid input data received'
            ];
        }

        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }



    public function get_kabkota() {
        $wilayah = $this->input->get('wilayah');
        $result = $this->db->select('kab_kota as value, kab_kota as text')
                           ->where('wilayah', $wilayah)
                           ->group_by('kab_kota')
                           ->get('wilayah_2022')
                           ->result();
        echo json_encode($result);
    }

    public function get_kecamatan() {
        $kabkota = $this->input->get('kabkota');
        $result = $this->db->select('kecamatan as value, kecamatan as text')
                           ->where('kab_kota', $kabkota)
                           ->group_by('kecamatan')
                           ->get('wilayah_2022')
                           ->result();
        echo json_encode($result);
    }

    public function get_kelurahan() {
        $kecamatan = $this->input->get('kecamatan');
        $result = $this->db->select('kelurahan as value, kelurahan as text')
                           ->where('kecamatan', $kecamatan)
                           ->group_by('desa')
                           ->get('wilayah_2022')
                           ->result();
        echo json_encode($result);
    }



}