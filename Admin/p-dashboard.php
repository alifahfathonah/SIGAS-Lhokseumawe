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
                $id    		= $_SESSION['id'];
                $data     = mysql_query("SELECT * from admin where id='$id'");
                $row      = mysql_fetch_array($data);
                 ?>
                <!-- start: PAGE CONTENT -->
                <div align="center" class="alert alert-success">
                    <i class="clip-checkmark-circle-2"></i>
                    Hai <strong><?php echo $row['nama']?></strong>, Selamat Datang Di SIG Pencarian Stok Tabung Gas LPG.
                </div>


                <div class="row">
                    <div class="col-sm-4">
                        <div class="core-box">
                            <div class="heading">
                                <i class="clip-list circle-icon circle-green"></i>
                                <h2>Lihat Kios</h2>
                            </div>
                            <div class="content" align="justify">
                                Untuk melihat data kios yang telah mendaftar, Anda dapat memilih menu ini.
                            </div>
                            <a class="view-more" href="p-data-kios-lpg.php">
                                Pilih <i class="clip-arrow-right-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="core-box">
                            <div class="heading">
                                <i class="clip-add circle-icon circle-green"></i>
                                <h2>Tambah Kios</h2>
                            </div>
                            <div class="content">
                                Untuk menambah atau mendaftarkan akun kios baru, Anda dapat memilih menu ini.
                            </div>
                            <a class="view-more" href="action-add-data-kios.php">
                                Pilih <i class="clip-arrow-right-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="core-box">
                            <div class="heading">
                                <i class="clip-user circle-icon circle-bricky"></i>
                                <h2>Data Admin</h2>
                            </div>
                            <div class="content">
                                Untuk melihat informasi mengenai admin sistem, Anda dapat memilih menu ini.
                            </div>
                            <a class="view-more" href="p-akun-admin.php">
                                Pilih <i class="clip-arrow-right-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="core-box">
                            <div class="heading">
                                <i class="clip-user-plus circle-icon circle-bricky"></i>
                                <h2>Tambah Admin</h2>
                            </div>
                            <div class="content" align="justify">
                                Untuk menambahkan atau mendaftarkan akun admin, Anda dapat memilih menu ini.
                            </div>
                            <a class="view-more" href="action-add-akun-admin.php">
                                Pilih <i class="clip-arrow-right-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="core-box">
                            <div class="heading">
                                <i class="clip-file circle-icon circle-teal"></i>
                                <h2>Edit Profile</h2>
                            </div>
                            <div class="content" align="justify">
                                Untuk mengedit profile akun Anda, Anda dapat memilih menu ini.
                            </div>
                            <a class="view-more" href="p-ubah-profile.php">
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
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Index.init();
        });
    </script>
</body>

</html>
