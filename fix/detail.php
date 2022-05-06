

<?php
    if(isset($_GET['no'])){
        $no    =$_GET['no'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "koneksi.php";
    $query    =mysqli_query($conn, "SELECT * FROM data_barang WHERE no='$no'");
    $result    =mysqli_fetch_array($query);
?>
<html>
<head>
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="main_content_iner ">
<div class="container-fluid p-0">
<div class="row justify-content-center">
<div class="col-lg-12">
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
            <td style="width:70%" size="1000" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['no']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Nama Barang</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['nama_barang']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Merk Barang</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['merk_barang']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Jenis Barang</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['jenis_barang']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Jumlah Barang</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['jumlah_barang']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Tahun Pengadaan</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['tahun_pengadaan']?></td>
        </tr>
        <tr>
            <th style="width:30%" scope="col"  class="bg-success p-2 text-light bg-opacity-50">Kondisi Barang</th>
            <td style="width:70%" class="bg-success p-2 text-dark bg-opacity-25">: <?php echo $result['kondisi_barang']?></td>
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


</body>
</html>