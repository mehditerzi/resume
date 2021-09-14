<?php session_start();
if (!$_SESSION['login']){
    header("location:login.php");
}
?>
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
        <?php require "partials/header.php";?>
    </header>
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Sepet</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper mt-no-text mb-no-text">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">Resim</th>
                                <th class="pro-title">Ürün</th>
                                <th class="pro-price">Fiyat</th>
                                <th class="pro-quantity">Adet</th>
                                <th class="pro-subtotal">Toplam</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            try {
                                $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
                            }
                            catch (PDOException $e) {
                                print $e->getMessage();
                            }
                            $order = $db->query("SELECT * FROM order_contents WHERE order_id=".$_GET['id'], PDO::FETCH_ASSOC);
                            if ( $order->rowCount() ){
                                foreach( $order as $row ){
                            $total = 0;
                                $query = $db->query("SELECT * FROM products WHERE id= '{$row['product_id']}'")->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?php print $query['image'];?>" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#"><?php print $query['name'];?></a></td>
                                    <td class="pro-price"><span><?php print $query['price'];?>₺</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="<?php print $row['quantity'];?>" disabled type="number">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span><?php print $query['price']*$row['quantity'];?>₺</span></td>
                                </tr>
                                <?php
                                $total+=$query['price']*$row['quantity'];
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3>Sepet Toplamı</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr class="total">
                                        <td>Toplam</td>
                                        <td class="total-amount"><?php print $total?>₺</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
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

<!-- Main JS -->
<script src="assets/js/main.js"></script>
<script src="assets/js/getcart.js" type="text/javascript"></script>

</body>

</html>