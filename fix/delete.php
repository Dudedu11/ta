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
?>

<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data ini.. ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<?php    
$query = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_barang='$id_barang'");
$result = mysqli_fetch_array($query);

$query="Delete from data_barang WHERE id_barang = '$id_barang'";
$result = mysqli_query($conn, $query);

header("location: index.php?page=data_table");
?>
