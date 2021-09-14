<?php session_start();try {    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");}catch (PDOException $e) {    print $e->getMessage();}?><!doctype html><html class="no-js" lang="en"><head>    <meta charset="utf-8">    <meta http-equiv="x-ua-compatible" content="ie=edge">    <title>Velioğulları Market</title>    <meta name="robots" content="noindex, follow" />    <meta name="description" content="">    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    <!-- Favicon -->    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">    <!-- CSS	============================================ -->    <!-- Bootstrap CSS -->    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">    <!-- FontAwesome -->    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">    <!-- Ionicons -->    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">    <!-- Slick CSS -->    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">    <!-- Animation -->    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">    <!-- jQuery Ui -->    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">    <!-- Nice Select -->    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">    <!-- Magnific Popup -->    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">    <style>        .slick-slide {            display: none;            float: left;            height: 300px!important;            min-height: 1px;        }        .product-content {            background-color: #efedee;            padding: 0 30px 20px;            height: 120px!important;        }        .title-2 {            font-size: 14px!important;        }        .arrow-style .slick-arrow {            background-color: #0030ff!important;            opacity: 70%!important;        }        .breadcrumbs-area {            padding: 100px 0;            background: #f6f6f6 url(/assets/images/bg/1-2.jpg) no-repeat scroll center center/cover!important;        }    </style>    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->    <!-- Main Style CSS (Please use minify version for better website load performance) -->    <link rel="stylesheet" href="assets/css/style.css">    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> --></head><body>    <div class="shop-wrapper">        <header class="main-header-area">           <?php require "partials/header.php";?>        </header>        <!-- Breadcrumb Area Start Here -->        <div class="breadcrumbs-area position-relative">            <div class="container">                <div class="row">                    <div class="col-12 text-center">                        <div class="breadcrumb-content position-relative section-content">                            <h3 class="title-3">Market</h3>                        </div>                    </div>                </div>            </div>        </div>        <!-- Breadcrumb Area End Here -->        <!-- Shop Main Area Start Here -->        <div class="shop-main-area">            <div class="container container-default custom-area">                <div class="row flex-row-reverse">                    <div class="col-lg-9 col-12 col-custom widget-mt">                        <!--shop toolbar start-->                        <?php if (isset($_GET['search'])){?><h3 style="margin-bottom: 20px;">"<?php print $_GET['search'];?>" Araması için sonuçlar:</h3><?php }?>                        <div class="shop_toolbar_wrapper" style="background-color: #efedee;">                            <div class="search-box">                                <form action="shop.php" method="get">                                    <div class="input-group">                                        <input type="text" class="form-control" width="500px;" size="500" placeholder="Ürünleri Arayın" id="search" name="search" aria-label="Ürünleri Arayın">                                        <div class="input-group-append">                                            <button class="btn btn-outline-secondary" style="width: 70px;height: 50px;" onclick="searchproducts()" type="submit">                                                <i class="fa fa-search"></i>                                            </button>                                        </div>                                    </div>                                </form>                            </div>                            <div class="shop-select">                                <form class="d-flex flex-column w-100">                                    <div class="form-group">                                        <select class="form-control nice-select w-100 d-lg-none" onchange="selectcategory()" id="categories">                                            <option value="null">-Kategori Seçiniz-</option>                                            <?php                                            $query = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);                                            if ( $query->rowCount() ){                                                foreach( $query as $row ){                                                    ?>                                                    <option <?php if (isset($_GET['cat']) && $_GET['cat'] == $row['id'])print "selected";?> value="<?php print $row['id'];?>" ><?php print $row['name'];?></option>                                                    <?php                                                }                                            }                                            ?>                                        </select>                                    </div>                                </form>                            </div>                            <div class="shop-select">                                <form class="d-flex flex-column w-100" >                                    <div class="form-group">                                        <select class="form-control nice-select w-100" onchange="sortproducts()" id="sorter">                                            <option selected value="1">Alfabetik, A-Z</option>                                            <option value="4">Fiyata göre artan</option>                                            <option value="5">Fiyata göre azalan</option>                                        </select>                                    </div>                                </form>                            </div>                        </div>                        <!--shop toolbar end-->                        <!-- Shop Wrapper Start -->                        <div id="container" class="row shop_wrapper grid_4">                            <?php                            $limit = 30;                            if (!isset($_GET['page'])) {                                $page = 1;                                $thispage=1;                            } else{                                $page = $_GET['page'];                                $thispage=$_GET['page'];                            }                            $starting_limit = ($page-1)*$limit;                            $categories=array();                            $brands=array();                            if (isset($_GET['search'])){                                $query = $db->prepare("SELECT * FROM products WHERE name LIKE '%{$_GET['search']}%' LIMIT ".$starting_limit.",".$limit);                                $query->execute();                                $quer = "SELECT count(*) FROM products WHERE name LIKE '%{$_GET['search']}%' ";                                $s = $db->query($quer);                                $total_results = $s->fetchColumn();                                $total_pages = ceil($total_results/$limit);                            }                            if (isset($_GET['cat'])){                                $query = $db->prepare("SELECT * FROM products WHERE category_id = ? LIMIT ".$starting_limit.",".$limit);                                $query->execute(array($_GET['cat']));                                $quer = "SELECT count(*) FROM products WHERE category_id = ? ";                                $s = $db->prepare($quer);                                $s->execute(array($_GET['cat']));                                $total_results = $s->fetchColumn();                                $total_pages = ceil($total_results/$limit);                            }                            if (!isset($_GET['cat'])&&!isset($_GET['search'])){                                $query = $db->prepare("SELECT * FROM products LIMIT ".$starting_limit.",".$limit);                                $query->execute();                                $quer = "SELECT count(*) FROM products";                                $s = $db->query($quer);                                $total_results = $s->fetchColumn();                                $total_pages = ceil($total_results/$limit);                            }                            if ( $query->rowCount() ){                                foreach( $query as $row ){                            ?>                            <div price="<?php print $row['price']; ?>" name="<?php print $row['name']; ?>" class="col-md-3 col-sm-3 col-lg-3 col-custom product product-area">                                <div class="single-product position-relative">                                    <div class="product-image">                                        <a class="d-block" href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat">                                            <img src="<?php print $row['image'];?>" alt="" class="product-image-1 w-100">                                            <img src="<?php print $row['image'];?>" alt="" class="product-image-2 position-absolute w-100">                                        </a>                                    </div>                                    <div class="product-content">                                        <div class="product-rating">                                        </div>                                        <div class="product-title">                                            <h4 class="title-2"> <a href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat"><?php print $row['name'];?></a></h4>                                        </div>                                        <div class="price-box">                                            <?php                                            if ($row['hassale'] == 1){?>                                                <span class="regular-price "><?php print $row['saleprice'];?>₺</span>                                                <span class="old-price"><del><?php print $row['price'];?>₺</del></span>                                                <?php                                            }                                            else{?>                                                <span class="regular-price "><?php print $row['price'];?>₺</span>                                                <?php                                            }                                            ?>                                        </div>                                    </div>                                    <div class="add-action d-flex position-absolute">                                        <a onclick="addtocart('<?php print $row['id'];?>')" title="Sepete ekle">                                            <i class="ion-bag"></i>                                        </a>                                        <a onclick="addtowishlist('<?php print $row['id'];?>')" title="İstek Listesine Ekle">                                            <i class="ion-ios-heart-outline"></i>                                        </a>                                        <a href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat">                                            <i class="ion-eye"></i>                                        </a>                                    </div>                                    <div class="product-content-listview">                                        <div class="product-title">                                            <h4 class="title-2"> <a href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat""><?php print $row['name'];?></a></h4>                                        </div>                                        <div class="price-box">                                            <?php                                            if ($row['hassale'] == 1){?>                                                <span class="regular-price "><?php print $row['saleprice'];?>₺</span>                                                <span class="old-price"><del><?php print $row['price'];?>₺</del></span>                                                <?php                                            }                                            else{?>                                                <span class="regular-price "><?php print $row['price'];?>₺</span>                                                <?php                                            }                                            ?>                                        </div>                                        <div class="add-action-listview d-flex">                                            <a onclick="addtocart('<?php print $row['id'];?>')" title="Sepete ekle">                                                <i class="ion-bag"></i>                                            </a>                                            <a onclick="addtowishlist('<?php print $row['id'];?>')" title="İstek Listesine Ekle">                                                <i class="ion-ios-heart-outline"></i>                                            </a>                                            <a href="#quickview" onclick="showmodal('<?php print $row['id'];?>')" data-toggle="modal" title="Hızlı Gözat">                                                <i class="ion-eye"></i>                                            </a>                                        </div><!--                                        <p class="desc-content">--><!--                                            --><?php //print $row['description'];?><!--                                        </p>-->                                    </div>                                </div>                            </div>                            <?php                                }                            }                            ?>                        </div>                        <!-- Shop Wrapper End -->                        <!-- Bottom Toolbar Start -->                        <div class="row">                            <div class="col-sm-12 col-custom">                                <div class="toolbar-bottom mt-30">                                    <nav class="pagination pagination-wrap mb-10 mb-sm-0">                                        <ul class="pagination">                                            <?php                                            for ($page=1; $page <= $total_pages ; $page++):                                                if ($page>15){                                                    print "<li>...</li>";                                                    break;                                                }?>                                                <li class="shop<?php if ($thispage==$page)print "active";?>"><a href="<?php                                                    if (strlen($_SERVER['QUERY_STRING'])){                                                        if (strpos($_SERVER['QUERY_STRING'],"page=".$thispage)){                                                            $string = "?".$_SERVER['QUERY_STRING'];                                                            print str_replace("page=".$thispage, "page=".$page, $string);                                                        }else{                                                            print "?".$_SERVER['QUERY_STRING']."&page=".$page;                                                        }                                                    }                                                    else{                                                        print "?page=".$page;                                                    }                                                    ?>"><?php echo $page;?></a></li>                                            <?php endfor; ?>                                        </ul>                                    </nav>                                </div>                            </div>                        </div>                        <!-- Bottom Toolbar End -->                    </div>                    <div class="col-lg-3 col-12 col-custom">                        <!-- Sidebar Widget Start -->                        <aside class="sidebar_widget widget-mt">                            <div class="widget_inner">                                <div class="widget-list widget-mb-1">                                    <h3 class="widget-title">Kategoriler</h3>                                    <div class="sidebar-body">                                        <ul class="sidebar-list">                                            <?php                                            $query = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);                                            if ( $query->rowCount() ){                                                foreach( $query as $row ){                                             ?>                                            <li><a href="shop?cat=<?php print $row['id'];?>" <?php if (isset($_GET['cat'])){if ($_GET['cat']==$row['id']){?>style="color: #0030ff;"<?php }} ?>><?php print $row['name'];?></a></li>                                            <?php                                                }                                            }                                            ?>                                        </ul>                                    </div>                                </div>                            </div>                        </aside>                        <!-- Sidebar Widget End -->                    </div>                </div>            </div>        </div>        <!-- Shop Main Area End Here -->        <!-- Support Area Start Here -->        <div class="support-area">            <div class="container container-default custom-area">                <div class="row">                    <div class="col-lg-12 col-custom">                        <div class="support-wrapper d-flex">                            <div class="support-content">                                <h1 class="title">Yardıma ihtiyacınız mı var ?</h1>                                <p class="desc-content">Destek hattımızı arayın: +90 552 721 48 33</p>                            </div>                            <div class="support-button d-flex align-items-center">                                <a class="obrien-button primary-btn" href="contact-us">Bize Ulaşın</a>                            </div>                        </div>                    </div>                </div>            </div>        </div>        <!-- Support Area End Here -->        <!-- Footer Area Start Here -->        <?php require "partials/footer.php";?>        <!-- Footer Area End Here -->    </div>    <!-- Modal Area Start Here -->    <div class="modal fade obrien-modal" id="quickview" tabindex="-1" role="dialog" aria-hidden="true">        <div class="modal-dialog modal-dialog-centered" role="document">            <div class="modal-content">                <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">                    <span class="close-icon" aria-hidden="true">x</span>                </button>                <div class="modal-body">                    <div class="container-fluid">                        <div class="row">                            <div class="col-lg-6 col-md-6 text-center">                                <div class="product-image">                                    <img src="assets/images/product/1.jpg" width="350" height="350" id="productimage" alt="Product Image">                                </div>                            </div>                            <div class="col-lg-6 col-md-6">                                <div class="modal-product">                                    <div class="product-content">                                        <div class="product-title">                                            <h4 class="title" id="modalname">Product dummy name</h4>                                        </div>                                        <div class="price-box">                                            <span class="regular-price " id="price">$80.00</span>                                            <span class="old-price"><del id="saleprice">$90.00</del></span>                                        </div>                                        <div class="quantity-with_btn">                                            <div class="quantity">                                                <div class="cart-plus-minus">                                                    <input class="cart-plus-minus-box" id="modalqty" value="0" type="number">                                                    <div class="dec qtybutton">-</div>                                                    <div class="inc qtybutton">+</div>                                                </div>                                            </div>                                            <div class="add-to_cart">                                                <a class="btn obrien-button primary-btn" id="addbuttonmodal">Add to cart</a>                                            </div>                                        </div>                                    </div>                                </div>                            </div>                        </div>                    </div>                </div>            </div>        </div>    </div>    <!-- Modal Area End Here -->    <!-- Scroll to Top Start -->    <a class="scroll-to-top" href="#">        <i class="ion-chevron-up"></i>    </a>    <!-- Scroll to Top End -->    <!-- JS============================================ -->    <!-- jQuery JS -->    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>    <!-- jQuery Migrate JS -->    <script src="assets/js/vendor/jQuery-migrate-3.3.0.min.js"></script>    <!-- Modernizer JS -->    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>    <!-- Bootstrap JS -->    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>    <!-- Slick Slider JS -->    <script src="assets/js/plugins/slick.min.js"></script>    <!-- Countdown JS -->    <script src="assets/js/plugins/jquery.countdown.min.js"></script>    <!-- Ajax JS -->    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>    <!-- Jquery Nice Select JS -->    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>    <!-- Jquery Ui JS -->    <script src="assets/js/plugins/jquery-ui.min.js"></script>    <!-- jquery magnific popup js -->    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>    <!-- Main JS -->    <script src="assets/js/main.js"></script>    <script src="assets/js/cart.js"></script><script src="assets/js/getcart.js" type="text/javascript"></script><script>    function selectcategory() {        var data = document.getElementById('categories').value;        window.location.replace('https://www.veliogullarimarket.com/shop?cat='+data);    }</script></body></html>