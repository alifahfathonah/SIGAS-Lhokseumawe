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

        <!-- start: PAGE HEADER -->
        <!--
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-home-3"></i>
                        <a href="home.php">
                            Home
                        </a>
                    </li>
                  </ol>
            </div>
        </div>-->
        <!-- end: PAGE HEADER -->

        <!-- start: PAGE CONTENT -->
        <center>
          <div class="row">
            <div class="col-md-12">
                <!-- start: BASIC MAP PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> Tentang SIGAS
                    </div>

                    <div class="panel-body">
                        <div id="timeline" class="demo1">
                            <div class="timeline">
                                <div class="spine"></div>
                                <div class="date_separator">
                                    <span>Apa Itu SIGAS?</span>
                                </div>
                                <ul class="columns">
                                    <li>
                                        <div class="timeline_element teal">
                                            <div class="timeline_title">

                                            </div>
                                            <div class="content">
                                            SIGAS merupakan singkatan dari Sistem Informasi Geografis Pencarian Stok Tabung Gas LPG di Kota Lhokseumawe.
                                            </div>
                                            <div class="readmore">

                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline_element green">
                                            <div class="timeline_title">

                                            </div>
                                            <div class="content">
                                            Aplikasi ini sangat berguna untuk membantu masyarakat dalam menemukan kios LPG yang sedang memiliki ketersediaan stok LPG.
                                            </div>
                                            <div class="readmore">

                                            </div>
                                        </div>
                                    </li>



                                    <li>
                                        <div class="timeline_element bricky">
                                            <div class="timeline_title">

                                            </div>
                                            <div class="content">
                                            Aplikasi ini juga menyajikan informasi kios penjual LPG dalam bentuk tabel, sehingga data akan tersusun lebih terstruktur.
                                            </div>
                                            <div class="readmore">

                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <div class="date_separator">
                                    <span>Latar Belakang</span>
                                </div>
                                <ul class="columns">
                                    <li>
                                        <div class="timeline_element purple">
                                            <div class="timeline_title">
                                            </div>
                                            <div class="content">
                                                Awal mula diciptakannya aplikasi SIGAS adalah dilatarbelakangi
                                                oleh kelangkaan stok tabung gas LPG di Lhokseumawe, Aceh.
                                            </div>
                                            <div class="readmore">

                                            </div>
                                        </div>
                                    </li>



                                    <li>
                                        <div class="timeline_element teal">
                                            <div class="timeline_title">
                                            </div>
                                            <div class="content">
                                                Kelangkaan ini disebabkan karena meningkatnya kebutuhan terhadap pemakaian tabung gas LPG,
                                                maka banyak terjadi krisis atau kelangkaan tabung gas LPG di sejumlah daerah.
                                            </div>
                                            <div class="readmore">

                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="timeline_element green">
                                            <div class="timeline_title">
                                            </div>
                                            <div class="content">
                                                Dengan keadaan seperti ini, tentu akan memaksa masyarakat untuk
                                                mencari atau menemukan kios penyedia stok tabung gas LPG yang sedang memiliki ketersediaan stok.
                                            </div>
                                            <div class="readmore">

                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="timeline_element bricky">
                                            <div class="timeline_title">
                                            </div>
                                            <div class="content">
                                            Namun, untuk mencari kios tersebut tentu akan memakan banyak waktu dan tenaga apabila dilakukan secara manual.
                                            </div>
                                            <div class="readmore">

                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <div class="date_separator">
                                    <span>Developed By</span>
                                </div>
                                <ul class="columns">
                                    <li>
                                        <div class="timeline_element purple">
                                            <div class="timeline_title">
                                            </div>
                                            <div class="content">
                                                Aplikasi ini diciptakan oleh seorang mahasiswa Politeknik Negeri Lhokseumawe Jurusan TIK Prodi Teknik Informatika bernama Rico Alfianda.
                                            </div>
                                            <div class="readmore">

                                            </div>
                                        </div>
                                    </li>


                                    <!--
                                    <li>
                                        <div class="timeline_element teal">
                                            <div class="timeline_title">
                                            </div>
                                            <div class="content">
                                              <div class="col-sm-9 col-md-3 col-sm-4 gallery-img">
                                                  <div class="wrap-image">

                                                          <img src="<?php echo "profile.jpg";?>" class="img-responsive">

                                                  </div>
                                              </div>
                                            </div>
                                            <div class="readmore">

                                            </div>
                                        </div>
                                    </li>
                                  -->


                                </ul>
                            </div>
                        </div>
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
