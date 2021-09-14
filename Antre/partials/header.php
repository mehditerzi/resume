<header class="atail-header" style="backdrop-filter: blur(3px);box-shadow: 0 5px 15px rgba(0,0,0,.5);">
    <div class=" container-fluid ">
        <div class="logo  atail-logo-portrait" style="left: 20px;">
            <a href="index.php">
                    <span class="atail-text-logo">
                        <img src="img/antre.png" alt="">
                    </span>
            </a>
        </div>
        <div class="show-nav">
                <span data-action="show-nav">
                    <span>
                        <span></span>
                        <span></span>
                    </span>
                </span>
        </div>
        <nav class="row" style="height: 70px;">
            <div class="grid-bg row" style="height: 70px;">
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
            </div>
            <ol id="menu-menu-1" class="nav-list" style="height: 70px!important;">
                <li class="menu-item <?php if ($filename == "index")print "current-menu-item";?> col-xs-2 ">
                    <a href="index.php"><span>Portfolyo</span></a>
                </li>
                <li class="menu-item col-xs-2 <?php if ($filename == "about")print "current-menu-item";?> ">
                    <a href="about.php" ><span>Hakkımızda</span></a>
                </li>
                <li class="menu-item col-xs-2 <?php if ($filename == "services")print "current-menu-item";?> ">
                    <a href="services.php"><span>Çalışma Alanlarım</span></a>
                </li>
                <li class="menu-item col-xs-2 <?php if ($filename == "contact")print "current-menu-item";?> ">
                    <a href="contact.php"><span>İletişim</span></a>
                </li>
                <li class="menu-item col-xs-2 <?php if ($filename == "blog")print "current-menu-item";?> ">
                    <a href="blog.php"><span>Blog</span></a>
                </li>
            </ol>
        </nav>
    </div>
</header>
