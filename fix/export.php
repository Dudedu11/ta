<?php

    require('fpdf184/fpdf.php');

    include 'connection.php';
    $sql = "SELECT data_barang.id_barang, data_barang.nama_barang, data_barang.tahun_pengadaan, data_barang.jenis, data_barang.id_merk, data_barang.kondisi,
    merk.id_merk, merk.nama_merk, sum(IF(data_barang.kondisi='Baik',1,0)) as baik,
    sum(IF(data_barang.kondisi='Rusak',1,0)) as rusak,
    sum(IF(data_barang.kondisi='Rusak Berat',1,0)) as rusak_berat , count(*) as total                                  
    FROM data_barang
    INNER JOIN merk ON data_barang.id_merk = merk.id_merk 
    group by data_barang.nama_barang order by data_barang.nama_barang asc ;";
     $result = $conn->query($sql);

    $pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    $pdf->Image('img/logo.png',20,12,15,15);
    // mencetak string 
    $pdf->Cell(190,20,'Data Barang',0,1,'C');

    // Memberikan space kebawah agar tidak terlalu rapat

    $pdf->SetFont('Arial','B',12);
    //$pdf->SetLeftMargin(25);
    $pdf->Cell(10 ,5,'No',1,0,'C');
    $pdf->Cell(35 ,5,'Nama Barang',1,0,'C');
    $pdf->Cell(30 ,5,'Merk Barang',1,0,'C');
    $pdf->Cell(45 ,5,'Jenis Barang',1,0,'C');
    $pdf->Cell(45 ,5,'Tahun Pengadaan',1,0,'C');
    $pdf->Cell(10 ,5,'Baik',1,0,'C');
    $pdf->Cell(10 ,5,'Rusak',1,0,'C');
    $pdf->Cell(10 ,5,'Rusak Berat',1,0,'C');
    $pdf->Cell(10 ,5,'Total',1,1,'C');

    $pdf->SetFont('Arial','',8);

    $pdf->SetFont('Arial','',10);


    if(isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $data = mysqli_query($conn,"SELECT
        data_barang.id_barang, data_barang.nama_barang,
        data_barang.tahun_pengadaan, data_barang.jenis,
        data_barang.id_merk, data_barang.kondisi,
        merk.id_merk, merk.nama_merk
        FROM data_barang
        INNER JOIN merk ON data_barang.id_merk = merk.id_merk
        WHERE nama_barang LIKE '%".$cari."%'
        ORDER BY data_barang.nama_barang ASC");    
    } else {
        $data = $result;  
    }


    $no = 1;
    while ($row = mysqli_fetch_array($data)){
        $pdf->Cell(10 ,15,$no,1,0,'C');
        $pdf->Cell(35 ,15,$row['nama_barang'],1,0,'C');
        $pdf->Cell(30 ,15,$row['nama_merk'],1,0,'C');
        $pdf->Cell(45 ,15,$row['jenis'],1,0,'C');
        $pdf->Cell(45 ,15,$row['tahun_pengadaan'],1,1,'C'); 
        $pdf->Cell(10 ,15,$row['baik'],1,0,'C');
        $pdf->Cell(10 ,15,$row['rusak'],1,0,'C');
        $pdf->Cell(10 ,15,$row['rusak_berat'],1,0,'C');
        $pdf->Cell(10 ,15,$row['total'],1,0,'C');

        $no++;
}

    $pdf->Output();
?>