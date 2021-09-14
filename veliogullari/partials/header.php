<!-- Main Header Area Start -->
<div class="main-header ">
    <div class="container container-default custom-area">
        <div class="row"><?php try {
                $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
            }
            catch (PDOException $e) {
                print $e->getMessage();
            } ?>
            <div class="col-lg-12 col-custom">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                        <div class="header-logo d-flex align-items-center">
                            <a href="index">
                                <img class="img-full" src="assets/images/logo/logo.png" style="width: 230px;" alt="Velioğulları Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-7 position-static d-none d-lg-block col-custom">
                        <nav class="main-nav d-flex justify-content-center">
                            <ul class="nav">
                                <li>
                                    <a <?php if(basename($_SERVER['PHP_SELF']) == "index.php")
                                    {echo 'class="active"';} ?> href="index">
                                        <span class="menu-text"> Ana Sayfa</span>
                                    </a>
                                </li>
                                <li>
                                    <a <?php if(basename($_SERVER['PHP_SELF']) == "shop.php")
                                    {echo 'class="active"';} ?> href="shop">
                                        <span class="menu-text">Market</span>
                                    </a>
                                </li>
<!--                                <li> @todo kullanıcı menüsü altına eklenecek -->
<!--                                    <a href="#">-->
<!--                                        <span class="menu-text"> Pages</span>-->
<!--                                        <i class="fa fa-angle-down"></i>-->
<!--                                    </a>-->
<!--                                    <ul class="dropdown-submenu dropdown-hover">-->
<!--                                        <li><a href="frequently-questions.html">FAQ</a></li>-->
<!--                                        <li><a href="my-account.html">My Account</a></li>-->
<!--                                        <li><a href="login.html">Login</a></li>-->
<!--                                        <li><a href="register.html">Register</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
                                <li>
                                    <a href="about-us">
                                        <span class="menu-text"> Hakkımızda</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="contact-us">
                                        <span class="menu-text">İletişim</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-xl-3 col-sm-6 col-6 col-custom">
                        <div class="header-right-area main-nav">
                            <ul class="nav">
                                <?php
                                if (!isset($_SESSION['login'])){
                                ?>
                                <li class="login-register-wrap d-none d-xl-flex">
                                    <span><a href="login">Giriş Yap</a></span>
                                    <span><a href="register">Kayıt ol</a></span>
                                </li>
                                <?php }
                                else{?>
                                <li class="login-register-wrap d-none d-xl-flex">
                                    <span><a href="my-account.php">Hesabım</a></span>
                                    <span><a href="logout">Çıkış Yap</a></span>
                                </li>
                                <?php } ?>
                                <li class="minicart-wrap">
                                    <a href="#" class="minicart-btn toolbar-btn" onmouseover="getcart()">
                                        <i class="ion-bag"></i>
                                        <span class="cart-item_count" id="cartcount"><?php if (isset($_SESSION['cart'])){ print count($_SESSION['cart']);}else{print 0;}?></span>
                                    </a>
                                    <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2" id="cartt">
                                        <div class="cart-links d-flex justify-content-center">
                                            <a class="obrien-button white-btn" href="cart">Sepet</a>
                                            <a class="obrien-button white-btn" href="checkout.php">Ödeme</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mobile-menu-btn d-lg-none">
                                    <a class="off-canvas-btn" href="#">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Header Area End @todo sayfa yüklendiğinde 2 header gözükme problemini çöz -->
<!-- off-canvas menu start -->
<aside class="off-canvas-wrapper" id="mobileMenu">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
            <i class="fa fa-times"></i>
        </div>
        <div class="off-canvas-inner">

            <div class="search-box-offcanvas">
                <form action="shop.php" method="get">
                    <input type="text" id="search" name="search" placeholder="Ürünleri arayın..">
                    <button class="search-btn" type="submit" ><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!-- mobile menu start -->
            <div class="mobile-navigation">

                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><a href="index">Ana Sayfa</a>
                        </li>
                        <li class="menu-item-has-children"><a href="shop">Market</a>
                        </li>
                        <li><a href="about-us">Hakkımızda</a></li>
                        <li><a href="contact-us">İletişim</a></li>
                        <?php
                        if ($_SESSION['login']!=1){
                            ?>
                            <li class="menu-item-has-children">
                                <a href="login">Giriş Yap</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="register">Kayıt ol</a>
                            </li>
                        <?php }
                        else{?>
                            <li class="menu-item-has-children">
                                <a href="my-account.php">Hesabım</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="logout">Çıkış Yap</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
            <div class="header-top-settings offcanvas-curreny-lang-support">
                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu">

                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- offcanvas widget area start -->
            <div class="offcanvas-widget-area">
                <div class="top-info-wrap text-left text-black">
                    <ul>
                        <li>
                            <i class="fa fa-phone"></i>
                            <a href="tel: +90 507 259 44 32">+90 507 259 44 32</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:info@veliogullarimarket.com">info@veliogullarimarket.com</a>
                        </li>
                    </ul>
                </div>
                <div class="off-canvas-widget-social">
                    <a title="İnstagram" href="https://instagram.com/veliogullarimarket"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <!-- offcanvas widget area end -->
        </div>
    </div>
</aside>
<!-- off-canvas menu end -->