<?php

    require('fpdf184/fpdf.php');
    include 'connection.php';

    $sql = "SELECT data_barang.id_barang,data_barang.location_asset, data_barang.nama_barang, data_barang.tahun_pengadaan, data_barang.jenis, data_barang.id_merk, data_barang.kondisi,
    merk.id_merk, merk.nama_merk, count(*) as jumlah_barang
    FROM data_barang
    INNER JOIN merk ON data_barang.id_merk = merk.id_merk 
    where data_barang.kondisi ='Rusak'
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

    if(date('l') == "Monday"){
        $hari = "Senin";
    } else if(date('l') == "Tuesday"){
        $hari = "Selasa";
    } else if(date('l') == "Wednesday"){
        $hari = "Rabu";
    } else if(date('l') == "Thursday"){
        $hari = "Kamis";
    } else if(date('l') == "Friday"){
        $hari = "Jumat";
    } else if(date('l') == "Saturday"){
        $hari = "Sabtu";
    } else if(date('l') == "Sunday"){
        $hari = "Minggu";
    }

    if(date('m') == 01){
        $bulan = "Januari";
    } else if(date('m') == 02){ 
        $bulan = "Februari";
    } else if(date('m') == 03){
        $bulan = "Maret";
    } else if(date('m') == 04){
        $bulan = "April";
    } else if(date('m') == "05"){
        $bulan = "Mei";
    } else if(date('m') == 06){
        $bulan = "Juni";
    } else if(date('m') == 07){
        $bulan = "Juli";
    } else if(date('m') == "08"){
        $bulan = "Agustus";
    } else if(date('m') == "09"){
        $bulan = "September";
    } else if(date('m') == 10){
        $bulan = "Oktober";
    } else if(date('m') == 11){
        $bulan = "November";
    } else if(date('m') == 12){
        $bulan = "Desember";
    }
    
    
    $pdf = new FPDF('p','mm','A4');
    // membuat halaman baru
    $pdf->AddPage();
  //  $pdf->Line(20, 39, 190, 39);
  $pdf->SetFont('Arial','B',20);
  $pdf->Cell(190,7,'',0,1,'C');
  $pdf->Image('img/logo.png',170,18,25,25);
