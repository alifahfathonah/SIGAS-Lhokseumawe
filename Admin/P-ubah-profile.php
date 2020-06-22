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

              </form>
            </li>
          </ol>
          <div class="page-header">
            <h1>Ganti <small>Profile </small></h1>
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
            <i class="fa fa-external-link-square"></i>   <center>Form Ganti Profile
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
                        Nama Lengkap
                        <span class="symbol required"></span>
                      </label>
                      <div class="col-sm-9">
                        <input type="text" placeholder="Nama Lengkap" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']?>" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">
                        Email
                        <span class="symbol required"></span>
                      </label>
                      <div class="col-sm-9">
                        <input type="text" placeholder="Email" class="form-control" id="email" name="email" value="<?php echo $row['email']?>" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">
                      No HP
                        <span class="symbol required"></span>
                      </label>
                      <div class="col-sm-9">
                        <input type="text" placeholder="No HP" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']?>" required="required">
                      </div>
                    </div>
                  </div>

      <a href="p-dashboard.php" class="btn btn-yellow add-row">
        Kembali</a>
        <input type="submit" name="submit" value="Simpan" class="btn btn-green add-row">


      </div>
    </div>
  </form>

  <?php include 'head.php' ;
  require_once("connect.php");

  $nama=$_POST['nama'];
  $email =$_POST['email'];
  $no_hp =$_POST['no_hp'];

  if($_POST['submit']){
            $update 		= mysql_query("UPDATE admin SET nama='$nama',email='$email',no_hp='$no_hp' WHERE id='$id'");

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
