<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use application\models\M_pdf;

class Controller_pdf extends CI_Controller{
    public function download($tableName, $columns){
        // inisialisasi model dan set tabel dinamis
        $model = new M_pdf();
        $model = setTable($tableName);

        // ambil data dari database
        $data = $model->select($columns)->findAll();

        // pecah kolom ke dalam array
        $columnsarray = explode(',', $columns);
        
        // buat instance tcpdf
        $pdf = new TCPDF();

        // set informasi dokumen
        $pdf->SetCreator("BPBDSurabaya");
        $pdf->SetAuthor('Nama Penulis');
        $pdf->SetTitle('Judul PDF');
        $pdf->SetSubject('Subject PDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // Set header dan footer
        $pdf->setHeaderData('', 0, 'Judul Header', 'Deskripsi Header');
        $pdf->setFooterData([0,64,0], [0,64,128]);
 
        // Set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Tambah halaman
        $pdf->AddPage();

        // Set content
        $html = '<h2>'. ucfirst($tableName) . '</h2>';
        $html .= '<table border="1" cellpadding="4">';
        $html .= '<thead><tr>';

        // Header tabel dinamis
        foreach ($columnsArray as $column) {
            $html .= '<th>' . ucfirst($column) . '</th>';
        }
        $html .= '</tr></thead><tbody>';

        // Isi tabel dari database
        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($columnsArray as $column) {
                $html .= '<td>' . $row[$column] . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';

        // Tulis HTML ke PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output($tableName . '.pdf', 'I'); // 'I' untuk menampilkan di browser, 'D' untuk download
    }
}

?>