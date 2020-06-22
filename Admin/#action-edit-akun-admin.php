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
                                    Edit
                            </li>
                            <li class="search-box">
                                <form class="sidebar-search">
                                    <div class="form-group">
                                        <input type="text" placeholder="Start Searching...">
                                        <button class="submit">
                                            <i class="clip-search-3"></i>
                                        </button>
                                    </div>
                                </form>
                            </li>
                        </ol>
                        <div class="page-header">
                            <h1>Edit <small>Data Admin</small></h1>
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
                                <center><i class="fa fa-external-link-square"></i> Form Edit Data Admin
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
                              	$id = $_GET['id'];
                              	$data = mysql_query("SELECT * from admin where id='$id'");
                              	while($row = mysql_fetch_array($data)){
                              		?>
                                <form method="post" class="form-horizontal">
                                    <div class="row">

                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">
                                              Username
                                              <span class="symbol required"></span>
                                          </label>
                                          <div class="col-sm-9">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                          <input type="text" placeholder="Username" class="form-control" id="username" name="username" value="<?php echo $row['username'];?>" required="required" disabled="disabled">
                                      </div>
                                      </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Nama Admin
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Nama Admin" class="form-control" id="nama" name="nama" value="<?php echo $row['nama'];?>" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Email
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    No HP
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="No Hp" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp'];?>" required="required">
                                            </div>
                                            </div>



                                            <!--<div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Password
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Password" class="form-control" id="password" name="password" value="<?php echo $row['password'];?>" required="required">
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Konfirmasi Password
                                                    <span class="symbol required"></span>
                                                </label>
                                                <div class="col-sm-9">
                                                <input type="text" placeholder="Masukkan Ulang Password" class="form-control" id="re_password" name="re_password" required="required">
                                            </div>
                                          </div>-->


                                        </div>

                                        <a href="p-akun-admin.php" class="btn btn-yellow add-row">
                                              Kembali</a>
                                          <input type="submit" value="Simpan" class="btn btn-green add-row">


                                    </div>
                                  </div>
                                </form>
                              <?php } ?>
                                <?php include 'head.php' ;
                                require_once("connect.php");

                                $nama = $_POST['nama'];
                                $email=$_POST['email'];
                                $no_hp=$_POST['no_hp'];
                                $username=$_POST['username'];
                                $password =$_POST['password'];
                                $re_password =$_POST['re_password'];



                                    if(!empty($nama) && !empty($email) && !empty($no_hp)){

                                                    mysql_query("UPDATE admin set nama='$nama',email='$email', no_hp='$no_hp'
                                                                WHERE id='$id'");
                                                                //  header("location:login.php");
                                                    echo "<script language='javascript'>
                                                          setTimeout(function () {
                                                            swal({
                                                                title: 'Selamat!',
                                                                text:  'Edit Data Sukses',
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