//   $pdf->Ln();
//   $pdf->Ln();
  $start_awal=$pdf->GetX(); 
  $get_xxx = $pdf->GetX();
  $get_yyy = $pdf->GetY();
  
  // $width_cell = 95; 
  $height_cell = 5;    
  
  $pdf->SetFont('Arial','B',10);
  
  $pdf->MultiCell($width_cell=90,$height_cell,"BERITA ACARA\r\nPEMERIKSAAN PROGRESS FISIK CAPEX DAN OPEX PENGADAAN HOTEL TERMINAL 3 INT BSH",1,'C');
  $get_xxx+=$width_cell;                           
  $pdf->SetXY($get_xxx, $get_yyy);
  
  $pdf->SetFont('Arial','',10);            
  $pdf->MultiCell($width_cell=60,$height_cell,"Nomor\t\t\t\t\t: BAC.008/OPB/09/".date('Y')."\r\nTanggal\t\t\t: ".date('d ').$bulan.date(' Y')."\r\n ",1); 
  $get_xxx+=$width_cell;                           
  $pdf->SetXY($get_xxx, $get_yyy);
  
  $pdf->Ln();
  $get_xxx=$start_awal;                      
  $get_yyy+=($height_cell*3);                  
  
  $pdf->SetXY($get_xxx, $get_yyy);
  
  $pdf->SetFont('Arial','B',12); 
  $pdf->MultiCell($width_cell=90,10,'Per '.date('d ').$bulan.date(' Y').'',1,'C');
  $get_xxx+=$width_cell;
  $pdf->SetXY($get_xxx, $get_yyy);
  
  $pdf->SetFont('Arial','',12); 
  $pdf->MultiCell($width_cell=60,$height_cell,"M.A          : \r\nRKA. Thn :",1);
  $get_xxx+=$width_cell;
  $pdf->SetXY($get_xxx, $get_yyy);

  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();


    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',22);
    // $pdf->Image('img/angkasa.png',150,5,40,25);
    // mencetak string 
    $pdf->SetFont('Arial','',10);
    // mencetak string 
    $pdf->Cell(0,10,'Pada hari ini '.$hari.' tanggal '.date('d ').''.$bulan.''.date(' Y').' , saya bertanda tangan di bawah ini :',0,1,'L');
    $pdf->Cell(0,0,'     Nama     :  Zahra Maulida',0,1,'L');
    $pdf->Cell(0,8,'     Jabatan  :  Administator',0,1,'L');
    // $pdf->SetDash(); //restore no dash
    $pdf->SetFont('Arial','',10);
    
    $pdf->SetFillColor(255,255,255);
    // mencetak string 
    
    $pdf->MultiCell(0,4,'Dengan ini menyatakan bahwa telah melakukan pemeriksaan atas progres fisik Pengadaan Capex dan Opex Hotel Terminal 3 Internasional BSH per '.date('d ').$bulan.date(' Y').
    '. Berikut adalah data pemeriksaan progres fisik Pengadaan Capex dan Opex Hotel Terminal 3 Internasional BSH per '.date('d ').$bulan.date(' Y').' :',0,1,'J');
   
    

    $pdf->SetFont('Arial','B',16);
    // mencetak string 
    $pdf->Cell(190,5,'',0,1,'C');

    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->SetFillColor(210,221,242);
    $pdf->SetFont( 'Arial', 'B', 10 );
    // $pdf->SetFont( 'Arial','', 10 );
    //$pdf->SetLeftMargin(25);
    $pdf->Cell(7, 5,'No',1,0,'C',true);
    $pdf->Cell(35, 5,'Nama Barang',1,0,'C',true);
    $pdf->Cell(25, 5,'Merk Barang',1,0,'C',true);
    $pdf->Cell(40, 5,'Jenis Barang',1,0,'C',true);
    $pdf->Cell(12, 5,'Tahun',1,0,'C',true);
    $pdf->Cell(18, 5,'Lokasi',1,0,'C',true);
    $pdf->Cell(13, 5,'Status',1,0,'C',true);
    $pdf->Cell(27, 5,'Jumlah Barang',1,1,'C',true);

    $pdf->SetFont('Arial','',7);

    // $pdf->SetFont('Arial','',8);


    if(isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $data = mysqli_query($conn,"SELECT data_barang.id_barang,data_barang.location_asset, data_barang.nama_barang, data_barang.tahun_pengadaan, data_barang.jenis, data_barang.id_merk, data_barang.kondisi,
        merk.id_merk, merk.nama_merk, count(*) as jumlah_barang
        FROM data_barang
        INNER JOIN merk ON data_barang.id_merk = merk.id_merk 
        where data_barang.kondisi ='Rusak'
        group by data_barang.nama_barang order by data_barang.nama_barang asc ;");    
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
		
		while($startChar < $textLength ){ //perulangan sampai akhir teks
			//perulangan sampai karakter maksimum tercapai
			while( 
			$pdf->GetStringWidth($tmpString) < ($cellWidth-$errMargin) &&
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
	// $cellWidth=35;
    //tulis selnya
    $pdf->SetFillColor(255,255,255);
	$pdf->Cell(7,($line * $cellHeight),$no++,1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
    // $xPos=$pdf->GetX();
	// $yPos=$pdf->GetY();
	// $pdf->MultiCell($cellWidth,$cellHeight,$hasil['nama_barang'],1,'L'); //sesuaikan ketinggian dengan jumlah garis
    // $pdf->SetXY($xPos + $cellWidth , $yPos);

    $pdf->Cell(35,($line * $cellHeight),$hasil['nama_barang'],1,0);

    // $cellWidth=20;
    // $xPos=$pdf->GetX();
	// $yPos=$pdf->GetY();
	// $pdf->MultiCell($cellWidth,$cellHeight,$hasil['nama_merk'],1,'L'); //sesuaikan ketinggian dengan jumlah garis
    // $pdf->SetXY($xPos + $cellWidth , $yPos);

	$pdf->Cell(25,($line * $cellHeight),$hasil['nama_merk'],1,0);
    // $xPos=$pdf->GetX();
	// $yPos=$pdf->GetY();
    // $cellWidth = 20;
    // $pdf->MultiCell($cellWidth,$cellHeight,$hasil['nama_merk'],'T','L');

	//memanfaatkan MultiCell sebagai ganti Cell
	//atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
	//ingat posisi x dan y sebelum menulis MultiCell
	$xPos=$pdf->GetX();
	$yPos=$pdf->GetY();
    $cellWidth = 40 ;
	$pdf->MultiCell($cellWidth,$cellHeight,$hasil['jenis'],1);
	
	//kembalikan posisi untuk sel berikutnya di samping MultiCell 
    //dan offset x dengan lebar MultiCell
	$pdf->SetXY($xPos + $cellWidth , $yPos);
	
    $pdf->Cell($w=12,($line * $cellHeight),$hasil['tahun_pengadaan'],1,1,'C'); //sesuaikan ketinggian dengan jumlah garis
    $cellWidth += $w;
    $pdf->SetXY($xPos + $cellWidth, $yPos);
    $pdf->Cell($w=18,($line * $cellHeight),$hasil['location_asset'],1,1,'L');
    $cellWidth += $w;
    $pdf->SetXY($xPos + $cellWidth, $yPos);
    $pdf->Cell($w=13,($line * $cellHeight),$hasil['kondisi'],1,1,'C');
    $cellWidth += $w;
    $pdf->SetXY($xPos + $cellWidth, $yPos);
    $pdf->Cell($w=27,($line * $cellHeight),$hasil['jumlah_barang'],1,1,'C');
}
$pdf->Cell(190,5,'',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,4,'Demikian Berita Acara Progress Fisik ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.',0,1,'J');
$pdf->Ln();
$pdf->Ln();
// $pdf->SetXY(110, $yPos);
$yn=$pdf->GetY();
// if($yn <= 235){
$pdf->Cell(170,4,"Disusun oleh,",0,1,'R');
// $pdf->SetXY(120, 195);
$pdf->Cell(0,4,'Hotel Anara                       ',0,1,'R');
$pdf->SetFont('Arial','',200);
$pdf->Cell(0,4,'',0,1,'R');
$pdf->SetFont('Arial','',200);
$pdf->Cell(0,4,'',0,1,'R');
$pdf->SetFont('Arial','',200);
$pdf->Cell(0,4,'',0,1,'R');
$pdf->SetFont('Arial','',200);
$pdf->Cell(0,4,'',0,1,'R');
$pdf->SetFont('Arial','',200);
$pdf->Cell(0,4,'',0,1,'R');
$pdf->SetFont('Arial','',200);
$pdf->Cell(0,4,'',0,1,'R');

$pdf->SetFont('Arial','',200);
$pdf->Cell(0,4,'',0,1,'R');
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(173,4,'Zahra Maulida',0,1,'R');

$xn=$pdf->GetX();
$yn=$pdf->GetY();
$pdf->Image('img/ttd.jpeg',$xn+140,$yn - 30,40,25);
// }else{
//     $pdf->AddPage();
//     $pdf->SetX(25);
//     $pdf->SetY(25);
//     $pdf->Cell(170,4,"Disusun oleh,",0,1,'R');
// // $pdf->SetXY(120, 195);
// $pdf->Cell(0,4,'PT ANGKASA PURA PROPERTINDO',0,1,'R');
// $pdf->SetFont('Arial','',200);
// $pdf->Cell(0,4,'',0,1,'R');
// $pdf->SetFont('Arial','',200);
// $pdf->Cell(0,4,'',0,1,'R');
// $pdf->SetFont('Arial','',200);
// $pdf->Cell(0,4,'',0,1,'R');
// $pdf->SetFont('Arial','',200);
// $pdf->Cell(0,4,'',0,1,'R');
// $pdf->SetFont('Arial','',200);
// $pdf->Cell(0,4,'',0,1,'R');
// $pdf->SetFont('Arial','',200);
// $pdf->Cell(0,4,'',0,1,'R');

// $pdf->SetFont('Arial','',200);
// $pdf->Cell(0,4,'',0,1,'R');
// $pdf->SetFont('Arial','BU',10);
// $pdf->Cell(173,4,'Zahra Maulida',0,1,'R');

// $xn=$pdf->GetX();
// $yn=$pdf->GetY();
// $pdf->Image('img/ttd.jpeg',$xn+140,$yn - 30,40,25);

// }

$pdf->Output();
?>
