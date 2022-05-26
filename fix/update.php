<?php

include "connection.php";

$sql = "SELECT * FROM data_barang";
$result = $conn->query($sql);

    if(isset($_GET['id'])){
        $id_barang=$_GET['id'];
    }
    else {
        die ("ID Tidak ditemukan");    
    }
    
$query    =mysqli_query($conn, "SELECT data_barang.id_barang, data_barang.location_asset, data_barang.nama_barang, data_barang.tahun_pengadaan, data_barang.jenis, data_barang.id_merk, data_barang.kondisi,
merk.id_merk, merk.nama_merk
FROM data_barang
INNER JOIN merk ON data_barang.id_merk = merk.id_merk  WHERE id_barang='$id_barang' order by data_barang.nama_barang asc;");
$result    =mysqli_fetch_array($query);

?>

<?php
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $merek = $_POST['id_merek'];
    $tahun = $_POST['tahun'];
    $kondisi = $_POST['kondisi'];
    $lokasi = $_POST['lokasi'];
    
    $query="UPDATE data_barang set nama_barang='$nama', tahun_pengadaan='$tahun', location_asset='$lokasi', id_merk='$merek',jenis='$jenis',kondisi='$kondisi' where id_barang='$id_barang'";
			$result = mysqli_query($conn, $query);
			if($result){
				?><meta http-equiv="refresh" content="0;URL='index.php?page=data_table'"><?php
				
			}else{
				echo "Update Gagal";
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
<h2 class="m-0">Update Data</h2>
</div>
</div>
</div>
<div class="white_card_body">
<form method="post">
<div class="mb-3 row">
<label for="inputID" class="form-label col-sm-2 col-form-label">ID</label>
<div class="col-sm-8">
<input type="email" class="form-control" id="inputID" value="<?php echo $id_barang ?>" readonly>
</div>
</div>

<div class="mb-3 row">
<label for="inputNamaBarang" class="form-label col-sm-2 col-form-label">Nama</label>
<div class="col-sm-8">
<input type="type" name="nama" class="form-control" id="inputNamaBarang" value="<?php echo $result['nama_barang']?>">
</div>
</div>

<div class="mb-3 row">
<label for="inputJenisBarang" class="form-label col-sm-2 col-form-label">Jenis</label>
<div class="col-sm-8">
<input type="type" name="jenis" class="form-control" id="inputNamaBarang" value="<?php echo $result['jenis']?>">
</div>
</div>

<div class="mb-3 row">
<label class="form-label col-sm-2 col-form-label">Merek</label>
<div class="col-sm-8">
<select name="id_merek" id="inputMerek" class="form-control" required>
<option value="<?php echo $result['id_merk']?>"> <?php echo $result['nama_merk']?> </option>
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
<input type="number" name="tahun" min="1000" max="9999" class="form-control" id="inputTahun" value=<?php echo $result['tahun_pengadaan']?>>
</div>
</div>

<div class="mb-3 row">
<label class="form-label col-sm-2 col-form-label">Lokasi</label>
<div class="col-sm-8">
<select name="lokasi" id="inputLokasi" class="form-control" required>
<option value="<?php echo $result['location_asset'];?>"><?php echo $result['location_asset'];?></option>
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

<div class=" row">
<div class="col-sm-10">
<td><input type="submit" class="btn btn-primary" name="submit" value="Insert"></td>
</div>
</div>
</form>
</div>
</div>
</div>

<div class="footer_part">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="footer_iner text-center">
<p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a></p>
</div>
</div>
</div>
</div>
</div>
</section>


</body>
</html>