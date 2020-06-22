<!DOCTYPE html>
    <?php include 'action-session-start.php'?>
		<?php include 'action-validasi-nik-koordinat.php' ?>
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
                            <h1>Dasboard <small>Admin</small></h1>
                        </div>
                    </div>
                </div>

                <!-- end: PAGE HEADER -->
                <?php
                include 'connect.php';
                $id    		= $_SESSION['id_pemilik'];
                $data     = mysql_query("SELECT * from pemilik where id_pemilik='$id'");
                $row      = mysql_fetch_array($data);
                 ?>
                <!-- start: PAGE CONTENT -->
                <div align="center" class="alert alert-success">
                    <i class="clip-checkmark-circle-2"></i>
                    Hai <strong><?php echo $row['nama_pemilik']?></strong>, Selamat Datang Di SIG Pencarian Stok Tabung Gas LPG.
                </div>


                <div class="row">
                    <div class="col-sm-4">
                        <div class="core-box">
                            <div class="heading">
                                <i class="clip-list circle-icon circle-green"></i>
                                <h2>Update Stok</h2>
                            </div>
                            <div class="content" align="justify">
                                Untuk melakukan edit atau update stok kios LPG, Anda dapat memilih menu ini.
                            </div>
                            <a class="view-more" href="p-stok-lpg.php">
                                Pilih <i class="clip-arrow-right-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="core-box">
                            <div class="heading">
                                <i class="clip-add circle-icon circle-bricky"></i>
                                <h2>Edit Kios</h2>
                            </div>
                            <div class="content" align="justify">
                                Untuk melakukan edit atau update data kios, Anda dapat memilih menu ini.
                            </div>
                            <a class="view-more" href="p-kios.php">
                                Pilih <i class="clip-arrow-right-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="core-box">
                            <div class="heading">
                                <i class="clip-key-2 circle-icon circle-teal"></i>
                                <h2>Ganti Password</h2>
                            </div>
                            <div class="content" align="justify">
                                Untuk mengganti password akun Anda, Anda dapat memilih menu ini.
                            </div>
                            <a class="view-more" href="p-ubah-password.php">
                                Pilih <i class="clip-arrow-right-2"></i>
                            </a>
                        </div>
                    </div>
										<div class="col-sm-4">
												<div class="core-box">
														<div class="heading">
																<i class="clip-phone circle-icon circle-green"></i>
																<h2>Contact Person</h2>
														</div>
														<div class="content" align="justify">
																Untuk mengetahui pihak yang dapat dihubungi, Anda dapat memilih menu ini.
														</div>
														<a class="view-more" href="#">
																Pilih <i class="clip-arrow-right-2"></i>
														</a>
												</div>
										</div>
										<div class="col-sm-4">
												<div class="core-box">
														<div class="heading">
																<i class="clip-book circle-icon circle-bricky"></i>
																<h2>About</h2>
														</div>
														<div class="content" align="justify">
																Untuk lebih mengetahui informasi seputar sistem ini, Anda dapat memilih menu ini.
														</div>
														<a class="view-more" href="#">
																Pilih <i class="clip-arrow-right-2"></i>
														</a>
												</div>
										</div>
										<div class="col-sm-4">
												<div class="core-box">
														<div class="heading">
																<i class="clip-key-2 circle-icon circle-teal"></i>
																<h2>Syarat Dan Ketentuan</h2>
														</div>
														<div class="content" align="justify">
																Untuk mengetahui syarat dan ketentuan sistem, Anda dapat memilih menu ini.
														</div>
														<a class="view-more" href="#">
																Pilih <i class="clip-arrow-right-2"></i>
														</a>
												</div>
										</div>
								</div>
								<!-- end: PAGE CONTENT-->
								<!-- end: PAGE CONTENT-->
                </div>
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
