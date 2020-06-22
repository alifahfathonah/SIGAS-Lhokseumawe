<?php
session_start();
?><!-- start: HEADER -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <!-- start: TOP NAVIGATION CONTAINER -->
        <div class="container">
            <div class="navbar-header">
                <!-- start: RESPONSIVE MENU TOGGLER -->
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
                <!-- end: RESPONSIVE MENU TOGGLER -->
                <!-- start: LOGO -->
                <a class="navbar-brand" href="p-dashboard.php">
                SIGAS <i class="clip-map"></i>
            </a>
                <!-- end: LOGO -->
            </div>
            <div class="navbar-tools">
                <!-- start: TOP NAVIGATION MENU -->
                <ul class="nav navbar-right">
                    <!-- start: TO-DO DROPDOWN -->


                    <li class="dropdown current-user">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                            <img src="assets/images/2.jpg" class="circle-img" alt="">
                            <span class="username"><?php echo $_SESSION['username']?></span>
                            <i class="clip-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="p-ubah-password.php">
                              <i class="clip-user-2"></i> &nbsp;Ubah Password
                            </a>
                          </li>
                          <li>
                            <a href="action-logout.php">
                              <i class="clip-exit"></i> &nbsp;Log Out
                            </a>
                          </li>
                        </ul>
                        </li>
                        <!-- end: USER DROPDOWN -->

                </ul>
                <!-- end: TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- end: TOP NAVIGATION CONTAINER -->
    </div>
    <!-- end: HEADER -->
