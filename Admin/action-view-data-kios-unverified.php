<!DOCTYPE html>
    <?php include 'head.php' ?>
    <link href="bower_components/jquery-colorbox/example2/colorbox.css" rel="stylesheet" />
    <?php error_reporting(0);?>

<body>
    <?php include 'header.php' ?>
    <?php include 'container.php' ?>


<!-- start: PAGE -->
<div class="main-content">
            <div class="container">
                <!-- start: PAGE HEADER -->
                <div class="row">
                    <div class="col-sm-12">

                        <!-- start: PAGE TITLE & BREADCRUMB -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="clip-screen"></i>
                                <a href="p-kios-lpg.php">
                                    Home
                                </a>
                            </li>
                            <li class="active">
                                    Kios
                            </li>
                            <li class="active">
                                    View
                            </li>

                        </ol>
                        <div class="page-header">
                            <h1>View <small>Data Kios</small></h1>
                        </div>
                    </div>
                </div>
                <!-- end: PAGE HEADER -->

                <!-- start: PAGE CONTENT -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- start: TEXT FIELDS PANEL -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <i class="fa fa-external-link-square"></i><center>View Informasi Kios LPG
                                <!--<div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                                    </a>
                                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a class="btn btn-xs btn-link panel-expand" href="#">
                                        <i class="fa fa-resize-full"></i>
                                    </a>
                                    <a class="btn btn-xs btn-link panel-close" href="#">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>-->
                            </div>
                            <div class="panel-body">
                              <?php
                              	include 'connect.php';
                              	$id = $_GET['id'];
                              	$data = mysql_query("SELECT * from pemilik inner join kios where pemilik.id_pemilik=kios.id_pemilik and pemilik.id_pemilik='$id'");
                              	while($row = mysql_fetch_array($data)){
                              		?>
                                <form method="post" class="form-horizontal">
                                    <div class="row">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Nama Kios

                                                </label>
                                                <div class="col-sm-9">
                                                  <input type="hidden" name="id" value="<?php echo $row['id_pemilik']; ?>">
                                                <input readonly type="text" placeholder="Username" class="form-control" id="username" name="username" value="<?php echo $row['username'];?>" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    NIK Pemilik
                                                </label>
                                                <div class="col-sm-9">
                                                <input readonly type="text" placeholder="NIK Pemilik" class="form-control" id="nik_pemilik" name="nik_pemilik" value="<?php echo $row['nik_pemilik'];?>" required="required">
                                            </div>
                                          </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Nama Pemilik
                                                </label>
                                                <div class="col-sm-9">
                                                <input readonly type="text" placeholder="Nama Pemilik" class="form-control" id="nama_pemilik" name="nama_pemilik" value="<?php echo $row['nama_pemilik'];?>" required="required">
                                            </div>
                                          </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Nama Kios

                                                </label>
                                                <div class="col-sm-9">
                                                <input readonly type="text" placeholder="Nama Kios" class="form-control" id="nama_kios" name="nama_kios" value="<?php echo $row['nama_kios'];?>" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Alamat Kios

                                                </label>
                                                <div class="col-sm-9">
                                                <input readonly type="text" placeholder="Alamat Kios" class="form-control" id="alamat_kios" name="alamat_kios" value="<?php echo $row['alamat_kios'];?>" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Koordinat Kios

                                                </label>
                                                <div class="col-sm-9">
                                                <input readonly type="text" placeholder="Koordinat Kios" class="form-control" id="koordinat" name="koordinat" value="<?php echo $row['koordinat'];?>" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    No HP

                                                </label>
                                                <div class="col-sm-9">
                                                <input readonly type="text" placeholder="No HP" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp'];?>" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Jumlah Stok LPG

                                                </label>
                                                <div class="col-sm-9">
                                                <input readonly type="number" placeholder="Jumlah Stok" class="form-control" id="jumlah_stok" value="<?php echo $row['jumlah_stok'];?>" name="jumlah_stok">
                                            </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Foto KTP
                                                </label>
                                                <div class="col-sm-9 col-md-3 col-sm-4 gallery-img">
                                                    <div class="wrap-image">
                                                        <a class="group1" href="<?php echo "../Kios/file/".$row['foto_ktp'];?>">
                                                            <img src="<?php echo "../Kios/file/".$row['foto_ktp'];?>" class="img-responsive">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Posisi Kios
                                                </label>
                                                <?php include "map-kios.php" ?>
                                                <div class="col-sm-9" id="map-kios" style="height:320px;"></div>

                                            </div>
                                            </div>










                                        </div>

                                        <a href="p-data-kios-lpg-unverified.php" class="btn btn-yellow add-row">
                                              Kembali</a>
                                        <a href="action-verifikasi-data-kios.php?id=<?php echo $row['id_pemilik'];?>" class="btn btn-blue add-row">
                                              Verifikasi Kios</a>
                                              <!--
                                          <input type="submit" name="submit" value="Simpan" class="btn btn-green add-row">
                                        -->

                                    </div>
                                  </div>
                                </form>
                              <?php } ?>
                            </div>
                        </div>




                </div>
                <!-- end: PAGE CONTENT-->
                <!-- end: PAGE CONTENT-->
            </div>
        </div>
        <!-- end: PAGE -->
    </div>
    <!-- end: MAIN CONTAINER -->

    <?php include 'footer.php' ?>
    <?php include 'main-javascript.php' ?>
    <script src="bower_components/jquery-colorbox/jquery.colorbox-min.js"></script>
    <script src="assets/js/min/pages-gallery.min.js"></script>
</body>

</html>
