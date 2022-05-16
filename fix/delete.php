<?php

include "connection.php";
?>

<?php
$sql = "SELECT * FROM data_barang";
$result = $conn->query($sql);

    if(isset($_GET['id'])){
        $id_barang=$_GET['id'];
    }
    else {
        die ("ID Tidak ditemukan");    
    }
    
$query    =mysqli_query($conn, "SELECT * FROM data_barang WHERE id_barang='$id_barang'");
$result    =mysqli_fetch_array($query);

$query="Delete from data_barang WHERE id_barang = '$id_barang'";
$result = mysqli_query($conn, $query);

header("location: index.php?page=data_table");
?>
