<!DOCTYPE html>

<?php include 'action-session-start.php' ?>
<?php include 'action-validasi-nik-koordinat.php' ?>
<?php include 'head.php' ?>
<?php error_reporting(0); ?>

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
              Stok
            </li>

          </ol>
          <div class="page-header">
            <h1>Update <small>Stok LPG </small></h1>
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
              <i class="fa fa-external-link-square"></i><center> Update Stok
                <!--ass="btn btn-xs btn-link panel-collapse collapses" href="#">
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
                $data     = mysql_query("SELECT * from kios where id_pemilik='$id'");
                $row      = mysql_fetch_array($data);

                 ?>

                <form method="post" class="form-horizontal">
                  <div class="row">

                    <div class="form-group">
                      <label class="col-sm-2 control-label">
                        Stok LPG
                        <span class="symbol required"></span>
                      </label>
                      <div class="col-sm-9">

                        <input type="number" placeholder="Stok LPG" class="form-control" id="jumlah_stok" name="jumlah_stok" value="<?php echo $row['jumlah_stok']?>" required="required">
                      </div>
                    </div>


      </div>


        <input type="submit" name="submit" value="Simpan" class="btn btn-green add-row">


      </div>
    </div>
  </form>


  <?php include 'head.php' ;
  require_once("connect.php");

  $jumlah_stok=$_POST['jumlah_stok'];

  if($_POST['submit']){
            $update 		= mysql_query("UPDATE kios SET jumlah_stok='$jumlah_stok' WHERE id_pemilik='$id'");

            echo "<script language='javascript'>
            setTimeout(function () {
              swal({
                title: 'Selamat!',
                text:  'Update Stok Sukses',
                type: 'success',
                timer: 3000,
                showConfirmButton: false
              });
            },10);

            window.setTimeout(function(){
              window.location.replace('p-stok-lpg.php');
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
<script>
    jQuery(document).ready(function() {
        Main.init();
        Index.init();
    });
</script>
</body>

</html>
