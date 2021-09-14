<?php
session_start();
if (!$_SESSION['login']){
    header("location:login.php");
}
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
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
                            <h3 class="title-3">Ödeme</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Checkout Area Start Here -->
        <form action="neworder" method="post">
        <div class="checkout-area">
            <div class="container container-default-2 custom-container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                            <div class="checkbox-form">
                                <h3>Adres Seçimi</h3>
                                <div class="row">
                                    <select id="adress" name="adress" class="form-control">
                                        <?php
                                        $query = $db->prepare("SELECT * FROM adresses WHERE user_id=".$_SESSION['loginid']);
                                        $query->execute();
                                        foreach ($query as $row){
                                        ?>
                                        <option value="<?php print $row['id'];?>"><?php print $row['name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                    <div class="order-notes mt-3">
                                        <div class="checkout-form-list checkout-form-list-2">
                                            <label>Sipariş Notu</label>
                                            <textarea name="note" id="checkout-mess" cols="30" rows="10" placeholder="Siparişinize eklemek istediğiniz not."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Siparişiniz</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Ürün</th>
                                            <th class="cart-product-total">Toplam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $array = $_SESSION['cart'];
                                    $keys = array_keys($array);
                                    foreach ($keys as $key){
                                    ?>
                                    <input name="values[]" hidden value="<?php echo $array[$key];?>">
                                    <input name="keys[]" hidden value="<?php echo $key;?>">
                                    <?php
                                    }
                                    ?>
                                    <input name="userid" hidden value="<?php echo $_SESSION['loginid'];?>">
                                    <?php $array = $_SESSION['cart'];
                                    $keys = array_keys($array);
                                    $count = 0;
                                    $total = 0;
                                    foreach ($array as $item)
                                    {
                                        $query = $db->query("SELECT * FROM products WHERE id = ".$keys[$count])->fetch(PDO::FETCH_ASSOC);
                                        if ($query){
                                        ?>
                                        <tr class="cart_item">
                                            <td class="cart-product-name"><?php print $query['name'];?><strong class="product-quantity">
                                    × <?php print $item;?></strong></td>
                                            <td class="cart-product-total text-center"><span class="amount"><?php print $query['price']*$item;?>₺</span></td>
                                        </tr>
                                    <?php
                                    $count++;
                                    $total+=$query['price']*$item;
                                        }
                                    } ?>
                                    </tbody>
                                    <tfoot>
                                    <?php
                                    ?>
                                        <tr class="cart-subtotal">
                                            <th>Sepet Tutarı</th>
                                            <td class="text-center"><span class="amount"><?php print $total;?>₺</span></td>
                                        </tr>
                                    <?php ?>
                                        <tr class="order-total">
                                            <th>Ödenecek Tutar</th>
                                            <td class="text-center"><strong><span class="amount"><?php print $total;?>₺</span></strong></td>
                                            <input name="price" hidden value="<?php print $total;?>">
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="#payment-2">
                                                <h5 class="panel-title mb-2">
                                                        <input type="checkbox" class="form-control" id="door" value="true" name="door" onchange="$('#iyzico').prop('checked',false);"><label for="door">Kapıda Ödeme</label>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-3">
                                                <h5 class="panel-title mb-2">
                                                        <input type="checkbox" disabled class="form-control" id="iyzico" value="true" name="iyzico" onchange="$('#door').prop('checked',false);"><label for="iyzico">Iyzico Sanal Pos</label>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <input value="Siparişi tamamlayın" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- Checkout Area End Here -->
        <!-- Support Area Start Here -->
        <div class="support-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-12 col-custom">
                        <div class="support-wrapper d-flex">
                            <div class="support-content">
                                <h1 class="title">Need Help ?</h1>
                                <p class="desc-content">Call our support 24/7 at 01234-567-890</p>
                            </div>
                            <div class="support-button d-flex align-items-center">
                                <a class="obrien-button primary-btn" href="contact-us.php">Contact now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Area End Here -->
        <!-- Footer Area Start Here -->
        <footer class="footer-area">
            <div class="footer-widget-area">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
                            <div class="single-footer-widget m-0">
                                <div class="footer-logo">
                                    <a href="index.php">
                                        <img src="assets/images/logo/footer.png" alt="Logo Image">
                                    </a>
                                </div>
                                <p class="desc-content">Obrien is the best parts shop of your daily nutritions. What kind of nutrition do you need you can get here soluta nobis</p>
                                <div class="social-links">
                                    <ul class="d-flex">
                                        <li>
                                            <a class="border rounded-circle" href="#" title="Facebook">
                                                <i class="fa fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="border rounded-circle" href="#" title="Twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="border rounded-circle" href="#" title="Linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="border rounded-circle" href="#" title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="border rounded-circle" href="#" title="Vimeo">
                                                <i class="fa fa-vimeo"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                            <div class="single-footer-widget">
                                <h2 class="widget-title">Information</h2>
                                <ul class="widget-list">
                                    <li><a href="about-us.php">Our Company</a></li>
                                    <li><a href="contact-us.php">Contact Us</a></li>
                                    <li><a href="about-us.php">Our Services</a></li>
                                    <li><a href="about-us.php">Why We?</a></li>
                                    <li><a href="about-us.php">Careers</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                            <div class="single-footer-widget">
                                <h2 class="widget-title">Quicklink</h2>
                                <ul class="widget-list">
                                    <li><a href="about-us.php">About</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="shop.php">Shop</a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                    <li><a href="contact-us.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                            <div class="single-footer-widget">
                                <h2 class="widget-title">Support</h2>
                                <ul class="widget-list">
                                    <li><a href="contact-us.php">Online Support</a></li>
                                    <li><a href="contact-us.php">Shipping Policy</a></li>
                                    <li><a href="contact-us.php">Return Policy</a></li>
                                    <li><a href="contact-us.php">Privacy Policy</a></li>
                                    <li><a href="contact-us.php">Terms of Service</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-custom">
                            <div class="single-footer-widget">
                                <h2 class="widget-title">See Information</h2>
                                <div class="widget-body">
                                    <address>123, H2, Road #21, Main City, Your address goes here.<br>Phone: 01254 698 785, 36598 254 987<br>Email: https://example.com</address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright-area">
                <div class="container custom-area">
                    <div class="row">
                        <div class="col-12 text-center col-custom">
                            <div class="copyright-content">
                                <p>Copyright © 2020 <a href="https://hasthemes.com/" title="https://hasthemes.com/">HasThemes</a> | Built with&nbsp;<strong>Obrien</strong>&nbsp;by <a href="https://hasthemes.com/" title="https://hasthemes.com/">HasThemes</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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

</body>

</html>