 <!-- start: MAIN CONTAINER -->

    <div class="main-container">
        <div class="navbar-content">
            <!-- start: SIDEBAR -->
            <div class="main-navigation navbar-collapse collapse">
                <!-- start: MAIN MENU TOGGLER BUTTON -->
                <div class="navigation-toggler">
                    <i class="clip-chevron-left"></i>
                    <i class="clip-chevron-right"></i>
                </div>
                <!-- end: MAIN MENU TOGGLER BUTTON -->
                <!-- start: MAIN NAVIGATION MENU -->
                <ul class="main-navigation-menu">
                    <li>
                        <!--active open-->
                        <a href="p-dashboard.php">
                            <i class="clip-home-3"></i>
                            <span class="title"> Dashboard </span><span class="selected"></span>
                        </a>
                    </li>

                    <li>
                        <a href="p-data-kios-lpg-unverified.php">
                            <i class="clip-new"></i>
                            <span class="title"> Kios LPG Baru </span><span class="selected"></span>
                            <?php
                            include 'connect.php';
                            $query= mysql_query('SELECT * FROM pemilik');
                            $row=mysql_fetch_array($query);
                              if($row['status']== 0){
                              ?>
                          <span class="badge badge-new">new</span>
                              <?php } ?>
                              
                        </a>
                    </li>


                    <li>
                        <a href="p-data-kios-lpg.php">
                            <i class="clip-location"></i>
                            <span class="title">Kios LPG Terverifikasi </span><span class="selected"></span>
                        </a>
                    </li>
                    <!--<li>
                        <a href="p-akun-kios-lpg.php">
                            <i class="clip-users"></i>
                            <span class="title"> Akun Kios </span><span class="selected"></span>
                        </a>
                    </li>-->
                    <li>
                        <a href="p-akun-admin.php">
                            <i class="clip-user-5"></i>
                            <span class="title"> Akun Admin </span><span class="selected"></span>
                        </a>
                    </li>


                    <li>
                        <a href="#">
                            <i class="clip-info"></i>
                            <span class="title"> About </span><span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- end: MAIN NAVIGATION MENU -->
            </div>
            <!-- end: SIDEBAR -->
        </div>
