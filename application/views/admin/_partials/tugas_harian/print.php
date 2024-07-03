<?php

class PDF extends PDF_MC_Table
{
    function Header()
    {
        // Put the watermark
        $this->SetFont('Arial', 'B', 50);
        $this->SetTextColor(255, 192, 203);
        $this->RotatedText(35, 190, 'W a t e r m a r k   d e m o', 45);
    }

    function RotatedText($x, $y, $txt, $angle)
    {
        // Text rotated around its origin
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->Rotate(0);
    }
}

$no = 1;
$date = date('Y-m-d');
$tgl_tugasharian = $tgltugas->tgl_tugas_harian ?? '';


$pdf = new PDF_MC_Table("L", "cm", "Legal");

$pdf->AliasNbPages();
$pdf->AddPage();
// $pdf->Image(base_url('image/logosibadak.png'), 1, 1, 2, 2);
$pdf->SetFont('Times', 'B', 13);
$pdf->SetX(3.5);
$pdf->MultiCell(19.5, 0.5, strtoupper(SITE_NAME), 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(3.5);
$pdf->MultiCell(19.5, 0.5, "Jl. Kyai Tambak Deres No. 252", 0, 'L');
$pdf->SetX(3.5);
$pdf->MultiCell(19.5, 0.5, 'Bulak - Kota Surabaya - Jawa Timur - Indonesia', 0, 'L');
$pdf->SetX(3.5);
$pdf->MultiCell(19.5, 0.5, 'Telp. (031) 51504384', 0, 'L');
$pdf->Line(1, 3.1, 34, 3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1, 3.2, 34, 3.2);
$pdf->SetLineWidth(0);

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 14);
$fck = $tgl_tugasharian;
$pdf->Cell(34, 0.7, "JADWAL HARIAN KECAMATAN BULAK", 0, 0, 'C');

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(8.5, 0.7, "Tanggal Kegiatan : " . indonesian_date($fck, 'l, d F Y'), 0, 0, 'C');
$pdf->Ln(1);

$pdf->SetWidths(Array(1, 2.8, 6, 2.8, 5, 6.6, 4, 6));
$pdf->SetLineHeight(1);
$pdf->SetAligns(Array('C', 'C', 'L', 'L', 'L', 'L', 'L', 'L'));

$pdf->SetFont('Arial', 'B', 11.5);
$pdf->Cell(1, 1, 'NO', 1, 0, 'C');
$pdf->Cell(2.8, 1, 'Jam', 1, 0, 'C');
$pdf->Cell(6, 1, 'Penanggung Jawab', 1, 0, 'C');
$pdf->Cell(2.8, 1, 'No. Surat', 1, 0, 'C');
$pdf->Cell(5, 1, 'Tempat', 1, 0, 'C');
$pdf->Cell(6.6, 1, 'Kegiatan', 1, 0, 'C');
$pdf->Cell(4, 1, 'Petugas', 1, 0, 'C');
$pdf->Cell(6, 1, 'Keterangan', 1, 0, 'C');

$pdf->Ln();
$pdf->SetFont('Arial', '', 11);

// Adjusted query to fetch the tasks for the specified date
$tasks = $this->db->query("SELECT * FROM tugas_harian WHERE DATE(tgl_tugas_harian) = ?", array($tgl_tugasharian))->result();

foreach ($tasks as $task) {
    $pdf->Row(Array(
        $no++,
        indonesian_date($task->jam_tugas_harian, 'H.i') . " WIB",
        $task->tanggungjawab_tugas_harian,
        $task->no_surat_tugas_harian,
        $task->tempat_tugas_harian,
        $task->perihal_tugas_harian,
        $task->petugas_tugas_harian,
        $task->ket_tugas_harian
    ));
}

$pdf->Output("Tugas Tanggal " . indonesian_date($fck, 'd F Y') . " Kec. Bulak.pdf", "I");

?>
