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
    
$query    =mysqli_query($conn, "SELECT * FROM data_barang WHERE id_barang='$id_barang'");
$result    =mysqli_fetch_array($query);

?>

<?php
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $jenis = $_POST['id_jenis'];
    $merek = $_POST['id_merek'];
    $tahun = $_POST['tahun'];
    $kondisi = $_POST['kondisi'];
    
    $query="UPDATE data_barang set nama_barang='$nama', tahun_pengadaan='$tahun', id_merk='$merek',id_jenis='$jenis',kondisi='$kondisi' where id_barang='$id_barang'";
			$result = mysqli_query($conn, $query);
			if($result){
				header("location: index.php?page=data_table");
				
			}else{
				echo "Update Gagal";
			}
}
?>

<!DOCTYPE html>
<html lang="zxx">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<title>Input Data Barang</title>

<link rel="icon" href="img/logo2.png" type="image/png">

<link rel="stylesheet" href="css/bootstrap1.min.css" />

<link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />

<link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />

<link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />

<link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />

<link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
<link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />

<link rel="stylesheet" href="vendors/datepicker/date-picker.css" />

<link rel="stylesheet" href="vendors/scroll/scrollable.css" />

<link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
<link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />

<link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />

<link rel="stylesheet" href="vendors/morris/morris.css">

<link rel="stylesheet" href="vendors/material_icon/material-icons.css" />

<link rel="stylesheet" href="css/metisMenu.css">

<link rel="stylesheet" href="css/style1.css" />
<link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="crm_body_bg">
<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
        <div class="logo d-flex justify-content-between">
        <a href="index.html"><img src="img/polban.png" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
        <i class="ti-close"></i>
        </div>
        </div>
        <ul id="sidebar_menu">
        <li class="mm-active">
        <a href="index.html" aria-expanded="false">    
        <div class="icon_menu">
        <img src="img/menu-icon/dashboard.svg" alt="">
        </div>
        <span>Dashboard</span>
        </a>
        </li>
        <li class="">
        <a href="data_table.php" aria-expanded="false">
        <div class="icon_menu">
        <img src="img/menu-icon/13.svg" alt="">
        </div>
        <span>Table</span>
        </a>
        </li>
        <li class="">
        <a href="input_data.php" aria-expanded="false">
        <div class="icon_menu">
        <img src="img/menu-icon/11.svg" alt="">
        </div>
        <span>Input Data</span>
        </a>
        </li>

        <li class="">
        <a class="has-arrow" href="#" aria-expanded="false">
        <div class="icon_menu">
        <img src="img/menu-icon/16.svg" alt="">
        </div>
        <span>Pages</span>
        </a>
        <ul>
        <li><a href="login.html">Login</a></li>
        <li><a href="resister.html">Register</a></li>
        <li><a href="error_400.html">Error 404</a></li>
        <li><a href="error_500.html">Error 500</a></li>
        <li><a href="forgot_pass.html">Forgot Password</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        </ul>
        </li>
        </ul>
        </nav>
    
<section class="main_content dashboard_part large_header_bg">

<div class="container-fluid g-0">
<div class="row">
<div class="col-lg-12 p-0 ">
<div class="header_iner d-flex justify-content-between align-items-center">
<div class="sidebar_icon d-lg-none">
<i class="ti-menu"></i>
</div>
<div class="serach_field-area d-flex align-items-center">
</div>
<div class="header_right d-flex justify-content-between align-items-center">
<div class="header_notification_warp d-flex align-items-center">
<li>
<a class="bell_notification_clicker nav-link-notify" href="#"> <img src="img/icon/bell.svg" alt="">
</a>

<div class="Menu_NOtification_Wrap">
<div class="notification_Header">
<h4>Notifications</h4>
</div>
<div class="Notification_body">

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="#"><img src="img/staf/2.png" alt=""></a>
</div>
<div class="notify_content">
<a href="#"><h5>Cool Marketing </h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="#"><img src="img/staf/4.png" alt=""></a>
</div>
<div class="notify_content">
<a href="#"><h5>Awesome packages</h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="#"><img src="img/staf/3.png" alt=""></a>
</div>
<div class="notify_content">
<a href="#"><h5>what a packages</h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="#"><img src="img/staf/2.png" alt=""></a>
</div>
<div class="notify_content">
<a href="#"><h5>Cool Marketing </h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="#"><img src="img/staf/4.png" alt=""></a>
</div>
<div class="notify_content">
 <a href="#"><h5>Awesome packages</h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>

