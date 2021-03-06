<?php
session_start();
if ($_SESSION['login']){
    header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Ekşioğlu | Admin Giriş</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
          rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
</head>

<body onkeyup="enter31(event)">
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="loader-index"><span></span></div>
    <svg>
        <defs></defs>
        <filter id="goo">
            <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
            </fecolormatrix>
        </filter>
    </svg>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <div class="container-fluid p-0">
        <!-- login page with video background start-->
        <div class="auth-bg-video">
            <video id="bgvid" poster="../assets/images/other-images/coming-soon-bg.jpg" playsinline="" autoplay="" muted="" loop="">
                <source src="../assets/video/auth-bg.mp4" type="video/mp4">
            </video>
            <div class="authentication-box">
                <div class="mt-4">
                    <div class="card-body" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.329);">
                        <div class="cont text-center">
                            <div>
                                <div class="theme-form">
                                    <h4>Giriş</h4>
                                    <h6>Lütfen Mail ve Şifrenizi giriniz</h6>
                                    <div class="form-group">
                                        <label for="userMail" class="col-form-label pt-0">E-Mail</label>
                                        <input onkeyup="enter31(event)" id="userMail" class="form-control" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="userPassword" class="col-form-label">Şifre</label>
                                        <input onkeyup="enter31(event)" id="userPassword" class="form-control" type="password" required="">
                                    </div>
                                    <div class="checkbox p-0">
                                        <input id="saveMe" type="checkbox">
                                        <label for="saveMe">Beni Hatırla</label>
                                    </div>
                                    <div class="form-group row mt-3 mb-0">
                                        <button onkeyup="enter31(event)" class="btn btn-primary btn-block" onclick="login()">Giriş</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login page with video background end-->
    </div>
</div>
<!-- latest jquery-->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap js-->
<script src="../assets/js/bootstrap/popper.min.js"></script>
<script src="../assets/js/bootstrap/bootstrap.js"></script>
<!-- feather icon js-->
<script src="../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="../assets/js/sidebar-menu.js"></script>
<script src="../assets/js/config.js"></script>
<!-- Plugins JS start-->
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="../assets/js/script.js"></script>
<!-- login js-->
<!-- Plugin used-->
<script src="assets/js/control/login.js"></script>
</body>

</html>