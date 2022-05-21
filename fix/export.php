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

     class PDF extends FPDF
{
    function SetDash($black=false, $white=false)
    {
        if($black and $white)
            $s=sprintf('[%.3f %.3f] 0 d', $black*$this->k, $white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }
}

    $pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
    $pdf->Line(20, 39, 190, 39);
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',22);
    $pdf->Image('img/logo.png',20,12,25,25);
    // mencetak string 
    $pdf->Cell(190,20,'Hotel Anara',0,1,'C');

    $pdf->SetFont('Arial','B',8);
    // mencetak string 
    $pdf->Cell(190,0,'Terminal 3 International Soekarno Hatta Airport, Tangerang, Indonesia 15125',0,1,'C');
    $pdf->Cell(190,10,'Telepon +62-21-39508559, Email hell0@anara@gmail.com',0,1,'C');
    // $pdf->SetDash(); //restore no dash

    $pdf->SetFont('Arial','B',16);
    // mencetak string 
    $pdf->Cell(190,10,'Data Barang',0,1,'C');

    // Memberikan space kebawah agar tidak terlalu rapat

    $pdf->SetFont('Arial','B',8);
    //$pdf->SetLeftMargin(25);
    $pdf->Cell(8 ,5,'No',1,0,'C');
    $pdf->Cell(25 ,5,'Nama Barang',1,0,'C');
    $pdf->Cell(20 ,5,'Merk Barang',1,0,'C');
    $pdf->Cell(35 ,5,'Jenis Barang',1,0,'C');
    $pdf->Cell(30 ,5,'Tahun Pengadaan',1,0,'C');
    $pdf->Cell(10 ,5,'Baik',1,0,'C');
    $pdf->Cell(12 ,5,'Rusak',1,0,'C');
    $pdf->Cell(20 ,5,'Rusak Berat',1,0,'C');
    $pdf->Cell(10 ,5,'Total',1,1,'C');

    $pdf->SetFont('Arial','',8);

    $pdf->SetFont('Arial','',8);


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
        $pdf->Cell(8 ,15,$no,1,0,'C');
        $pdf->Cell(25 ,15,$row['nama_barang'],1,0,'C');
        $pdf->Cell(20 ,15,$row['nama_merk'],1,0,'C');
        $pdf->Cell(35 ,15,$row['jenis'],1,0,'C');
        $pdf->Cell(30 ,15,$row['tahun_pengadaan'],1,0,'C'); 
        $pdf->Cell(10 ,15,$row['baik'],1,0,'C');
        $pdf->Cell(12 ,15,$row['rusak'],1,0,'C');
        $pdf->Cell(20 ,15,$row['rusak_berat'],1,0,'C');
        $pdf->Cell(10 ,15,$row['total'],1,1,'C');

        $no++;
}

    $pdf->Output();
?>