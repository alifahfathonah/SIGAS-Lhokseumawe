<!DOCTYPE html>

<?php include 'action-session-start.php'?>
<?php include 'head.php' ?>

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
              <i class="clip-home-3"></i>
              <a href="p-profile.php">
                Home
              </a>
            </li>
            <li class="active">
              Profile
            </li>

          </ol>
          <div class="page-header">
            <h1>Ganti <small>Password </small></h1>
          </div>
          <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
      </div>
      <!-- end: PAGE HEADER -->

      <!-- start: PAGE CONTENT -->
      <div class="row">
        <div class="col-sm-12">
          <!-- start: TEXT FIELDS PANEL -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-external-link-square"></i><center> Form Ganti Password
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
                $id    		= $_SESSION['id'];
                $data     = mysql_query("SELECT * from admin where id='$id'");
                $row      = mysql_fetch_array($data);

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
                        <input type="text" placeholder="Username" class="form-control" id="username" name="username" value="<?php echo $row['username']?>" required="required" disabled="disabled">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">
                        Password Lama
                        <span class="symbol required"></span>
                      </label>
                      <div class="col-sm-9">
                        <input type="password" placeholder="Password Lama" class="form-control" id="password_lama" name="password_lama" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">
                        Password Baru
                        <span class="symbol required"></span>
                      </label>
                      <div class="col-sm-9">
                        <input type="password" placeholder="Password Baru" class="form-control" id="password_baru" name="password_baru" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">
                        Konfirmasi Password Baru
                        <span class="symbol required"></span>
                      </label>
                      <div class="col-sm-9">
                        <input type="password" placeholder="Konfirmasi Password Baru" class="form-control" id="re_password_baru" name="re_password_baru" required="required">
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

      <a href="p-dashboard.php" class="btn btn-yellow add-row">
        Kembali</a>
        <input type="submit" name="submit" value="Simpan" class="btn btn-green add-row">


      </div>
    </div>
  </form>

  <?php include 'head.php' ;
  require_once("connect.php");

  $username=$_POST['username'];
  $password_lama=md5($_POST['password_lama']);
  $password_baru =md5($_POST['password_baru']);
  $re_password_baru =md5($_POST['re_password_baru']);

  $cekpassword 			= mysql_query("SELECT password FROM admin WHERE password='$password_lama'");


  if($_POST['submit']){
    if(mysql_num_rows($cekpassword) > 0){
          if($password_baru == $re_password_baru){
            $id      		= $_SESSION['id'];
            $update 		= mysql_query("UPDATE admin SET password='$password_baru' WHERE id='$id'");

            echo "<script language='javascript'>
            setTimeout(function () {
              swal({
                title: 'Selamat!',
                text:  'Ganti Password Sukses',
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
                title: 'Perhatian!',
                text:  'Gagal Ganti Password',
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
              title: 'Perhatian!',
              text:  'Gagal Ganti Password',
              type: 'error',
              timer: 3000,
              showConfirmButton: false
            });
          },10);

          </script>";
        }
  }
  ?>

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
