
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
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
        <img src="dist/img/AdminLTELogo.png" alt="Velio??ullar?? Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Velio??ullar?? Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php print $_SESSION['adminimage'];?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php print $_SESSION['adminusername'];?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

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
                    <a href="#" class="nav-link <?php if ($filename=="Slider" || $filename=="Hakk??m??zda" || $filename=="??leti??im")print "active";?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            ????erik
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="slider" class="nav-link <?php if ($filename=="Slider")print "active";?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="about" class="nav-link <?php if ($filename=="Hakk??m??zda")print "active";?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hakk??m??zda</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="contact" class="nav-link <?php if ($filename=="??leti??im")print "active";?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>??leti??im</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if ($filename=="??r??n D??zenleme"||$filename=="??r??n Ekleme"||$filename=="??r??nler")print "active";?>">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            ??r??nler
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="addproduct" class="nav-link <?php if ($filename=="??r??n Ekleme")print "active";?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>??r??n Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="products" class="nav-link <?php if ($filename=="??r??nler" || $filename=="??r??n D??zenleme")print "active";?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>??r??nler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="categories" class="nav-link <?php if ($filename=="Kategori/Markalar")print "active";?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori/Markalar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Sipari??ler
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="orders?status=all" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>T??m Sipari??ler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="orders?status=completed" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tamamlanan Sipari??ler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="orders?status=onhold" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bekleyen Sipari??ler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="orders?status=cancel" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hatal?? Sipari??ler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            ??yeler
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="users" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>T??m Kullan??c??lar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="zones" class="nav-link <?php if ($filename=="zones")print "active";?>">
                        <i class="nav-icon far fa-circle text-orange"></i>
                        <p>Hizmet B??lgeleri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>??leti??im</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="assets/php/logout.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p>????k???? Yap</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>