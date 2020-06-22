<!DOCTYPE html>
<?php include 'action-session-start.php' ?>
    <?php include 'head.php' ?>
    <link href="bower_components/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" />
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
                            <h1>Verifikasi <small>Kios LPG</small></h1>
                        </div>
                    </div>
                </div>
                <!-- end: PAGE HEADER -->

                <!-- start: PAGE CONTENT -->
                <!-- start: PAGE CONTENT -->


                    <div class="col-md-12">
                      <div class="row">

                        <div align="center" class="alert alert-warning">
                            <button data-dismiss="alert" class="close">
                                &times;
                            </button>
                            <i class="fa fa-exclamation-triangle"></i>
                            <strong>Perhatian!</strong> Untuk Dapat Menggunakan Mengelola Data Kios Anda, Mohon Lengkapi Data Anda Terlebih Dahulu.
                        </div>

                        <!-- start: BASIC TABLE PANEL -->
                        <!--<a href="#" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Tambah"><i class="fa fa-edit"></i></a>-->



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
                              <?php
                              include 'connect.php';
                              $id    		= $_SESSION['id_pemilik'];
                              $data     = mysql_query("SELECT * from pemilik inner join kios where pemilik.id_pemilik=kios.id_pemilik and pemilik.id_pemilik='$id'");
                              $row      = mysql_fetch_array($data);
                              ?>

                                  <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row">


                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          Nama Pemilik
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input type="text" placeholder="Nama Lengkap" class="form-control" id="nama_pemilik" name="nama_pemilik" value="<?php echo $row['nama_pemilik']?>" required="required">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          NIK
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input type="text" placeholder="NIK KTP" class="form-control" id="nik_pemilik" name="nik_pemilik" value="<?php echo $row['nik_pemilik']?>" required="required">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          Nama Kios
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input type="text" placeholder="Nama Kios LPG" class="form-control" id="nama_kios" name="nama_kios" value="<?php echo $row['nama_kios']?>" required="required">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          Alamat Kios
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">
                                          <input type="text" placeholder="Alamat Kios" class="form-control" id="alamat_kios" name="alamat_kios" value="<?php echo $row['alamat_kios']?>" required="required">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          No Hp
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input type="text" placeholder="Nomor HP" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']?>" required="required">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          Koordinat
                                          <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-9">

                                          <input type="text" placeholder="Koordinat Kios" class="form-control" id="koordinat" name="koordinat" value="<?php echo $row['koordinat']?>" required="required">
                                          <button onclick="getLocation()">Cek</button>
                                          <div class="alert alert-info">
                                              <button data-dismiss="alert" class="close">
                                                  &times;
                                              </button>
                                              <i class="fa fa-info-circle"></i>
                                              Untuk Mendapatkan Koordinat Kios LPG Anda, Anda Dapat Menekan Tombol <strong>Cek</strong>.
                                              Dengan Syarat Anda Harus Sedang Berada Di Lokasi Kios LPG Anda.
                                          </div>

                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                          Foto KTP
                                          <span class="symbol required"></span>
                                        </label>
                                          <div class="col-sm-9">

                                              <input id="input-preview" type="file" name="file" class="file" required="required">
                                              <div class="alert alert-info">
                                                  <button data-dismiss="alert" class="close">
                                                      &times;
                                                  </button>
                                                  <i class="fa fa-info-circle"></i>
                                                  NIK dan Foto KTP Harus Sesuai dan Valid.
                                              </div>
                                          </div>
                                      </div>

<!--
                                      <input type="file" name="file">
