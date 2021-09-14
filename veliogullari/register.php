<!doctype html>
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

    <div class="contact-wrapper">
        <header class="main-header-area">
            <!-- Main Header Area Start -->
            <?php require "partials/header.php";?>
            <!-- Main Header Area End -->
            <!-- Sticky Header Start Here-->
            <!-- off-canvas menu end -->
        </header>
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">Üyelik Formu</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Login Area Start Here -->
        <div class="login-register-area mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Hesap Oluşturun</h2>
                                <p class="desc-content">Lütfen aşağıdaki bilgileri doğru şekilde doldurunuz.</p>
                            </div>
                            <form action="assets/php/register.php" method="post" id="registerform">
                                <div class="single-input-item mb-3">
                                    <input type="text" minlength="3" placeholder="İsim" name="firstname" required>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="text" minlength="2" placeholder="Soyisim" name="lastname" required>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Geçerli bir mail adresi girin." placeholder="Email" name="mail" required>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z]).{8,}" title="Şifreniz en az bir küçük, bir büyük, bir sayı ve 8 haneden oluşmalıdır." placeholder="Enter your Password" name="password" minlength="8" required>
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z]).{8,}" title="Şifreniz en az bir küçük, bir büyük, bir sayı ve 8 haneden oluşmalıdır." placeholder="Şifreyi tekrarlayın" name="confirm_password" minlength="8" required>
                                </div>
                                <div class="single-input-item mb-3">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="newsletter">
                                                <label class="custom-control-label" for="newsletter">Haber kanalımıza kayıt olun</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item mb-3">
                                    <button class="btn obrien-button-2 primary-color" type="submit">Kaydol</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Area End Here -->
        <!-- Footer Area Start Here -->
        <?php require "partials/footer.php";?>
        <!-- Footer Area End Here -->
    </div>

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
    <?php if (isset($_GET['error'])){
        print "<script>alert('".$_GET['error']."');</script>";
    } ?>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script>
        $('#registerform').submit(function () {
            var ip ="";
            $.getJSON("https://api.ipify.org?format=json",
                function(data) {
                ip=data.ip;
                });
            $(this).append($.map(params, function (param) {
                return   $('<input>', {
                    type: 'hidden',
                    name: 'ip',
                    value: ip
                })
            }))
        });
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Şifreler birbiriyle uyuşmuyor!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

    </script>

</body>

</html>