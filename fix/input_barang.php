<?php
include 'connection.php';

$query = mysqli_query($conn, "SELECT max(id_barang) as kodeTerbesar FROM data_barang");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $merek = $_POST['id_merek'];
    $tahun = $_POST['tahun'];
    $kondisi = $_POST['kondisi'];
    $lokasi = $_POST['lokasi'];
    
    $insert = mysqli_query($conn,"INSERT INTO data_barang VALUES ('$kodeBarang', '$nama', '$tahun', '$lokasi','$merek','$jenis','$kondisi')");
    if($insert){
        ?><meta http-equiv="refresh" content="0;URL='index.php?page=input_barang'"><?php
    }else{
        echo '<center>Gagal Upload</center>';
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<div class="main_content_iner ">
<div class="container-fluid p-0 sm_padding_15px">
<div class="white_card card_height_100 mb_30">
</div>
</div>
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h2 class="m-0">Input Barang</h2>
</div>
</div>
</div>
<div class="white_card_body">
<form method="post">
<div class="mb-3 row">
<label for="inputID" class="form-label col-sm-2 col-form-label">ID</label>
<div class="col-sm-8">
<input type="email" class="form-control" id="inputID" value="<?php echo $kodeBarang ?>" readonly>
</div>
</div>

<div class="mb-3 row">
<label for="inputNamaBarang" class="form-label col-sm-2 col-form-label">Nama</label>
<div class="col-sm-8">
<input type="type" name="nama" class="form-control" id="inputNamaBarang" placeholder="ex. Eigon Office Desk">
</div>
</div>

<div class="mb-3 row">
<label for="inputNamaBarang" class="form-label col-sm-2 col-form-label">Jenis</label>
<div class="col-sm-8">
<input type="type" name="jenis" class="form-control" id="inputNamaBarang" placeholder="ex. Bahan logam emas">
</div>
</div>



<div class="mb-3 row">
<label class="form-label col-sm-2 col-form-label">Merek</label>
<div class="col-sm-8">
<select name="id_merek" id="inputMerek" class="form-control" required>
<option value=""> -- Pilih Merek -- </option>
<?php 
$query1="select * from merk";
$tampil=mysqli_query($conn, $query1);
while($data=mysqli_fetch_array($tampil)) {
?><option value="<?php echo $data['id_merk'];?>"><?php echo $data['nama_merk'];?></option>
<?php } ?>
</select>
</div>
</div>

<div class="mb-3 row">
<label for="inputTahun" class="form-label col-sm-2 col-form-label">Tahun Pengadaan</label>
<div class="col-sm-8">
<input type="number" name="tahun" min="1000" max="9999" class="form-control" id="inputTahun" placeholder="ex. 2020">
</div>
</div>

<div class="mb-3 row">
<label class="form-label col-sm-2 col-form-label">Lokasi</label>
<div class="col-sm-8">
<select name="lokasi" id="inputLokasi" class="form-control" required>
<option value=""> -- Pilih Lokasi -- </option>
<option value="Lobby">Lobby</option>
<option value="Meeting Room">Meeting Room</option>
<option value="Restaurant">Restaurant</option>
<option value="Room">Room</option>
<option value="Reception Counter">Reception Counter</option>
<option value="Toilet">Toilet</option>
<option value="Bar/Kitchen">Bar/Kitchen</option>
<option value="Fitness Room">Fitness Room</option>
<option value="Parking Area">Parking Area</option>
<option value="Back Office">Back Office</option>
</select>
</div>
</div>

<fieldset class="">
<div class="row">
<div class="col-form-label col-sm-2 pt-0">Kondisi</div>
<div class="col-sm-8">
<div class="form-check">
<input class="form-check-input" type="radio" name="kondisi" id="baik" value="Baik">
<label class="form-label form-check-label" for="gridRadios1">
Baik
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="kondisi" id="rusak" value="Rusak">
<label class="form-label form-check-label" for="gridRadios2">
Rusak
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="kondisi" id="rusak berat" value="Rusak Berat">
<label class="form-label form-check-label" for="gridRadios3">
Rusak Berat
</label>
</div>
</label>
</div>
</div>
</div>
</fieldset>

<div class="row">
<div class="col-sm-12">
<td><input type="submit" class="btn btn-primary" name="submit" value="Insert"></td>
</div>
</div>
</form>
</div>
</div>
</div>


</section>



</body>
</html>