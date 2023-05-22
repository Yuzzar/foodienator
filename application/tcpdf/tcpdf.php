<?php

require_once 'controllers/admin/Home.php';

// Membuat instance objek TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Set properti dokumen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('www.foodienator.com');
$pdf->SetTitle('Report');
$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

// Set font default
$pdf->SetFont('helvetica', '', 12);

// Menambahkan halaman
$pdf->AddPage();

// Menulis konten pada halaman
$pdf->Cell(0, 10, 'Contoh Konten', 0, 1, 'C');

// Outputkan file PDF
$pdf->Output('output.pdf', 'D');
