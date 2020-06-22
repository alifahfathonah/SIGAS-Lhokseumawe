<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
<!--<![endif]-->

<?php include 'head.php';
error_reporting(0); ?>

<body class="login example1">

    <div class="main-login col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="logo">
            SIGAS <i class="clip-map"></i>
        </div>
        <!-- start: LOGIN BOX -->
        <div class="box-login">
            <h3>Silahkan Log In</h3>
            <p>
                Masukkan Username dan Password.
            </p>
            <form class="form-login" method="post">
                <fieldset>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="required">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                        <button type="submit" value="login" class="btn btn-bricky pull-right">
                            Login <i class="fa fa-arrow-circle-right"></i>
                        </button>
                        <a href="../User/home.php" class="btn btn-light-grey go-back">
                            <i class="fa fa-circle-arrow-left"></i> Kembali
                        </a>
                        <div class="new-account">
                            Belum Punya Akun?
                            <a href="p-register.php" class="register">
                                Daftar Disini
                            </a>
                        </div>

                </fieldset>
            </form>
        </div>

        <?php include 'connect.php';

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //$password=sha1(sha1(sha1(sha1(sha1($_POST['password'])))));

        //$hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

        $login = mysql_query("SELECT * FROM pemilik WHERE username='$username' AND password='$password'");
        $cek = mysql_num_rows($login);
        $row_akun=mysql_fetch_array($login);


        if(!empty($username) && !empty($password)){
            if(($cek > 0) && ($row_akun['status'] > 0)){
            	session_start();
              $_SESSION['id_pemilik'] = $row_akun['id_pemilik'];
              $_SESSION['nama_pemilik'] = $row_akun['nama_pemilik'];
              $_SESSION['nik_pemilik'] = $row_akun['nik_pemilik'];
              $_SESSION['no_hp'] = $row_akun['no_hp'];
              $_SESSION['username'] = $row_akun['username'];
              $_SESSION['password'] = $row_akun['password'];
              $_SESSION['status'] = "login";

              echo '<script language="javascript">
                    window.location="p-dashboard.php";
                   </script>';

          //  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=p-dashboard.php">';

            //header("location:p-dashboard.php");

            }else{
              echo "<script type='text/javascript'>
               setTimeout(function () {
               swal({
                          title: 'Perhatian!',
                          text:  'Username atau Password salah  ',
                          type: 'error',
                          timer: 3000,
                          showConfirmButton: false
                      });
               },10);

              </script>";

            }
        }
        ?>
<!-- end: LOGIN BOX -->

        <!-- start: COPYRIGHT -->
        <div class="copyright">
            <script>
                document.write(new Date().getFullYear())
            </script> &copy; SIGAS by Rico Alfianda
        </div>
        <!-- end: COPYRIGHT -->
    </div>

    <!-- start: MAIN JAVASCRIPTS -->

    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
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
