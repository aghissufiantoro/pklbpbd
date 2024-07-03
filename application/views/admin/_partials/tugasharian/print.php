<?php

class PDF extends PDF_MC_Table
{
	function Header()
	{
	    //Put the watermark
	    $this->SetFont('Arial','B',50);
	    $this->SetTextColor(255,192,203);
	    $this->RotatedText(35,190,'W a t e r m a r k   d e m o',45);
	}

	function RotatedText($x, $y, $txt, $angle)
	{
	    //Text rotated around its origin
	    $this->Rotate($angle,$x,$y);
	    $this->Text($x,$y,$txt);
	    $this->Rotate(0);
	}
}
$no = 1;

$date = date('Y-m-d');
$tgl_tugasharian = $tgltugas->tgl_tugas_harian;

$pdf = new PDF_MC_Table("L", "cm", "Legal");

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image(base_url('image/logov2.png'), 1, 1, 2, 2);
$pdf->SetFont('Times','B',13);
$pdf->SetX(3.5);            
$pdf->MultiCell(19.5, 0.5, strtoupper(SITE_NAME), 0, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetX(3.5);
$pdf->MultiCell(19.5, 0.5, "Jl. Asemraya No. 2A", 0, 'L');
$pdf->SetX(3.5);
$pdf->MultiCell(19.5, 0.5, 'Asemrowo - Kota Surabaya - Jawa Timur - Indonesia', 0, 'L');
$pdf->SetX(3.5);
$pdf->MultiCell(19.5, 0.5, 'Telp. 5326564', 0, 'L');
$pdf->Line(1, 3.1, 34, 3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1, 3.2, 34, 3.2);   
$pdf->SetLineWidth(0);

$pdf->ln(1);
$pdf->SetFont('Arial','B', 14);
// $satu = mktime(0,0,0,date("n"),date("j")+1,date("Y"));
// $tgl = date('d-m-Y', $satu);
// $tagl = date('d', $satu);
$fck = $tgl_tugasharian;
$pdf->Cell(34, 0.7, "JADWAL HARIAN KECAMATAN ASEMROWO", 0, 0, 'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B', 12);
$pdf->Cell(8.5, 0.7, "Tanggal kegiatan : ".indonesian_date($fck, 'l, d F Y'), 0, 0, 'C');
$pdf->ln(1);

$pdf->SetWidths(Array(1, 2.8, 9, 6, 8, 6.6));
$pdf->SetLineHeight(1);

$pdf->SetAligns(Array('C','C','L','L','L','L'));

$pdf->SetFont('Arial','B', 11.5);
$pdf->Cell(1, 1, 'NO', 1, 0, 'C');
$pdf->Cell(2.8, 1, 'Jam', 1, 0, 'C');
$pdf->Cell(9, 1, 'Uraian', 1, 0, 'C');
$pdf->Cell(6, 1, 'Tempat', 1, 0, 'C');
$pdf->Cell(8, 1, 'Penanggung Jawab', 1, 0, 'C');
$pdf->Cell(6.6, 1, 'Keterangan', 1, 0, 'C');

$pdf->Ln();

$pdf->SetFont('Arial', '', 11);

$qq = $this->db->query("SELECT * FROM tugas_harian WHERE tgl_tugas_harian = '$tgl_tugasharian' ORDER BY jam_tugas_harian ASC")->result();
foreach($qq as $tmp)
{
	$pdf->Row(Array(
		$no++,
		indonesian_date($tmp->jam_tugas_harian, 'H.i')." WIB",
		$tmp->perihal_tugas_harian,
		$tmp->tempat_tugas_harian,
		$tmp->disposisi_tugas_harian,
		$tmp->ket_tugas_harian
	));
}

$pdf->Output("Tugas Tanggal ".indonesian_date($fck, 'd F Y')." Kec. Asemrowo.pdf", "I");
?>