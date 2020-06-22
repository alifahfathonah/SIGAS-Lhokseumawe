<!DOCTYPE html>
<?php include 'action-session-start.php' ?>
<?php include 'action-validasi-nik-koordinat.php' ?>
    <?php include 'head.php' ?>
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

                        </ol>
                        <div class="page-header">
                            <h1>Data <small>Kios LPG</small></h1>
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



                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-external-link-square"></i>
                                <center>Informasi Kios
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
                                  $id    		= $_SESSION['id_pemilik'];
                                  $data     = mysql_query("SELECT * from pemilik inner join kios where pemilik.id_pemilik=kios.id_pemilik and pemilik.id_pemilik='$id'");
                                  $row      = mysql_fetch_array($data);
                                  ?>

                                  <form method="post" class="form-horizontal">
                                    <div class="row">
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          Nama Pemilik
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input disabled type="text" placeholder="Nama Pemilik" class="form-control" id="nama_pemilik" name="nama_pemilik" value="<?php echo $row['nama_pemilik']?>" required="required">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          NIK
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input disabled type="text" placeholder="NIK" class="form-control" id="nik_pemilik" name="nik_pemilik" value="<?php echo $row['nik_pemilik']?>" required="required">
                                        </div>
                                      </div>



                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          Nama Kios
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input type="text" placeholder="Nama Kios" class="form-control" id="nama_kios" name="nama_kios" value="<?php echo $row['nama_kios']?>" required="required">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          Koordinat
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input type="text" placeholder="Koordinat Kios" class="form-control" id="koordinat" name="koordinat" value="<?php echo $row['koordinat']?>" required="required">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          Alamat
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input type="text" placeholder="Alamat Kios" class="form-control" id="alamat_kios" name="alamat_kios" value="<?php echo $row['alamat_kios']?>" required="required">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          Nomor HP
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input type="text" placeholder="Nomor Hp" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']?>" required="required">
                                        </div>
                                      </div>


                        </div>


                          <input type="submit" name="submit" value="Simpan" class="btn btn-green add-row">


                        </div>
                      </div>
                    </form>

                    <?php include 'head.php' ;
                    require_once("connect.php");
                    $nama_kios = $_POST['nama_kios'];
                    $alamat_kios=$_POST['alamat_kios'];
                    $koordinat=$_POST['koordinat'];
                    $no_hp=$_POST['no_hp'];

                    if($_POST['submit']){
                              $update 		= mysql_query("UPDATE pemilik,kios SET no_hp='$no_hp', nama_kios='$nama_kios',alamat_kios='$alamat_kios',
                                koordinat='$koordinat' WHERE pemilik.id_pemilik=kios.id_pemilik and pemilik.id_pemilik='$id'");

                              echo "<script language='javascript'>
                              setTimeout(function () {
                                swal({
                                  title: 'Selamat!',
                                  text:  'Update Data Sukses',
                                  type: 'success',
                                  timer: 3000,
                                  showConfirmButton: false
                                });
                              },10);

                              window.setTimeout(function(){
                                window.location.replace('p-dashboard.php');
                              } ,3000);
                              </script>";

                    }
                    ?>

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
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Index.init();
        });
    </script>
</body>

</html>
