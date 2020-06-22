<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<?php include 'head.php' ?>

<body class="page-full-width">

<?php include 'header.php' ?>
<?php include 'container.php' ?>
<!-- start: MAIN CONTAINER -->
<div class="main-container">

<!-- start: PAGE -->
<div class="main-content">
    <div class="container">
        <!-- end: PAGE HEADER -->

        <!-- start: PAGE CONTENT -->
        <center>
          <div class="row">
            <div class="col-md-12">
                <!-- start: BASIC MAP PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> MAP
                    </div>

                    <div class="panel-body">
                      <div align="justify" class="alert alert-success">
                        <i class="clip-checkmark-circle-2"></i>
                        <strong>Langkah-langkah penggunaan aplikasi:</strong><br>

                        <strong>1.</strong> Tentukan posisi Anda saat ini dengan cara klik posisi anda pada peta.<br>

                        <strong>2.</strong> Tentukan kios LPG tujuan Anda.<br>

                        <strong>3.</strong> Untuk mendapatkan hasil rekomendasi rute terpendek, tekan tombol "Rute Terpendek". <br>
                      </div>
                    <!--<p><button class="btn btn-danger btn-md" onclick="getLocation()">Posisi Anda</button>-->
                        
                    </div>
                </div>

        <!-- end: BASIC MAP PANEL -->
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