-->
                        </div>

                        <div class="alert alert-success">
                            <button data-dismiss="alert" class="close">
                                &times;
                            </button>
                            <i class="fa fa-info-circle"></i>
                            Sebelum anda menekan tombol <strong>Simpan</strong>, diingatkan kembali untuk mengisi data yang sebenar-benarnya.
                            Karena setelah data berhasil tersimpan, <strong>Nama Lengkap, NIK,</strong> dan <strong>Foto KTP tidak akan dapat diganti</strong>.
                        </div>
                          <input type="submit" name="submit" value="Simpan" class="btn btn-green add-row">


                        </div>
                      </div>
                    </form>

                    <?php include 'head.php' ;
                    require_once("connect.php");
                    //Untuk Menambil Isian Form
                    $nama_kios=$_POST['nama_kios'];
                    $alamat_kios=$_POST['alamat_kios'];
                    $nama_pemilik=$_POST['nama_pemilik'];
                    $nik_pemilik = $_POST['nik_pemilik'];
                    $no_hp=$_POST['no_hp'];
                    $koordinat=$_POST['koordinat'];

                    $ekstensi_diperbolehkan	= array('png','jpg');
              			$nama = $_FILES['file']['name'];
              			$x = explode('.', $nama);
              			$ekstensi = strtolower(end($x));
              			$ukuran	= $_FILES['file']['size'];
              			$file_tmp = $_FILES['file']['tmp_name'];

                    //Untuk Memanggil Data Berdasarkan Session
                    $id    		= $_SESSION['id_pemilik'];
                    //$data     = mysql_query("SELECT * from pemilik inner join kios on kios.id=pemilik.id where pemilik.id='$id'");
                    //$row      = mysql_fetch_array($data);

                    //Untuk Cek NIK di DB
                    $nik = mysql_query("SELECT * FROM pemilik WHERE nik_pemilik='$nik_pemilik'");
                    $cek = mysql_num_rows($nik);

                    if($_POST['submit']){
                      if($cek>0){
                        echo "<script language='javascript'>
                        setTimeout(function () {
                          swal({
                            title: 'Perhatian!',
                            text:  'NIK Sudah Terdaftar',
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                          });
                        },10);
                        </script>";
                      }
                      else {
                        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                          if($ukuran < 1044070){
                            $time = time();
                            move_uploaded_file($file_tmp, 'file/'.$time.'-'.$nama);
                            $update 		= mysql_query("UPDATE pemilik, kios SET nik_pemilik='$nik_pemilik',nama_pemilik='$nama_pemilik',
                                          no_hp='$no_hp',foto_ktp='$time-$nama',nama_kios='$nama_kios',alamat_kios='$alamat_kios', koordinat='$koordinat'
                                          WHERE kios.id_pemilik=pemilik.id_pemilik and pemilik.id_pemilik='$id'");
                            if($update){
                              echo "<script language='javascript'>
                              setTimeout(function () {
                                swal({
                                  title: 'Selamat!',
                                  text:  'Data Sudah Lengkap',
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
                            else{
                              echo "<script language='javascript'>
                              setTimeout(function () {
                                swal({
                                  title: 'Warning!',
                                  text:  'Gagal Menyimpan Data',
                                  type: 'error',
                                  timer: 3000,
                                  showConfirmButton: false
                                });
                              },10);
                              </script>";
                          }
                      }
                      else{
                        echo "<script language='javascript'>
                        setTimeout(function () {
                          swal({
                            title: 'Warning!',
                            text:  'Ukuran Gambar Terlalu Besar',
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                          });
                        },10);
                        </script>";
                  }
                }
                else{
                  echo "<script language='javascript'>
                  setTimeout(function () {
                    swal({
                      title: 'Warning!',
                      text:  'Ekstensi File Tidak di Perbolehkan',
                      type: 'error',
                      timer: 3000,
                      showConfirmButton: false
                    });
                  },10);
                  </script>";
          			}
              }
            }


                    else{?>
                      <script>
                      var view = document.getElementById("koordinat");
                      function getLocation() {
                          if (navigator.geolocation) {
                              navigator.geolocation.getCurrentPosition(showPosition);
                          } else {
                              view.value = "Yah browsernya ngga support Geolocation bro!";
                          }
                      }
                       function showPosition(position) {
                          view.value = "" + position.coords.latitude +
                          ", " + position.coords.longitude;
                       }
                      </script>
                    <?php
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
    <script src="bower_components/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
    <script src="bower_components/bootstrap-fileinput/js/fileinput.min.js"></script>
</body>

</html>
