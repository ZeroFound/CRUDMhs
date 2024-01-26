<?php 
require_once("tcpdf/tcpdf.php");
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MAS TURU');
$pdf->SetTitle('Data Mahasiswa');
$pdf->SetSubject('Data Mahasiswa');
$pdf->SetKeywords('Data Mahasiswa');

$pdf->SetFont('times', '', 11, '', true);

$pdf->setPrintHeader(false);

$pdf->AddPage();

$html = file_get_contents("http://localhost/CRUD/pdf.php");

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Data Mahasiswa.pdf', 'D');