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
                                    Akun Admin
                            </li>
                            <li class="active">
                                    Tambah
                            </li>

                        </ol>
                        <div class="page-header">
                            <h1>Tambah <small>Data Admin</small></h1>
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
                                <i class="fa fa-external-link-square"></i> <center>Form Penambahan Data Admin
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
                                                    Nama Admin
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Nama Admin" class="form-control" id="nama" name="nama" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Email
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Email" class="form-control" id="email" name="email" required="required">
                                            </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    No HP
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="No Hp" class="form-control" id="no_hp" name="no_hp" required="required">
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
                                        <a href="p-akun-admin.php" class="btn btn-yellow add-row">
                                              Kembali</a>
                                        <input type="submit" name='submit' value="Tambah" class="btn btn-blue add-row"></td>
                                    </div>
                                  </div>
                                </form>
                                <?php include 'head.php' ;
                                require_once("connect.php");

                                $nama = $_POST['nama'];
                                $email=$_POST['email'];
                                $no_hp=$_POST['no_hp'];
                                $username=$_POST['username'];
                                $password =md5($_POST['password']);
                                $re_password =md5($_POST['re_password']);



                                $cekuser = mysql_query("SELECT * FROM admin WHERE username = '$username'");

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
                                else {
                                  if($password == $re_password){
                                          mysql_query("INSERT INTO admin(nama, email, no_hp, username, password)
                                                      VALUES('$nama', '$email', '$no_hp', '$username','$password')");
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
                                            window.location.replace('p-akun-admin.php');
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
