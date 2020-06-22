<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<?php include 'head.php' ?>

<body class="page-full-width">

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
                        <i class="clip-home-3"></i>
                        <a href="home.php">
                            Home
                        </a>
                    </li>
                    <li class="active">
                        List Kios
                    </li>

                </ol>
                <!--<div class="page-header">
                    <h1>Dashboard <small>overview &amp; stats </small></h1>
                </div>-->
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->

        <!-- start: PAGE CONTENT -->

        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> Responsive Table
                        <div class="panel-tools">
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
                        </div>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                          <?php include 'connect.php';

                          $query= mysql_query('SELECT * FROM pemilik inner join kios where pemilik.id=kios.id');
                          $no = 1; ?>

                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                <thead>
                                  <tr>
                                      <th class="center">No</th>
                                      <th class="center">Nama Kios</th>
                                      <th class="center">Alamat Kios</th>
                                      <th class="center">No Hp</th>
                                      <th class="center">Stok LPG</th>
                                      <th class="center">Status</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                while ($row = mysql_fetch_array($query)){
                                  ?>

                                  <tr>
                                      <td class="center"><?php echo $no++;?></td>
                                      <td class="center"><?php echo $row['nama_kios'];?></td>
                                      <td class="center"><?php echo $row['alamat_kios'];?></td>


                                      <td class="center"><?php echo $row['no_hp'];?></td>
                                      <td class="center"><?php echo $row['jumlah_stok'];?></td>

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

                                  </tr>

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

</body>

</html>
