<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataExport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login"));
        }

        $this->load->database('default');
        $this->load->helper('url');
    }

    public function index() {
        if ($this->session->userdata('role') == "1") {
            $this->load->view('export_view'); // Load the view containing the export button
        } else {
            show_404();
        }
    }

    public function export_to_excel() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Kejadian');
        $sheet->setCellValue('C1', 'Tanggal');
        $sheet->setCellValue('D1', 'Kejadian');
        $sheet->setCellValue('E1', 'Waktu Berita');
        $sheet->setCellValue('F1', 'Waktu Tiba');
        $sheet->setCellValue('G1', 'Lokasi Kejadian');
        $sheet->setCellValue('H1', 'Kecamatan');
        $sheet->setCellValue('I1', 'Kelurahan');
        $sheet->setCellValue('J1', 'Alamat Kejadian');
        $sheet->setCellValue('K1', 'Kronologi');
        $sheet->setCellValue('L1', 'Tindak Lanjut');
        $sheet->setCellValue('M1', 'Dokumentasi');

        // Fetch data from database
        $db_data_kejadian = $this->db->query("SELECT * FROM data_kejadian ORDER BY tanggal DESC")->result();
        $row = 2;
        $no = 1;
        foreach ($db_data_kejadian as $res_data_kejadian) {
            $keca = $res_data_kejadian->kecamatan_kejadian;
            $kelu = $res_data_kejadian->kelurahan_kejadian;

            $rsl_keca = $this->db->query("SELECT kecamatan FROM wilayah_2022 WHERE kecamatan = '$keca'")->row();
            $rsl_kelu = $this->db->query("SELECT desa FROM wilayah_2022 WHERE desa = '$kelu'")->row();

            $keca_new = ($rsl_keca && isset($rsl_keca->kecamatan)) ? ucwords(strtolower($rsl_keca->kecamatan)) : "Data tidak ditemukan";
            $kelu_new = ($rsl_kelu && isset($rsl_kelu->desa)) ? ucwords(strtolower($rsl_kelu->desa)) : "Data tidak ditemukan";

            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $res_data_kejadian->id_kejadian);
            $sheet->setCellValue('C' . $row, $res_data_kejadian->tanggal);
            $sheet->setCellValue('D' . $row, $res_data_kejadian->kejadian);
            $sheet->setCellValue('E' . $row, $res_data_kejadian->waktu_berita);
            $sheet->setCellValue('F' . $row, $res_data_kejadian->waktu_tiba);
            $sheet->setCellValue('G' . $row, $res_data_kejadian->lokasi_kejadian);
            $sheet->setCellValue('H' . $row, $keca_new);
            $sheet->setCellValue('I' . $row, $kelu_new);
            $sheet->setCellValue('J' . $row, $res_data_kejadian->alamat_kejadian);
            $sheet->setCellValue('K' . $row, $res_data_kejadian->kronologi);
            $sheet->setCellValue('L' . $row, $res_data_kejadian->tindak_lanjut);
            $sheet->setCellValue('M' . $row, $res_data_kejadian->dokumentasi);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'data_kejadian.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
