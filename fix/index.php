<!-- <?php
session_start();
if (!$_SESSION["is_login"] == TRUE) {
    header("location: login.php");
    exit;
}
?> -->
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Apr 2022 06:32:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Inventory</title>
    <link rel="icon" href="img/logo2.png" type="image/png">

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
</head>

<body class="crm_body_bg">


    <nav class="sidebar vertical-scroll dark_sidebar ps-container ps-theme-default ps-active-y">
        <div class="logo d-flex justify-content-between">
            <a href="index.php"><img src="img/logo.png" alt="" width="150" height="150"></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="mm-active">
                <a href="index.php?page=home" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="img/menu-icon/home.png" alt="">
                    </div>
                    <span>Home</span>
                </a>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="img/menu-icon/cells.png" alt="">
                    </div>
                    <span>Table</span>
                </a>
                <ul>
                    <li><a href="index.php?page=data_table">Table Satuan Barang</a></li>
                    <li><a href="index.php?page=laporan">Table Kelopok Barang</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="img/menu-icon/add.png" alt="">
                    </div>
                    <span>Input Data</span>
                </a>
                <ul>
                    <li><a href="index.php?page=input_barang">Input Barang</a></li>
                    <li><a href="index.php?page=input_merek">Input Merk</a></li>
                </ul>
            </li>
            <li class="mm-active">
                <a href="logout.php" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="img/menu-icon/logout.png" alt="">
                    </div>
                    <span>Log Out</span>
                </a>
            </li>
    </nav>

    <section class="main_content dashboard_part large_header_bg">

        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center border_bottom_1px">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area d-flex align-items-center">
                            <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
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
                                        <?php
                                        if(!empty($_SESSION['notif'])){
                                            foreach($_SESSION['notif'] as $key => $value){?>
                                            <div class="single_notify d-flex align-items-center">
                                                <table >
                                                <div class="notify_thumb">
                                                <td><h5>Kode Barang <?php $a=$value['id_barang']; echo $a; ?> berhasil ditambahkan         </h5> </td>
                                            </div>
                                            <div class="notify_content">
                                                <td>
                                            </div>
                                                <a  href="index.php?action=remove&id_barang=<?=$value['id_barang']?>"><button class="btn btn-danger btn-sm"><i>X</i></button></a></td> 
                                                </table>
                                            </div>
                                            <?php }
                                        }?>
                                        </div>
                                        <div class="nofity_footer">
                                            <div class="submit_button text-center pt_20">
                                                <a href="index.php?action=clear_all" class="btn_1">Clear All</a>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </div>
                            <div class="profile_info">
                                <img src="img/client_img.png" alt="#">
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <p>Administator </p>
                                        <h5>Zahra Maulida</h5>
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


        <?php
        if (isset($_GET['page']) || isset($_GET['cari']) || isset($_GET['tahun']) ) {
            if (isset($_GET['cari'] ) || isset($_GET['tahun'])) {
                include "data_table.php";
            } else if ($_GET['page'] == "home") {
                include "home.php";
            } else if ($_GET['page'] == "data_table") {
                include "data_table.php";
            } else if ($_GET['page'] == "input_barang") {
                include "input_barang.php";
            } else if ($_GET['page'] == "input_merek") {
                include "input_merek.php";
            } else if ($_GET['page'] == "home") {
                include "home.php";
            } else if ($_GET['page'] == "cek_status") {
                include "cek_status.php";
            } else if ($_GET['page'] == "input_data") {
                include "input_data.php";
            } else if ($_GET['page'] == "kondisi") {
                include "kondisi.php";
            } else if ($_GET['page'] == "laporan") {
                include "laporan.php";
            } else if ($_GET['page'] == "export") {
                include "export.php";
            } else if ($_GET['page'] == "update") {
                include "update.php";
            } else if ($_GET['page'] == "login") {
                include "login.php";
            } else {
                include "home.php";
            }
        } else {
            include "home.php";
        }

        if(!empty($_GET['action']) == "remove") {
            foreach($_SESSION['notif'] as $key => $value){
                if($value['id_barang'] == $_GET['id_barang']){
                  unset($_SESSION['notif'][$key]);
                }
              }
        } else if (!empty($_GET['action']) == "clear_all") {
                  unset($_SESSION['notif'][$key]);
        }else{
             
        }
        ?>

        <!-- <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-lg-12">
                        <div class="footer_iner text-center">
                        </div> -->
                    </div>
                </div>
            </div>
        </div> 
    </section>



    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
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

<!-- Mirrored from demo.dashboardpack.com/sales-html/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Apr 2022 06:32:57 GMT -->

</html>