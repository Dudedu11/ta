<?php
require('fpdf184/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$start_awal=$pdf->GetX(); 
$get_xxx = $pdf->GetX();
$get_yyy = $pdf->GetY();

$width_cell = 8;  
$height_cell = 5;    

$pdf->SetFont('Arial','',8);

$pdf->MultiCell(8,5,'No',1); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);               

$pdf->MultiCell(25,$height_cell,'Nama Barang',1); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(20,$height_cell,'Merk Barang',1); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(35,$height_cell,'Jenis Barang',1); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(30,$height_cell,'Tahun Pengadaan',1); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(10,$height_cell,'Baik',1); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(12,$height_cell,'Rusak',1); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(20,$height_cell,'Rusak Berat',1); 
$get_xxx+=$width_cell;                           
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell(10,$height_cell,'Total',1);
$get_xxx+=$width_cell;

$pdf->Ln();
$get_xxx=$start_awal;                      
$get_yyy+=$height_cell;                  

$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell($width_cell,$height_cell,'Kolomselanjutnya',1);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell($width_cell,$height_cell,'Kolomyangkhusus(extrakali)',1);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->MultiCell($width_cell,$height_cell,'kolomterakhir(extrakali)',1);
$get_xxx+=$width_cell;
$pdf->SetXY($get_xxx, $get_yyy);

$pdf->Output();
?>