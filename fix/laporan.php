<?php

include 'connection.php';

$sql = "SELECT data_barang.id_barang, data_barang.location_asset,data_barang.nama_barang, data_barang.tahun_pengadaan, data_barang.jenis, data_barang.id_merk, data_barang.kondisi,
       merk.id_merk, merk.nama_merk, sum(IF(data_barang.kondisi='Baik',1,0)) as baik,
       sum(IF(data_barang.kondisi='Rusak',1,0)) as rusak,
       sum(IF(data_barang.kondisi='Rusak Berat',1,0)) as rusak_berat , count(*) as total                                  
       FROM data_barang
       INNER JOIN merk ON data_barang.id_merk = merk.id_merk 
       group by data_barang.nama_barang, data_barang.tahun_pengadaan order by data_barang.nama_barang asc ;";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="zxx">


<div class="row mx-auto">
    <div class="row">
    </div>
</div>
</div>



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

                            <form method="get" action="index.php?page=kondisi">
            <div class="col-lg-4">
                <select name="kondisi" id="inputMerek" class="form-control" required>
                    <option value="-"> -- Pilih Kondisi -- </option>
                    <option value="all">All</option>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                    <option value="rusak_berat">Rusak Berat</option>
                </select>
            </div>
            <div class="col-lg-3">
                <br>
                <input class="btn btn-primary" type="submit" name="page" value="kondisi">
            </div>
        </form>

        

                            <div class="QA_table mb_30">











                                <table class="table table-striped" >
                                    <br>
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Merk Barang</th>
                                            <th scope="col">Jenis Barang</th>
                                            <th scope="col" >Tahun</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Baik</th>
                                            <th scope="col">Rusak</th>
                                            <th scope="col">Rusak Berat</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset($_GET['cari'])) {
                                            $cari = $_GET['cari'];
                                            $data = mysqli_query($conn, "SELECT
                data_barang.id_barang, data_barang.nama_barang,
                data_barang.tahun_pengadaan, data_barang.jenis,data_barang.location_asset,
                data_barang.id_merk, data_barang.kondisi,
                merk.id_merk, merk.nama_merk
                FROM data_barang
                INNER JOIN merk ON data_barang.id_merk = merk.id_merk
                WHERE nama_barang LIKE '%" . $cari . "%'
                ORDER BY data_barang.nama_barang ASC");
                                        } else {
                                            $data = $result;
                                        }

                                        $no = 1;
                                        while ($row = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row['nama_barang'] ?></td>
                                                <td><?php echo $row['nama_merk'] ?></td>
                                                <td><?php echo $row['jenis'] ?></td>
                                                <td ><?php echo $row['tahun_pengadaan'] ?></td>
                                                <td><?php echo $row['location_asset'] ?></td>
                                                <td><?php echo $row['baik'] ?></td>
                                                <td><?php echo $row['rusak'] ?></td>
                                                <td><?php echo $row['rusak_berat'] ?></td>
                                                <td><?php echo $row['total'] ?></td>
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
                                <span style="white-space: pre-line">
                                <div class="create_report_btn">
            <a href="export.php" class="btn_1 mt-1 mb-1">Export PDF</a>
        </div>
        </span>
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


</section>




<!-- Mirrored from demo.dashboardpack.com/sales-html/data_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Apr 2022 06:33:36 GMT -->

</html>