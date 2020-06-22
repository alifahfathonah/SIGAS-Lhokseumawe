<!DOCTYPE html>
    <?php include 'action-session-start.php'?>
    <?php include 'head.php' ?>
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="bower_components/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css" rel="stylesheet" />



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

                        </ol>
                        <div class="page-header">
                            <h1>LIST <small>Kios LPG</small></h1>
                        </div>
                    </div>
                </div>

                <!-- end: PAGE HEADER -->

                <!-- start: PAGE CONTENT -->
                <!-- start: PAGE CONTENT -->
                <div class="row">

                    <div class="col-md-12">
                        <!-- start: BASIC TABLE PANEL -->
                        <!--<a href="#" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Tambah"><i class="fa fa-edit"></i></a>-->

                      <a href="action-add-data-kios.php" class="btn btn-green">
                              Tambah <i class="fa fa-plus"></i>
                          </a>
                          <br>
                          <br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-external-link-square"></i><center>Informasi Kios
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

                                <div class="table-responsive">


                                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample-table-2">
                                        <thead>
                                          <tr>


                                              <th class="col-to-export center">No</th>
                                              <th class="col-to-export center">Nama Kios</th>
                                              <th class="col-to-export center">Alamat Kios</th>
                                              <th class="col-to-export center">Koordinat</th>

                                              <th class="col-to-export center">Stok LPG</th>
                                              <th class="col-to-export center">Pemilik</th>
                                              <th class="col-to-export center">NIK Pemilik</th>
                                              <th class="col-to-export center">No Hp</th>
                                            <!--  <th class="col-to-export center">Status</th>-->
                                              <th class="center">Aksi</th>

                                              <!--<th class="center">NIK Pemilik</th>-->

                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          include 'connect.php';

                                          $no = 1;
                                          $query= mysql_query('SELECT * FROM pemilik inner join kios where pemilik.id_pemilik=kios.id_pemilik');


                                          while ($row = mysql_fetch_array($query)){
                                            if((!empty($row['nik_pemilik'])) && ($row['status'] > 0)){
                                            ?>

                                          <tr>


                                              <td class="col-to-export center"><?php echo $no++;?></td>
                                              <td class="col-to-export center"><?php echo $row['nama_kios'];?></td>
                                              <td class="col-to-export center"><?php echo $row['alamat_kios'];?></td>
                                              <td class="col-to-export center"><?php echo $row['koordinat'];?></td>

                                              <td class="col-to-export center"><?php echo $row['jumlah_stok'];?></td>
                                              <td class="col-to-export center"><?php echo $row['nama_pemilik'];?></td>
                                              <td class="col-to-export center"><?php echo $row['nik_pemilik'];?></td>
                                              <td class="col-to-export center"><?php echo $row['no_hp'];?></td>


                                              <td class="center">
                                                      <a href="action-view-data-kios.php?id=<?php echo $row['id_pemilik'];?>" class="btn btn-xs btn-green tooltips" data-placement="top" data-original-title="View"><i class="clip-eye"></i></a>
                                                      <a href="action-edit-data-kios.php?id=<?php echo $row['id_pemilik'];?>" class="btn edit-link btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                      <a href="action-delete-data-kios.php?id=<?php echo $row['id_pemilik'];?>" class="btn delete-link btn-xs btn-bricky tooltips" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>

                                                      <div class="btn-group">

                                                          <ul role="menu" class="dropdown-menu pull-right">
                                                              <li role="presentation">
                                                                  <a role="menuitem" tabindex="-1" href="action-view-data-kios.php?id=<?php echo $row['id_pemilik'];?>">
                                                                      <i class="fa fa-folder"></i> View
                                                                  </a>
                                                              </li>
                                                              <li role="presentation">
                                                                  <a role="menuitem" tabindex="-1" href="action-edit-data-kios.php?id=<?php echo $row['id_pemilik'];?>">
                                                                      <i class="fa fa-edit"></i> Edit
                                                                  </a>
                                                              </li>
                                                              <li role="presentation">
                                                                  <a role="menuitem" tabindex="-1" href="action-delete-data-kios.php?id=<?php echo $row['id_pemilik'];?>">
                                                                      <i class="fa fa-times"></i> Remove
                                                                  </a>
                                                              </li>
                                                          </ul>
                                                      </div>
                                                      <script>
                                                        jQuery(document).ready(function($){
                                                            $('.delete-link').on('click',function(){
                                                                var getLink = $(this).attr('href');
                                                                swal({
                                                                        title: 'Warning',
                                                                        text: 'Anda Yakin Ingin Hapus Data?',
                                                                        html: true,
                                                                        confirmButtonColor: '#d9534f',
                                                                        showCancelButton: true,
                                                                        },function(){
                                                                        window.location.href = getLink
                                                                    });
                                                                return false;
                                                            });
                                                        });
                                                      </script>


                                                      <script>
                                                      jQuery(document).ready(function($){
                                                          $('.edit-link').on('click',function(){
                                                             var getLink = $(this).attr('href');
                                                              swal({
                                                                      title: ' Perhatian',
                                                                      text: 'Anda Yakin Untuk Mengedit Data?',
                                                                      html: true,

                                                                      showCancelButton: true,
                                                                      },function(){
                                                                      window.location.href = getLink
                                                                  });
                                                              return false;
                                                          });
                                                      });
                                                      </script>
                                              </td>



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
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

    <script>
        jQuery(document).ready(function() {
            Main.init();
            TableExport.init();
        });
    </script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

  </body>

</html>
