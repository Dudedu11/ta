<?php
include 'connection.php';

$query = mysqli_query($conn, "SELECT max(id_merk) as kodeTerbesar FROM merk");
$data = mysqli_fetch_array($query);
$kodeMerek = $data['kodeTerbesar'];
$urutan = (int) substr($kodeMerek, 3, 3);
$urutan++;
$huruf = "MRK";
$kodeMerek = $huruf . sprintf("%03s", $urutan);

if(isset($_POST['submit'])){
    $namaMerek = $_POST['nama_merek'];
    $insert = mysqli_query($conn,"INSERT INTO merk VALUES ('$kodeMerek', '$namaMerek')");
    if($insert){
        ?><meta http-equiv="refresh" content="0;URL='index.php?page=input_merek'"><?php
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
<h2 class="m-0">Input Merek</h2>
</div>
</div>
</div>
<div class="white_card_body">
<form method="post">
<div class="mb-3 row">
<label for="inputID" class="form-label col-sm-2 col-form-label">ID</label>
<div class="col-sm-8">
<input type="email" class="form-control" id="inputID" value="<?php echo $kodeMerek ?>" readonly>
</div>
</div>

<div class="mb-3 row">
<label for="inputNamaBarang" class="form-label col-sm-2 col-form-label">Nama Merek</label>
<div class="col-sm-8">
<input type="type" name="nama_merek" class="form-control" id="inputNamaBarang" placeholder="ex. Eigon">
</div>
</div>

<div class=" row">
<div class="col-sm-10">
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