
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
<!--    <form class="form-inline ml-3">-->
<!--        <div class="input-group input-group-sm">-->
<!--            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">-->
<!--            <div class="input-group-append">-->
<!--                <button class="btn btn-navbar" type="submit">-->
<!--                    <i class="fas fa-search"></i>-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
<!--        <li class="nav-item dropdown">-->
<!--            <a class="nav-link" data-toggle="dropdown" href="#">-->
<!--                <i class="far fa-bell"></i>-->
<!--                <span class="badge badge-warning navbar-badge">15</span>-->
<!--            </a>-->
<!--            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">-->
<!--                <span class="dropdown-item dropdown-header">15 Notifications</span>-->
<!--                <div class="dropdown-divider"></div>-->
<!--                <a href="#" class="dropdown-item">-->
<!--                    <i class="fas fa-envelope mr-2"></i> 4 new messages-->
<!--                    <span class="float-right text-muted text-sm">3 mins</span>-->
<!--                </a>-->
<!--                <div class="dropdown-divider"></div>-->
<!--                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>-->
<!--            </div>-->
<!--        </li>-->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">-->
<!--                <i class="fas fa-th-large"></i>-->
<!--            </a>-->
<!--        </li>-->
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="Velioğulları Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Antre Design Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    Hoşgeldin <b>PATRON</b>
                    <br>Kullanıcı adınız:<?php print $_SESSION['adminusername'];?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
<!--        <div class="form-inline">-->
<!--            <div class="input-group" data-widget="sidebar-search">-->
<!--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">-->
<!--                <div class="input-group-append">-->
<!--                    <button class="btn btn-sidebar">-->
<!--                        <i class="fas fa-search fa-fw"></i>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="index" class="nav-link <?php if ($filename=="Anasayfa")print "active";?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Anasayfa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if ($filename=="Slider" || $filename=="Portfolio" || $filename=="Project"|| $filename=="Blog"|| $filename=="Publication")print "active";?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            İçerik
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="portfolio" class="nav-link <?php if ($filename=="Portfolio")print "active";?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Portfolyo</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="blog" class="nav-link <?php if ($filename=="Blog")print "active";?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="assets/php/logout.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p>Çıkış Yap</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>