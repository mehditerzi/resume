<?php session_start(); ?><!doctype html>
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

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->

    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>

<div class="about-wrapper">
    <header class="main-header-area">
    <?php require "partials/header.php"?>
    </header>
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative mb-text-p">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Hakkımızda</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- About Us Area Start Here -->
    <!-- Feature Area Start Here -->
    <div class="feature-area mb-no-text">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-custom">
                    <div class="">
                        <div style="@media (min-width: 500px) and (max-width: 900px){min-width: 100%;}@media (min-width: 900px){width:200%;}overflow-wrap: break-word;">
                        <?php
                            try {
                                $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
                            }
                            catch (PDOException $e) {
                                print $e->getMessage();
                            }
                            $query = $db->query("SELECT * FROM about WHERE id= 1")->fetch(PDO::FETCH_ASSOC);
                            if ( $query ){
                                print $query['content'];
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Area End Here -->
    <!-- About Us Area End Here -->
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
    <!-- Footer Area Start Here -->
    <?php require "partials/footer.php";?>
    <!-- Footer Area End Here -->
</div>

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