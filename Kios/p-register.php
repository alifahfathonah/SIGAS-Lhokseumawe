<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
<!--<![endif]-->

<?php include 'head.php';
error_reporting(0);?>
<body class="login example1">

    <div class="main-login col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="logo">
            SIGAS <i class="clip-map"></i>
        </div>
      <!-- start: LOGIN BOX -->
        <div class="box-login">
            <h3>Registrasi Kios LPG</h3>
            <p>
                Lengkapi Form Di Bawah Ini!
            </p>

            <form class="form-register" method="post">
                <fieldset>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="required">
                            <i class="fa clip-user"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                            <i class="fa 	clip-locked"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Konfirmasi Password" required="required">
                            <i class="fa 	clip-locked"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <div>
                            Dengan ini Anda dinyatakan Setuju dengan segala Ketentuan Layanan dan Kebijakan Privasi
                        </div>
                    </div>
                    <div class="form-actions">
                        <a href="p-login.php" class="btn btn-light-grey go-back">
                            <i class="fa fa-circle-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-bricky pull-right" name="submit">
                            Daftar <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>

        <?php include 'head.php' ;
        require_once("connect.php");


        $username=$_POST['username'];
        $password =md5($_POST['password']);
        $re_password =md5($_POST['re_password']);

        $cekuser = mysql_query("SELECT * FROM pemilik WHERE username = '$username'");


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

            if(!empty($username) && !empty($password) && !empty($re_password)){
                    if($password == $re_password){
                                  $sql=mysql_query("INSERT INTO pemilik(username, password)
                                            VALUES('$username', '$password')");

                                  $hasil = mysql_query("SELECT max(id_pemilik) as last_id
                                            from pemilik limit 1");

                                  $row = mysql_fetch_array($hasil);

                                  $lastId = $row['last_id'];

                                  mysql_query("INSERT INTO kios(id_pemilik)
                                             VALUES('$lastId')");


                                        //  header("location:login.php");
                            echo "<script language='javascript'>
                                  setTimeout(function () {
                                    swal({
                                        title: 'Selamat!',
                                        text:  'Registrasi Sukses',
                                        type: 'success',
                                        timer: 3000,
                                        showConfirmButton: false
                                    });
                                  },10);

                            window.setTimeout(function(){
                              window.location.replace('p-login.php');
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


        <!-- start: COPYRIGHT -->
        <div class="copyright">
            <script>
                document.write(new Date().getFullYear())
            </script> &copy; Rico Alfianda
        </div>
        <!-- end: COPYRIGHT -->
    </div>

    <!-- start: MAIN JAVASCRIPTS -->
    <!--[if lt IE 9]>
            <script src="bower_components/respond/dest/respond.min.js"></script>
            <script src="bower_components/Flot/excanvas.min.js"></script>
            <script src="bower_components/jquery-1.x/dist/jquery.min.js"></script>
            <![endif]-->
    <!--[if gte IE 9]><!-->
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <!--<![endif]-->
    <script type="text/javascript" src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="bower_components/blockUI/jquery.blockUI.js"></script>
    <script type="text/javascript" src="bower_components/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="bower_components/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js"></script>
    <script type="text/javascript" src="bower_components/jquery.cookie/jquery.cookie.js"></script>
    <script type="text/javascript" src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/js/min/main.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!--<script src="bower_components/jquery-validation/dist/jquery.validate.min.js"></script>-->
    <script src="assets/js/min/login.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

    <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });
    </script>

</body>

</html>
