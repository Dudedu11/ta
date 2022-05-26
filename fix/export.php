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

    class PDF extends FPDF {
    function SetDash($black=false, $white=false) {
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
    $pdf->Cell(40 ,5,'Jenis Barang',1,0,'C');
    $pdf->Cell(25 ,5,'Tahun Pengadaan',1,0,'C');
    $pdf->Cell(10 ,5,'Baik',1,0,'C');
    $pdf->Cell(12 ,5,'Rusak',1,0,'C');
    $pdf->Cell(20 ,5,'Rusak Berat',1,0,'C');
    $pdf->Cell(10 ,5,'Total',1,1,'C');

    $pdf->SetFont('Arial','',8);

    // $pdf->SetFont('Arial','',8);


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

    // $xPos=$pdf->GetX();
	// $yPos=$pdf->GetY();

    $no = 1;
//     while ($row = mysqli_fetch_array($data)){
//         $pdf->Cell(8 ,3,$no,1,0,'C');
//         // $pdf->Cell(25 ,15,$row['nama_barang'],1,0,'C');
//         $pdf->MultiCell(25 ,3,$row['nama_barang'],1,'L');
//         $pdf->SetXY($xPos + 25 , $yPos);
//         $pdf->Cell(20 ,3,$row['nama_merk'],1,0,'L');
//         $pdf->MultiCell(35 ,3,$row['jenis'],1,'L');
//         $pdf->Cell(30 ,3,$row['tahun_pengadaan'],1,0,'L'); 
//         $pdf->Cell(10 ,3,$row['baik'],1,0,'L');
//         $pdf->Cell(12 ,3,$row['rusak'],1,0,'L');
//         $pdf->Cell(20 ,3,$row['rusak_berat'],1,0,'L');
//         $pdf->Cell(10 ,3,$row['total'],1,0,'L');

//         $no++;
// }

while($hasil=mysqli_fetch_array($data)){
    $cellWidth=40; //lebar sel
	$cellHeight=4; //tinggi sel satu baris normal
	
	//periksa apakah teksnya melibihi kolom?
	if($pdf->GetStringWidth($hasil['jenis']) < $cellWidth){
		//jika tidak, maka tidak melakukan apa-apa
		$line=1;
	}else{
		//jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
		//dengan memisahkan teks agar sesuai dengan lebar sel
		//lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
		
		$textLength=strlen($hasil['jenis']);	//total panjang teks
		$errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
		$startChar=0;		//posisi awal karakter untuk setiap baris
		$maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
		$textArray=array();	//untuk menampung data untuk setiap baris
		$tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
		
		while($startChar < $textLength){ //perulangan sampai akhir teks
			//perulangan sampai karakter maksimum tercapai
			while( 
			$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
			($startChar+$maxChar) < $textLength ) {
				$maxChar++;
				$tmpString=substr($hasil['jenis'],$startChar,$maxChar);
			}
			//pindahkan ke baris berikutnya
			$startChar=$startChar+$maxChar;
			//kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
			array_push($textArray,$tmpString);
			//reset variabel penampung
			$maxChar=0;
			$tmpString='';
		}
		//dapatkan jumlah baris
		$line=count($textArray);
	}
	$cellWidth=25;
    //tulis selnya
    $pdf->SetFillColor(255,255,255);
	$pdf->Cell(8,($line * $cellHeight),$no++,1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
    $xPos=$pdf->GetX();
	$yPos=$pdf->GetY();
	$pdf->MultiCell($cellWidth,$cellHeight,$hasil['nama_barang'],'T','L'); //sesuaikan ketinggian dengan jumlah garis
    $pdf->SetXY($xPos + $cellWidth , $yPos);
	$pdf->Cell(20,($line * $cellHeight),$hasil['nama_merk'],1,0);

	//memanfaatkan MultiCell sebagai ganti Cell
	//atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
	//ingat posisi x dan y sebelum menulis MultiCell
	$xPos=$pdf->GetX();
	$yPos=$pdf->GetY();
    $cellWidth = 40;
	$pdf->MultiCell($cellWidth,$cellHeight,$hasil['jenis'],'T');
	
	//kembalikan posisi untuk sel berikutnya di samping MultiCell 
    //dan offset x dengan lebar MultiCell
	$pdf->SetXY($xPos + $cellWidth , $yPos);
	
    $pdf->Cell(25,($line * $cellHeight),$hasil['tahun_pengadaan'],1,1); //sesuaikan ketinggian dengan jumlah garis
    // $pdf->Cell(10,($line * $cellHeight),$hasil['baik'],1,0,1);
    // $pdf->Cell(12,($line * $cellHeight),$hasil['rusak'],1,0,1);
    // $pdf->Cell(20,($line * $cellHeight),$hasil['rusak_berat'],1,0.1);
    // $pdf->Cell(10,($line * $cellHeight),$hasil['total'],1,0,1);
}

    $pdf->Output();
?>