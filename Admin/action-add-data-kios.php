<!DOCTYPE html>
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
                            <li class="active">
                                    Add
                            </li>

                        </ol>
                        <div class="page-header">
                            <h1>Tambah <small>Data Kios</small></h1>
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
                                <i class="fa fa-external-link-square"></i><center>Form Penambahan Data Kios LPG
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
                                <form method="post" class="form-horizontal">
                                    <div class="row">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Nama Kios

                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Nama Kios" class="form-control" id="nama_kios" name="nama_kios" >
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Alamat Kios

                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Alamat Kios" class="form-control" id="alamat_kios" name="alamat_kios" >
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Koordinat Kios

                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Koordinat Kios" class="form-control" id="koordinat" name="koordinat" >
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Nama Pemilik

                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Nama Pemilik" class="form-control" id="nama_pemilik" name="nama_pemilik" >
                                            </div>
                                            </div>

                                          <!--
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    NIK Pemilik

                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="NIK Pemilik" class="form-control" id="nik_pemilik" name="nik_pemilik" >
                                            </div>
                                            </div>
                                          -->

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    No HP

                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="No Hp" class="form-control" id="no_hp" name="no_hp" >
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Jumlah Stok LPG

                                                </label>
                                                <div class="col-sm-9">
                                                <input type="number" placeholder="Jumlah Stok" class="form-control" id="jumlah_stok" name="jumlah_stok">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Username
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Username" class="form-control" id="username" name="username" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Password
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="password" placeholder="Password" class="form-control" id="password" name="password" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Konfirmasi Password
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="password" placeholder="Masukkan Ulang Password" class="form-control" id="re_password" name="re_password" required="required">
                                            </div>
                                            </div>


                                        </div>
                                        <a href="p-data-kios-lpg.php" class="btn btn-yellow add-row">
                                              Kembali</a>
                                        <input type="submit" name="submit" value="Tambah" class="btn btn-blue btn-add-row"></td>
                                    </div>
                                  </div>
                                </form>
                                <?php include 'head.php' ;
                                require_once("connect.php");

                                $nama_kios = $_POST['nama_kios'];
                                $alamat_kios=$_POST['alamat_kios'];
                                $koordinat=$_POST['koordinat'];
                                $nama_pemilik=$_POST['nama_pemilik'];
                                $nik_pemilik=$_POST['nik_pemilik'];
                                $no_hp=$_POST['no_hp'];
                                $jumlah_stok=$_POST['jumlah_stok'];
                                $username=$_POST['username'];
                                $password =md5($_POST['password']);
                                $re_password =md5($_POST['re_password']);



                                $cekuser = mysql_query("SELECT * FROM pemilik WHERE username = '$username'");
                                $nik = mysql_query("SELECT * FROM pemilik WHERE nik_pemilik='$nik_pemilik'");

                                if(isset($_POST['submit'])){
                                  if(mysql_num_rows($cekuser) > 0) {
                                          echo "<script type='text/javascript'>
                                           setTimeout(function () {
                                           swal({
                                                      title: 'Perhatian!',
                                                      text:  'Username sudah terdaftar',
                                                      type: 'warning',
                                                      timer: 3000,
                                                      showConfirmButton: false
                                                  });
                                           },10);

                                          </script>";
                                  }
                                  else if(mysql_num_rows($nik) > 0) {
                                          echo "<script type='text/javascript'>
                                           setTimeout(function () {
                                           swal({
                                                      title: 'Perhatian!',
                                                      text:  'NIK sudah terdaftar',
                                                      type: 'warning',
                                                      timer: 3000,
                                                      showConfirmButton: false
                                                  });
                                           },10);

                                          </script>";
                                  }
                                  else {
                                    if($password == $re_password){
                                      //Ada NIK
//                                      $sql=mysql_query("INSERT INTO pemilik(username, password, nik_pemilik,nama_pemilik, no_hp)
//                                              VALUES('$username', '$password','$nik_pemilik','$nama_pemilik','$no_hp')");


                                      $sql=mysql_query("INSERT INTO pemilik(username, password, nama_pemilik, no_hp)
                                                  VALUES('$username', '$password','$nama_pemilik','$no_hp')");


                                      $hasil = mysql_query("SELECT max(id_pemilik) as last_id from pemilik limit 1");

                                      $row = mysql_fetch_array($hasil);

                                      $lastId = $row['last_id'];

                                      //$sql2=mysql_query("INSERT INTO kios(id, nama_kios, alamat_kios, koordinat, jumlah_stok)
                                          //  VALUES('$lastId','$nama_kios','$alamat_kios','$koordinat','$jumlah_stok')");

                                      $sql2=mysql_query("INSERT INTO kios(id_pemilik, nama_kios, alamat_kios, koordinat, jumlah_stok)
                                                        VALUES('$lastId','$nama_kios','$alamat_kios','$koordinat','$jumlah_stok')");
                                                      //  header("location:login.php");
                                      echo "<script language='javascript'>
                                            setTimeout(function () {
                                            swal({
                                                title: 'Selamat!',
                                                text:  'Tambah Data Sukses',
                                                type: 'success',
                                                timer: 3000,
                                                showConfirmButton: false
                                            });
                                            },10);

                                          window.setTimeout(function(){
                                          window.location.replace('p-data-kios-lpg.php');
                                          } ,3000);
                                          </script>";
                                    }
                                    else{
                                      echo "<script type='text/javascript'>
                                            setTimeout(function () {
                                              swal({
                                                  title: 'Perhatian!',
                                                  text:  'Konfirmasi Ulang Password Anda!',
                                                  type: 'error',
                                                  timer: 3000,
                                                  showConfirmButton: false
                                              });
                                            },10);
                                            </script>";
                                    }
                                }
                              }

                                ?>

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
</body>

</html>
