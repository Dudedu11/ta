<html>

<head>
<title>Select 2 with input textboxt | www.hakkoblogs.com</title>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
<?php
include "conn.php";
if(isset($_POST['input'])){
    $inputpro   = $_POST['inputpro'];
    $cek = mysqli_query($koneksi, "SELECT * FROM provinsi WHERE provinsi='$inputpro'");
    if(mysqli_num_rows($cek) == 0){
        $insert = mysqli_query($koneksi, "INSERT INTO provinsi(provinsi) VALUES('$inputpro')") or die(mysqli_error());
        if($insert){
            echo 'Data berhasil disimpan!';
        }else{
            echo 'Data gagal di simpan!';
        }
    }else{
        echo 'Data sudah ada!';
    }
}
?>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Provinsi</label>
<div class="col-sm-3">
<select name="kode" id="kode" class="form-control select2" required>
<option value=""> -- Pilih Provinsi -- </option>

<?php 
$query1="select * from provinsi";
$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
while($data=mysqli_fetch_array($tampil))
{
?>
<option value="<?php echo $data['provinsi'];?>"><?php echo $data['provinsi'];?></option>
<?php } ?>
</select>
</div>
</div>

<script
src="https://code.jquery.com/jquery-2.2.4.min.js"
integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

<script>
$(function () {
    $('.select2').select2({tags: true}).on('select2:open', () => {
        $(".select2-results:not(:has(a))").append('<form name="inputprovinsi" method="POST" action=""><input type="text" size="10" id="inputpro" name="inputpro"/><input type="submit" id="input" name="input" value="Add Data"/></form><a href="#"></a>');})
});
</script>

</body>
</html>