<div class="single_notify d-flex align-items-center">
<div class="notify_thumb">
<a href="#"><img src="img/staf/3.png" alt=""></a>
</div>
<div class="notify_content">
<a href="#"><h5>what a packages</h5></a>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>
</div>
<div class="nofity_footer">
<div class="submit_button text-center pt_20">
<a href="#" class="btn_1">See More</a>
</div>
</div>
</div>

</li>
<li>
<a class="CHATBOX_open nav-link-notify" href="#"> <img src="img/icon/msg.svg" alt=""> </a>
</li>
</div>
<div class="profile_info">
<img src="img/client_img.png" alt="#">
<div class="profile_info_iner">
<div class="profile_author_name">
<p>Neurologist </p>
<h5>Dr. Robar Smith</h5>
</div>
<div class="profile_info_details">
<a href="#">My Profile </a>
<a href="#">Settings</a>
<a href="logout.php">Log Out </a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="main_content_iner ">
<div class="container-fluid p-0 sm_padding_15px">
<div class="white_card card_height_100 mb_30">
</div>
</div>
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h2 class="m-0">Input Data</h2>
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
<input type="type" name="nama" class="form-control" id="inputNamaBarang" placeholder="ex. Eigon Office Desk">
</div>
</div>

<div class="mb-3 row">
<label class="form-label col-sm-2 col-form-label">Jenis</label>
<div class="col-sm-8">
<select name="id_jenis" id="inputJenis" class="form-control" required>
<option value=""> -- Pilih Jenis -- </option>
<?php 
$query1="select * from jenis";
$tampil=mysqli_query($conn, $query1) or die(mysqli_error());
while($data=mysqli_fetch_array($tampil)) {
?><option value="<?php echo $data['id_jenis'];?>"><?php echo $data['nama_jenis'];?></option>
<?php } ?>
</select>
</div>
</div>

<div class="mb-3 row">
<label class="form-label col-sm-2 col-form-label">Merek</label>
<div class="col-sm-8">
<select name="id_merek" id="inputMerek" class="form-control" required>
<option value=""> -- Pilih Merek -- </option>
<?php 
$query1="select * from merk";
$tampil=mysqli_query($conn, $query1) or die(mysqli_error());
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


<script src="js/jquery1-3.4.1.min.js"></script>

<script src="js/popper1.min.js"></script>

<script src="js/bootstrap.min.html"></script>

<script src="js/metisMenu.js"></script>

<script src="vendors/count_up/jquery.waypoints.min.js"></script>

<script src="vendors/chartlist/Chart.min.js"></script>

<script src="vendors/count_up/jquery.counterup.min.js"></script>

<script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatable/js/buttons.flash.min.js"></script>
<script src="vendors/datatable/js/jszip.min.js"></script>
<script src="vendors/datatable/js/pdfmake.min.js"></script>
<script src="vendors/datatable/js/vfs_fonts.js"></script>
<script src="vendors/datatable/js/buttons.html5.min.js"></script>
<script src="vendors/datatable/js/buttons.print.min.js"></script>
<script src="js/chart.min.js"></script>

<script src="vendors/progressbar/jquery.barfiller.js"></script>

<script src="vendors/tagsinput/tagsinput.js"></script>

<script src="vendors/text_editor/summernote-bs4.js"></script>
<script src="vendors/am_chart/amcharts.js"></script>

<script src="vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="vendors/scroll/scrollable-custom.js"></script>
<script src="vendors/chart_am/core.js"></script>
<script src="vendors/chart_am/charts.js"></script>
<script src="vendors/chart_am/animated.js"></script>
<script src="vendors/chart_am/kelly.js"></script>
<script src="vendors/chart_am/chart-custom.js"></script>

<script src="js/custom.js"></script>

</body>
</html>