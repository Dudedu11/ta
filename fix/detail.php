<?php
    if(isset($_GET['id'])){
        $id    =$_GET['id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "connection.php";
    $query    =mysqli_query($conn, "SELECT data_barang.id_barang, data_barang.nama_barang, data_barang.tahun_pengadaan, data_barang.id_jenis, data_barang.id_merk, data_barang.id_kondisi,
    jenis.id_jenis, jenis.nama_jenis,
    merk.id_merk, merk.nama_merk,
    kondisi.id_kondisi, kondisi.nama_kondisi 
    FROM data_barang
    INNER JOIN jenis ON data_barang.id_jenis = jenis.id_jenis
    INNER JOIN merk ON data_barang.id_merk = merk.id_merk
    INNER JOIN kondisi ON data_barang.id_kondisi = kondisi.id_kondisi WHERE data_barang.id_barang='$id'");
    $result    =mysqli_fetch_array($query);
?>
<html>
<head>
    <title>Data Barang</title>
    
<!-- Mirrored from demo.dashboardpack.com/sales-html/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Apr 2022 06:32:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Inventory</title>
<link rel="icon" href="img/logo.png" type="image/png">

<link rel="stylesheet" href="css/bootstrap1.min.css" />

<link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />

<link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />

<link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />

<link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />

<link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
<link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />

<link rel="stylesheet" href="vendors/datepicker/date-picker.css" />
<link rel="stylesheet" href="vendors/vectormap-home/vectormap-2.0.2.css" />

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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="main_content_iner ">
<div class="container-fluid p-0">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Data Barang</h3>
</div>
</div>
</div>
<div class="white_card_body">
<div class="QA_section">
<div class="white_box_tittle list_header">
   
            

    <table  cellpadding="4" class="table "  style="margin-left:auto;margin-right:auto">
        <tr style="width:30%">
           <th  style="width:30%" scope="col" class="bg-success p-2 text-light bg-opacity-50">No</th>
            <td style="width:70%" size="1000" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['id_barang']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Nama Barang</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['nama_barang']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Merk Barang</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['nama_merk']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Jenis Barang</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['nama_jenis']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Tahun Pengadaan</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['tahun_pengadaan']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Kondisi Barang</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['nama_kondisi']?></td>
        </tr>
    </table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


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

<script src="vendors/datepicker/datepicker.js"></script>
<script src="vendors/datepicker/datepicker.en.js"></script>
<script src="vendors/datepicker/datepicker.custom.js"></script>
<script src="js/chart.min.js"></script>
<script src="vendors/chartjs/roundedBar.min.js"></script>

<script src="vendors/progressbar/jquery.barfiller.js"></script>

<script src="vendors/tagsinput/tagsinput.js"></script>

<script src="vendors/text_editor/summernote-bs4.js"></script>
<script src="vendors/am_chart/amcharts.js"></script>

<script src="vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="vendors/scroll/scrollable-custom.js"></script>

<script src="vendors/vectormap-home/vectormap-2.0.2.min.js"></script>
<script src="vendors/vectormap-home/vectormap-world-mill-en.js"></script>

<script src="vendors/apex_chart/apex-chart2.js"></script>
<script src="vendors/apex_chart/apex_dashboard.js"></script>
<script src="vendors/echart/echarts.min.js"></script>
<script src="vendors/chart_am/core.js"></script>
<script src="vendors/chart_am/charts.js"></script>
<script src="vendors/chart_am/animated.js"></script>
<script src="vendors/chart_am/kelly.js"></script>
<script src="vendors/chart_am/chart-custom.js"></script>

<script src="js/dashboard_init.js"></script>
<script src="js/custom.js"></script>

</body>
</html>