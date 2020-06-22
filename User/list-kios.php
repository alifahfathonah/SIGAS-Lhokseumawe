<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<?php include 'head.php' ?>
<link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
<link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="bower_components/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<link href="bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css" rel="stylesheet" />

<body class="page-full-width">

<?php include 'header.php' ?>
<?php include 'container.php' ?>
<!-- start: MAIN CONTAINER -->
<div class="main-container">

<!-- start: PAGE -->
<div class="main-content">
    <div class="container">
        <!-- start: PAGE HEADER -->
        <!--
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-home-3"></i>
                        <a href="home.php">
                            Home
                        </a>
                    </li>
                    <li class="active">
                        List Kios
                    </li>
                </ol>
            </div>
        </div>-->
        <!-- end: PAGE HEADER -->

        <!-- start: PAGE CONTENT -->

        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i><center> Informasi Kios
                      <!--  <div class="panel-tools">
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
                      <div align="justify" class="alert alert-success">
                        <i class="fa fa-exclamation-triangle"></i>
                        <strong>Perhatian!</strong><br>

                        <strong>1.</strong> Anda dapat melihat informasi setiap kios LPG yang telah terdaftar pada halaman ini.<br>

                        <strong>2.</strong> Anda dapat mengekspor atau mendownload informasi kios dibawah.<br>

                        </div>
                        <div class="table-responsive">



                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample-table-2">
                                <thead>
                                  <tr>

                                      <th class="col-to-export center alert alert-info">Nama Kios</th>
                                      <th class="col-to-export center alert alert-info">Alamat Kios</th>
                                      <th class="col-to-export center alert alert-info">No Hp</th>
                                      <th class="col-to-export center alert alert-info">Stok LPG</th>
                                      <th class="col-to-export center alert alert-info">Status Stok</th>
                                      <th class="col-to-export center alert alert-info">Status Kios</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  include 'connect.php';

                                  $no = 1;
                                  $query= mysql_query('SELECT * FROM pemilik inner join kios where pemilik.id_pemilik=kios.id_pemilik');
                                  while ($row = mysql_fetch_array($query)){
                                    if(!empty($row['nik_pemilik'])){

                                  ?>

                                  <tr>

                                      <td class="col-to-export center"><?php echo $row['nama_kios'];?></td>
                                      <td class="col-to-export center"><?php echo $row['alamat_kios'];?></td>


                                      <td class="col-to-export center"><?php echo $row['no_hp'];?></td>
                                      <td class="col-to-export center"><?php echo $row['jumlah_stok'];?></td>

                                      <?php
                                      if($row['jumlah_stok'] == 0){
                                        echo "<td class='center'><span class='label label-sm label-danger'>Stok Habis</span></td>";
                                      }
                                      else if($row['jumlah_stok'] <= 10){
                                        echo "<td class='center'><span class='label label-sm label-warning'>Stok Hampir Habis</span></td>";
                                      }
                                      else{
                                        echo "<td class='center'><span class='label label-sm label-success'>Stok Tersedia</span></td>";
                                      }
                                      ?>
                                      <td class="col-to-export center"><?php echo "<i class='clip-checkmark-circle-2'></i>Verified";?></td>

                                  </tr>
                                  <?php } ?>
                                <?php } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- end: BASIC TABLE PANEL -->
            </div>
        </div>

        </div>
        <!-- end: PAGE CONTENT-->
    </div>
</div>
<!-- end: PAGE -->
</div>

<!-- end: MAIN CONTAINER -->
    <?php include 'footer.php' ?>
    <?php include 'main-javascript.php' ?>
    <script src="bower_components/bootbox.js/bootbox.js"></script>
    <script src="bower_components/jquery-mockjax/dist/jquery.mockjax.min.js"></script>
    <script src="bower_components/select2/dist/js/select2.min.js"></script>
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="bower_components/jszip/dist/jszip.min.js"></script>
    <script src="bower_components/pdfmake/build/pdfmake.min.js"></script>
    <script src="bower_components/pdfmake/build/vfs_fonts.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/js/min/table-export.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            TableExport.init();
        });
    </script>


</body>

</html>
