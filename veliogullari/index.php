<!doctype html>
<?php session_start(); ?>

<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Velioğulları Market</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <style>
        .slick-slide {
            display: none;
            float: left;
            height: 300px!important;
            min-height: 1px;
        }
        .product-content {
            background-color: #efedee;
            padding: 0 30px 20px;
            height: 120px!important;
        }
        .title-2 {
            font-size: 14px!important;
        }
        .arrow-style .slick-arrow {
            background-color: #0030ff!important;
            opacity: 70%!important;
        }
    </style>
    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->

    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>

    <div class="home-wrapper home-3">
        <!-- Header Area Start Here -->
        <header class="main-header-area">
    <?php require "partials/header.php";?>
        </header>
        <!-- Header Area End Here -->
        <!-- Begin Slider Area One -->
        <div class="slider-area">
            <div class="obrien-slider arrow-style" data-slick-options='{
        "slidesToShow": 1,
        "slidesToScroll": 1,
        "infinite": true,
        "arrows": true,
        "dots": true,
        "autoplay" : true,
        "fade" : true,
        "autoplaySpeed" : 7000,
        "pauseOnHover" : false,
        "pauseOnFocus" : false
        }' data-slick-responsive='[
        {"breakpoint":992, "settings": {
        "slidesToShow": 1,
        "arrows": false,
        "dots": true
        }}
        ]'>
                <?php
                if(isset($_GET['testing'])){
                    ?>
                    <div class="slide-item bg-position slide-bg-2 animation-style-01" style="background-image: url('<?php print $_GET['image']?>')">
                        <div class="slider-content">
                            <h4 class="slider-small-title"><?php print $_GET['title'];?></h4>
                            <h2 class="slider-large-title"><?php print $_GET['text'];?></h2>
                            <div class="slider-btn">
                                <a class="obrien-button black-btn" href="shop.php"><?php print $_GET['button'];?></a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php
                try {
                    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
                }
                catch (PDOException $e) {
                print $e->getMessage();
                }
                $query = $db->prepare("SELECT * FROM sliders");
                    $query->execute();
                    if ( $query->rowCount() ){
                        foreach( $query as $row ){
                ?>
                <div class="slide-item slide-4 bg-position slide-bg-2 animation-style-01" style="background-image: url('<?php print $row['image']?>')">
                    <div class="slider-content">
                        <h4 class="slider-small-title"><?php print $row['title'];?></h4>
                        <h2 class="slider-large-title"><?php print $row['title'];?></h2>
                        <?php if ($row['button_text']==""){ ?>
                        <div class="slider-btn">
                            <a class="obrien-button black-btn" href="<?php print $row['button_link'];?>"><?php print $row['button_text'];?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>

        <?php
        }
                        }
        ?>
            </div>
        </div>
        <!-- Slider Area One End Here -->
        <!-- Product Area Start Here -->
        <div class="product-area mt-text mb-no-text">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 col-custom m-auto text-center">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">İNDİRİM</h2>
                            <div class="desc-content">
                                <p>En çok satan tüm ürünler artık sizin için mevcut ve bu ürünü istediğiniz zaman buradan satın alabilirsiniz.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product-wrapper col-lg-12 col-custom">
                        <div class="product-slider arrow-style" data-slick-options='{
                    "slidesToShow": 6,
                    "slidesToScroll": 1,
                    "infinite": true,
                    "arrows": true,
                    "dots": false
                    }' data-slick-responsive='[
                    {"breakpoint": 1200, "settings": {
                    "slidesToShow": 2
                    }}
                    ]'>
                            <?php
                            $query = $db->query("SELECT * FROM products ORDER BY RAND() LIMIT 10");
                            $query->execute();
                            foreach ($query as $row){
                                ?>
                                <div class="single-item">
                                    <div class="single-product position-relative">
                                        <div class="product-image">
                                            <a class="d-block" href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat">
                                                <img src="<?php print $row['image'];?>" alt="" class="product-image-1 w-100">
                                                <img src="<?php print $row['image'];?>" alt="" class="product-image-2 position-absolute w-100">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"> <a style="margin-top: 10px;" href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat"><?php print $row['name']?></a></h4>
                                            </div>
                                            <div class="price-box">
                                                <?php
                                                if ($row['hassale'] == 1){?>
                                                    <span class="regular-price "><?php print $row['saleprice'];?>₺</span>
                                                    <span class="old-price"><del><?php print $row['price'];?>₺</del></span>
                                                    <?php
                                                }
                                                else{?>
                                                    <span class="regular-price "><?php print $row['price'];?>₺</span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="add-action d-flex position-absolute">
                                            <a href="cart.php" title="Add To cart">
                                                <i class="ion-bag"></i>
                                            </a>
                                            <a href="wishlist.php" title="Add To Wishlist">
                                                <i class="ion-ios-heart-outline"></i>
                                            </a>
                                            <a href="#quickview" data-toggle="modal" title="Quick View">
                                                <i class="ion-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product-wrapper col-lg-12 col-custom">
                        <div class="product-slider arrow-style" data-slick-options='{
                    "slidesToShow": 6,
                    "slidesToScroll": 1,
                    "infinite": true,
                    "arrows": true,
                    "dots": false
                    }' data-slick-responsive='[
                    {"breakpoint": 1200, "settings": {
                    "slidesToShow": 2
                    }}
                    ]'>
                            <?php
                            $query = $db->query("SELECT * FROM products ORDER BY RAND() LIMIT 10");
                            $query->execute();
                            foreach ($query as $row){
                                ?>
                                <div class="single-item">
                                    <div class="single-product position-relative">
                                        <div class="product-image">
                                            <a class="d-block" href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat">
                                                <img src="<?php print $row['image'];?>" alt="" class="product-image-1 w-100">
                                                <img src="<?php print $row['image'];?>" alt="" class="product-image-2 position-absolute w-100">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"> <a style="margin-top: 10px;" href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat"><?php print $row['name']?></a></h4>
                                            </div>
                                            <div class="price-box">
                                                <?php
                                                if ($row['hassale'] == 1){?>
                                                    <span class="regular-price "><?php print $row['saleprice'];?>₺</span>
                                                    <span class="old-price"><del><?php print $row['price'];?>₺</del></span>
                                                    <?php
                                                }
                                                else{?>
                                                    <span class="regular-price "><?php print $row['price'];?>₺</span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="add-action d-flex position-absolute">
                                            <a href="cart.php" title="Add To cart">
                                                <i class="ion-bag"></i>
                                            </a>
                                            <a href="wishlist.php" title="Add To Wishlist">
                                                <i class="ion-ios-heart-outline"></i>
                                            </a>
                                            <a href="#quickview" data-toggle="modal" title="Quick View">
                                                <i class="ion-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End Here -->
        <!-- Banner Area Start Here -->
<!--        <div class="banner-area">-->
<!--            <div class="container container-default custom-area">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-6 col-sm-12 col-custom">-->
<!--                        <div class="banner-image hover-style">-->
<!--                            <a class="d-block" href="shop.php">-->
<!--                                <img class="w-100" src="assets/images/banner/small-banner/3-1.png" alt="Banner Image">-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 col-sm-12 col-custom">-->
<!--                        <div class="banner-image hover-style mb-0">-->
<!--                            <a class="d-block" href="shop.php">-->
<!--                                <img class="w-100" src="assets/images/banner/small-banner/3-2.png" alt="Banner Image">-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <!-- Banner Area End Here -->
        <!-- Product Area Start Here -->
        <div class="product-area mt-text mb-text-p">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">Çok Satanlar</h2>
                            <div class="desc-content">
                                <p>En çok satan tüm ürünler artık sizin için mevcut ve bu ürünü istediğiniz zaman buradan satın alabilirsiniz.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 product-wrapper col-custom">
                        <div class="product-slider arrow-style" style="height: 400px;" data-slick-options='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": true,
                        "dots": false
                        }' data-slick-responsive='[
                        {"breakpoint": 1200, "settings": {
                        "slidesToShow": 3
                        }},
                        {"breakpoint": 992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 576, "settings": {
                        "slidesToShow": 1
                        }}
                        ]'>
                            <?php
                            $query = $db->query("SELECT * FROM products ORDER BY clicks DESC LIMIT 15");
                            $query->execute();
                            foreach ($query as $row){
                            ?>
                            <div class="single-item" style="height: 450px!important;">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat">
                                            <img src="<?php print $row['image'];?>" alt="" class="product-image-1 w-100">
                                            <img src="<?php print $row['image'];?>" alt="" class="product-image-2 position-absolute w-100">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a style="margin-top: 10px;" href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat"><?php print $row['name']?></a></h4>
                                        </div>
                                        <div class="price-box">
                                            <?php
                                            if ($row['hassale'] == 1){?>
                                                <span class="regular-price "><?php print $row['saleprice'];?>₺</span>
                                                <span class="old-price"><del><?php print $row['price'];?>₺</del></span>
                                                <?php
                                            }
                                            else{?>
                                                <span class="regular-price "><?php print $row['price'];?>₺</span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                        <a href="cart.php" title="Add To cart">
                                            <i class="ion-bag"></i>
                                        </a>
                                        <a href="wishlist.php" title="Add To Wishlist">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a href="#quickview" data-toggle="modal" title="Quick View">
                                            <i class="ion-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newslatter Area Start Here -->
        <?php
        if(!isset($_SESSION['newsletter']))
        {
        ?>
        <div class="newsletter-area mt-no-text mb-text-p">
            <div class="container container-default h-100 custom-area">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-5 col-custom align-items-center justify-content-center">
                        <div class="newsletter-content text-center d-flex flex-column align-items-center justify-content-center h-100">
                            <div class="section-content">
                                <h4 class="title-4">Özel <span style="color: white;">teklifler</span> için</h4>
                                <h2 class="title-3 text-uppercase">Haber kanalımıza kaydolun!</h2>
                                <p class="desc-content">Yeni ürünler,indirimler ve size özel kampanyalar için <br> e-posta haber kanalımıza kaydolun!</p>
                            </div>
                            <div class="newsletter-form-wrap ml-auto mr-auto">
                                <form class="d-flex position-relative" action="assets/php/newsletter.php" method="post">
                                    <input type="email" id="mail" class="form-control email-box" placeholder="email@example.com" name="mail">
                                    <button id="submit" class="btn primary-btn obrien-button newsletter-btn position-absolute" type="submit">Kaydol</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- Newslatter Area End Here -->
        <!-- Call To Action Area Start Here -->
        <div class="call-to-action-area mb-text">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-custom">
                        <div class="call-to-action-item mt-0 d-lg-flex d-md-block align-items-center">
                            <div class="call-to-action-icon">
                                <img src="assets/images/icons/icon-1.png" alt="Icon">
                            </div>
                            <div class="call-to-action-info">
                                <h3 class="action-title">Hızlı Teslimat</h3>
                                <p class="desc-content">Özel kuryemiz ile her zaman hızlı teslimat!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-custom">
                        <div class="call-to-action-item d-lg-flex d-md-block align-items-center">
                            <div class="call-to-action-icon">
                                <img src="assets/images/icons/icon-2.png" alt="Icon">
                            </div>
                            <div class="call-to-action-info">
                                <h3 class="action-title">Kaliteli Ürünler</h3>
                                <p class="desc-content">Ürünlerimizin kalitesi garantilidir!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-custom">
                        <div class="call-to-action-item d-lg-flex d-md-block align-items-center">
                            <div class="call-to-action-icon">
                                <img src="assets/images/icons/icon-3.png" alt="Icon">
                            </div>
                            <div class="call-to-action-info">
                                <h3 class="action-title">Hızlı Destek</h3>
                                <p class="desc-content">Müşteri memnuniyeti için hızlı destek sunuyoruz.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action Area End Here -->
        <!-- Support Area Start Here -->
        <div class="support-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-12 col-custom">
                        <div class="support-wrapper d-flex">
                            <div class="support-content">
                                <h1 class="title">Yardıma ihtiyacınız mı var ?</h1>
                                <p class="desc-content">Destek hattımızı arayın: +90 552 721 48 33</p>
                            </div>
                            <div class="support-button d-flex align-items-center">
                                <a class="obrien-button primary-btn" href="contact-us" style="text-transform: inherit;">Bize Ulaşın</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Area End Here -->
        <?php require "partials/footer.php";?>
    </div>


    <!-- Modal Area Start Here -->
    <div class="modal fade obrien-modal" id="quickview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                    <span class="close-icon" aria-hidden="true">x</span>
                </button>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 text-center">
                                <div class="product-image">
                                    <img src="assets/images/product/1.jpg" width="350" height="350" id="productimage" alt="Product Image">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title" id="modalname">Product dummy name</h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price " id="price">$80.00</span>
                                            <span class="old-price"><del id="saleprice">$90.00</del></span>
                                        </div>
                                        <div class="quantity-with_btn">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" id="modalqty" value="0" type="number">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                            <div class="add-to_cart">
                                                <a class="btn obrien-button primary-btn" id="addbuttonmodal">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Area End Here -->
    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="ion-chevron-up"></i>
    </a>
    <!-- Scroll to Top End -->

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <!-- jQuery Migrate JS -->
    <script src="assets/js/vendor/jQuery-migrate-3.3.0.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <!-- Ajax JS -->
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <!-- Jquery Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <!-- Jquery Ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <!-- jquery magnific popup js -->
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/getcart.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>