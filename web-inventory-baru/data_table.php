<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT data_barang.id_barang, data_barang.nama_barang, data_barang.tahun_pengadaan, data_barang.id_jenis, data_barang.id_merk, data_barang.id_kondisi,
jenis.id_jenis, jenis.nama_jenis,
merk.id_merk, merk.nama_merk,
kondisi.id_kondisi, kondisi.nama_kondisi 
FROM data_barang
INNER JOIN jenis ON data_barang.id_jenis = jenis.id_jenis
INNER JOIN merk ON data_barang.id_merk = merk.id_merk
INNER JOIN kondisi ON data_barang.id_kondisi = kondisi.id_kondisi;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="zxx">



<div class="main_content_iner ">
<div class="container-fluid p-0">
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
</div>
</div>
</div>
<div class="white_card_body">
<div class="QA_section">
<div class="white_box_tittle list_header">
<div class="box_right d-flex lms_block">
<div class="serach_field_2">
<div class="search_inner">
</div>
</div>
</div>
</div>
<div class="QA_table mb_30">

<table class="table lms_table_active ">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Nama Barang</th>
<th scope="col">Merk Barang</th>
<th scope="col">Jenis Barang</th>
<th scope="col">Tahun Pengadaan</th>
<th scope="col">Status</th>
</tr>
</thead>
<tbody>
<?php
         if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>           
                <td ><?php echo $row['id_barang'] ?></td>
                <td ><?php echo $row['nama_barang'] ?></td>
                <td ><?php echo $row['nama_merk'] ?></td>
                <td ><?php echo $row['nama_jenis'] ?></td>
                <td ><?php echo $row['tahun_pengadaan'] ?></td>
                <td ><?php echo $row['nama_kondisi'] ?></td>
                </tr>

            </tr>
            <?php
                }

                }else{
                    echo "0 result";
                }
                $conn->close();
            ?>


</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="col-12">
</div>
</div>
</div>
</div>


</body>

<!-- Mirrored from demo.dashboardpack.com/sales-html/data_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Apr 2022 06:33:36 GMT -->
</html>