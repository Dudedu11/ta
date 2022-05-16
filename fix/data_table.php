<?php

include 'connection.php';

$sql = "SELECT data_barang.id_barang, data_barang.nama_barang, data_barang.tahun_pengadaan, data_barang.id_jenis, data_barang.id_merk, data_barang.kondisi,
jenis.id_jenis, jenis.nama_jenis,
merk.id_merk, merk.nama_merk
FROM data_barang
INNER JOIN jenis ON data_barang.id_jenis = jenis.id_jenis
INNER JOIN merk ON data_barang.id_merk = merk.id_merk order by data_barang.nama_barang asc;";
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
<th scope="col">Id_Barang</th>
<th scope="col">Nama Barang</th>
<th scope="col">Merk Barang</th>
<th scope="col">Jenis Barang</th>
<th scope="col">Tahun Pengadaan</th>
<th scope="col">Status</th>
<th scope="col">Aksi</th>
</tr>
</thead>
<tbody>

<?php 
            if(isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                $data = mysqli_query($conn,"SELECT
                data_barang.id_barang, data_barang.nama_barang,
                data_barang.tahun_pengadaan, data_barang.id_jenis,
                data_barang.id_merk, data_barang.kondisi,
                jenis.id_jenis, jenis.nama_jenis,
                merk.id_merk, merk.nama_merk
                FROM data_barang
                INNER JOIN jenis ON data_barang.id_jenis = jenis.id_jenis
                INNER JOIN merk ON data_barang.id_merk = merk.id_merk
                WHERE nama_barang LIKE '%".$cari."%'
                ORDER BY data_barang.nama_barang ASC");    
            } else {
                $data = $result;  
            }

            $no = 1;
            while($row = mysqli_fetch_array($data)) {
        ?>
                <tr>
                <td ><?php echo $no ?></td>           
                <td ><?php echo $row['id_barang'] ?></td>
                <td ><?php echo $row['nama_barang'] ?></td>
                <td ><?php echo $row['nama_merk'] ?></td>
                <td ><?php echo $row['nama_jenis'] ?></td>
                <td ><?php echo $row['tahun_pengadaan'] ?></td>
                <td ><?php echo $row['kondisi'] ?></td>
                <td ><a href="update.php? id=<?=$row['id_barang']?>">Update</a>
                <a href="delete.php? id=<?=$row['id_barang']?>">Delete</a></td>
                </tr>

            </tr>

            </tr>
            <?php
                $no++;
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

<div class="footer_part">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="footer_iner text-center">
<p>2022 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a></p>
</div>
</div>
</div>
</div>
</div>
</section>




<!-- Mirrored from demo.dashboardpack.com/sales-html/data_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Apr 2022 06:33:36 GMT -->
</html>