<!DOCTYPE html>
<html>
<?php
    if(isset($_GET['nama_barang'])){
        $nama_barang    =$_GET['nama_barang'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "connection.php";
    $qry1 = mysqli_query($conn, "SELECT * FROM data_barang WHERE nama_barang = '$nama_barang' AND id_kondisi = '1' ");
    $cek1 = mysqli_num_rows($qry1);

    $qry2 = mysqli_query($conn, "SELECT * FROM data_barang WHERE nama_barang = '$nama_barang' AND id_kondisi = '2' ");
    $cek2 = mysqli_num_rows($qry);
?>

</html>