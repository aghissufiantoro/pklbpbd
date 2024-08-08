<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load the PDF library
        $this->load->library('Pdf');
    }

    public function pdf()
    {
        $pdf = new Pdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        // Add content to the PDF
        for ($i = 1; $i <= 40; $i++) {
            $pdf->Cell(0, 10, 'Printing line number ' . $i, 0, 1);
        }

        // Output the PDF
        $pdf->Output('D', 'generated_document.pdf'); // 'D' untuk force download
    }
}
?>


<?php
require_once __DIR__ . '\third_party\fpdf\fpdf.php';

$downloadpdf = $this->load->view('application\views\admin\_partials\dokumentasi_sinasini\index.php',[], true) 

$fpdf = new \fpdf\fpdf();
$fpdf->WriteHTML($downloadpdf)
$fpdf->Output();

?>