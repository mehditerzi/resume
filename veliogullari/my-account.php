<!doctype html><?php session_start();try {    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");}catch (PDOException $e) {    print $e->getMessage();}?><html class="no-js" lang="en"><head>    <meta charset="utf-8">    <meta http-equiv="x-ua-compatible" content="ie=edge">    <title>Velioğulları Market</title>    <meta name="robots" content="noindex, follow" />    <meta name="description" content="">    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    <!-- Favicon -->    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">    <!-- CSS	============================================ -->    <!-- Bootstrap CSS -->    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">    <!-- FontAwesome -->    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">    <!-- Ionicons -->    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">    <!-- Slick CSS -->    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">    <!-- Animation -->    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">    <!-- jQuery Ui -->    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">    <!-- Nice Select -->    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">    <!-- Magnific Popup -->    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->    <!-- Main Style CSS (Please use minify version for better website load performance) -->    <link rel="stylesheet" href="assets/css/style.css">    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> --></head><body>    <div class="contact-wrapper">        <header class="main-header-area">            <?php require "partials/header.php";?>            <!-- off-canvas menu end -->        </header>        <!-- Breadcrumb Area Start Here -->        <div class="breadcrumbs-area position-relative">            <div class="container">                <div class="row">                    <div class="col-12 text-center">                        <div class="breadcrumb-content position-relative section-content">                            <h3 class="title-3">Hesabım</h3>                        </div>                    </div>                </div>            </div>        </div>        <!-- Breadcrumb Area End Here -->        <!-- my account wrapper start -->        <div class="my-account-wrapper mt-no-text mb-no-text">            <div class="container container-default-2 custom-area">                <div class="row">                    <div class="col-lg-12 col-custom">                        <!-- My Account Page Start -->                        <div class="myaccount-page-wrapper">                            <!-- My Account Tab Menu Start -->                            <div class="row">                                <div class="col-lg-3 col-md-4 col-custom">                                    <div class="myaccount-tab-menu nav" role="tablist">                                        <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>                                            Ana Menü</a>                                        <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>                                            Siparişlerim</a>                                        <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i>                                            Download</a>                                        <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>                                            Adreslerim</a>                                        <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Hesap Detaylarım</a>                                        <a href="#change-password" data-toggle="tab"><i class="fa fa-key"></i> Şifre Yenileme</a>                                        <a href="login.php"><i class="fa fa-sign-out"></i> Logout</a>                                    </div>                                </div>                                <!-- My Account Tab Menu End -->                                <!-- My Account Tab Content Start -->                                <div class="col-lg-9 col-md-8 col-custom">                                    <div class="tab-content" id="myaccountContent">                                        <!-- Single Tab Content Start -->                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">                                            <div class="myaccount-content">                                                <h3>Dashboard</h3>                                                <div class="welcome">                                                    <p>Hello, <strong><?php print $_SESSION['firstname']." ".$_SESSION['lastname']?> </strong> (If Not <strong><?php print $_SESSION['firstname'];?> ! </strong><a href="logout" class="logout"> Çıkış Yapın</a>)</p>                                                </div>                                                <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>                                            </div>                                        </div>                                        <!-- Single Tab Content End -->                                        <!-- Single Tab Content Start -->                                        <div class="tab-pane fade" id="orders" role="tabpanel">                                            <div class="myaccount-content">                                                <h3>Orders</h3>                                                <div class="myaccount-table table-responsive text-center">                                                    <table class="table table-bordered">                                                        <thead class="thead-light">                                                            <tr>                                                                <th>Sipariş No</th>                                                                <th>Tarih</th>                                                                <th>Durumu</th>                                                                <th>Toplam</th>                                                                <th>Detaylar</th>                                                            </tr>                                                        </thead>                                                        <tbody>                                                        <?php                                                        $orders = $db->query("SELECT * FROM orders WHERE user_id=".$_SESSION['loginid'], PDO::FETCH_ASSOC);                                                        if ( $orders->rowCount() ){                                                        foreach( $orders as $row ){                                                        ?>                                                            <tr>                                                                <td><?php print $row['id'];?></td>                                                                <td><?php print $row['date'];?></td>                                                                <td><?php print $row['status'];?></td>                                                                <td><?php print $row['price'];?>₺</td>                                                                <td><a href="order?id=<?php print $row['id'];?>" class="btn obrien-button-2 primary-color rounded-0">Detaylar</a></td>                                                            </tr>                                                        <?php                                                            }                                                        }else{                                                            print "Siparişiniz bulunmamaktadır.";                                                        }                                                        ?>                                                        </tbody>                                                    </table>                                                </div>                                            </div>                                        </div>                                        <!-- Single Tab Content End -->                                        <!-- Single Tab Content Start -->                                        <div class="tab-pane fade" id="download" role="tabpanel">                                            <div class="myaccount-content">                                                <h3>Downloads</h3>                                                <div class="myaccount-table table-responsive text-center">                                                    <table class="table table-bordered">                                                        <thead class="thead-light">                                                            <tr>                                                                <th>Product</th>                                                                <th>Date</th>                                                                <th>Expire</th>                                                                <th>Download</th>                                                            </tr>                                                        </thead>                                                        <tbody>                                                            <tr>                                                                <td>Haven - Free Real Estate PSD Template</td>                                                                <td>Aug 22, 2018</td>                                                                <td>Yes</td>                                                                <td><a href="#" class="btn obrien-button-2 primary-color rounded-0"><i class="fa fa-cloud-download mr-2"></i>Download File</a></td>                                                            </tr>                                                            <tr>                                                                <td>HasTech - Profolio Business Template</td>                                                                <td>Sep 12, 2018</td>                                                                <td>Never</td>                                                                <td><a href="#" class="btn obrien-button-2 primary-color rounded-0"><i class="fa fa-cloud-download mr-2"></i>Download File</a></td>                                                            </tr>                                                        </tbody>                                                    </table>                                                </div>                                            </div>                                        </div>                                        <!-- Single Tab Content End -->                                        <!-- Single Tab Content Start -->                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">                                            <div class="myaccount-content">                                                <h3>Payment Method</h3>                                                <p class="saved-message">You Can't Saved Your Payment Method yet.</p>                                            </div>                                        </div>                                        <!-- Single Tab Content End -->                                        <!-- Single Tab Content Start -->                                        <div class="tab-pane fade" id="address-edit" role="tabpanel">                                            <button class="btn obrien-button-2 primary-color rounded-0" onclick="newmodal()">Yeni Adres</button>                                            <?php                                            $query = $db->query("SELECT * FROM adresses WHERE user_id=".$_SESSION['loginid'], PDO::FETCH_ASSOC);                                            if ( $query->rowCount() ){                                                foreach( $query as $row ){                                            ?>                                            <div class="myaccount-content" style="margin-top: 10px;">                                                <h3><?php print $row['name'];?></h3>                                                <address>                                                    <p><strong><?php $id = $row['city_id'];                                                            $cityquery = $db->query("SELECT * FROM cities WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);                                                            if ( $cityquery ){                                                                print($cityquery['name']);                                                            }                                                    ?> / <?php $id = $row['district_id'];                                                            $distquery = $db->query("SELECT * FROM districts WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);                                                            if ( $distquery ){                                                                print($distquery['name']);                                                            }                                                            ?>/                                                            <?php $id = $row['hood_id'];                                                            $distquery = $db->query("SELECT * FROM neighborhoods WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);                                                            if ( $distquery ){                                                                print($distquery['name']);                                                            }                                                            ?></strong></p>                                                    <p><?php print $row['adress'];?></p>                                                    <p><?php print $row['phone'];?></p>                                                </address>                                                <button class="btn obrien-button-2 primary-color rounded-0" onclick="editadress('<?php print $row['id'];?>')"><i class="fa fa-edit mr-2"></i>Edit Address</button>                                            </div>                                            <?php                                                }                                            }                                            else{                                                ?>                                                <div class="myaccount-content" style="margin-top: 10px;">                                                    <h3>Kayıtlı adresiniz bulunmamaktadır..</h3>                                                </div>                                            <?php                                            }                                            ?>                                        </div>                                        <!-- Single Tab Content End -->                                        <!-- Single Tab Content Start -->                                        <div class="tab-pane fade" id="account-info" role="tabpanel">                                            <div class="myaccount-content">                                                <h3>Account Details</h3>                                                <div class="account-details-form">                                                    <form action="#">                                                        <div class="row">                                                            <div class="col-lg-6 col-custom">                                                                <div class="single-input-item mb-3">                                                                    <label for="first-name" class="required mb-1">First Name</label>                                                                    <input type="text" id="first-name" placeholder="First Name" value="<?php print $_SESSION['firstname'];?>" />                                                                </div>                                                            </div>                                                            <div class="col-lg-6 col-custom">                                                                <div class="single-input-item mb-3">                                                                    <label for="last-name" class="required mb-1">Last Name</label>                                                                    <input type="text" id="last-name" placeholder="Last Name" value="<?php print $_SESSION['lastname'];?>" />                                                                </div>                                                            </div>                                                        </div>                                                        <div class="single-input-item mb-3">                                                            <label for="email" class="required mb-1">Email Addres</label>                                                            <input type="email" id="email" placeholder="Email Address" value="<?php print $_SESSION['mail'];?>"/>                                                        </div>                                                            <button class="btn obrien-button primary-btn" onclick="saveaccount()">Değişiklikleri Kaydet</button>                                                    </form>                                                </div>                                            </div>                                        </div> <!-- Single Tab Content End -->                                        <div class="tab-pane fade" id="change-password" role="tabpanel">                                            <div class="myaccount-content">                                                <fieldset>                                                    <form>                                                    <legend>Şifre Değiştirme</legend>                                                    <div class="single-input-item mb-3">                                                        <label for="current-pwd" class="required mb-1">Güncel Şifreniz</label>                                                        <input type="password" id="current-pwd" placeholder="Current Password" />                                                    </div>                                                    <div class="row">                                                        <div class="col-lg-6 col-custom">                                                            <div class="single-input-item mb-3">                                                                <label for="new-pwd" class="required mb-1">Yeni Şifreniz</label>                                                                <input type="password" id="new-pwd" placeholder="New Password" />                                                            </div>                                                        </div>                                                        <div class="col-lg-6 col-custom">                                                            <div class="single-input-item mb-3">                                                                <label for="confirm-pwd" class="required mb-1">Şifre Doğrulama</label>                                                                <input type="password" id="confirm-pwd" placeholder="Yeni şifreyi tekrar giriniz" />                                                            </div>                                                        </div>                                                    </div>                                                </fieldset>                                                <button class="btn obrien-button primary-btn" onclick="changepassword()">Şifremi Değiştir</button>                                            </div>                                            </form>                                        </div>                                    </div>                                </div> <!-- My Account Tab Content End -->                            </div>                        </div> <!-- My Account Page End -->                    </div>                </div>            </div>        </div>        <!-- my account wrapper end -->        <!-- Support Area Start Here -->        <div class="support-area">            <div class="container container-default custom-area">                <div class="row">                    <div class="col-lg-12 col-custom">                        <div class="support-wrapper d-flex">                            <div class="support-content">                                <h1 class="title">Need Help ?</h1>                                <p class="desc-content">Call our support 24/7 at 01234-567-890</p>                            </div>                            <div class="support-button d-flex align-items-center">                                <a class="obrien-button primary-btn" href="contact-us.php">Contact now</a>                            </div>                        </div>                    </div>                </div>            </div>        </div>        <!-- Support Area End Here -->        <!-- Footer Area Start Here -->        <?php require "partials/footer.php";?>        <!-- Footer Area End Here -->    </div>    <!-- JS============================================ -->    <!-- jQuery JS -->    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>    <!-- jQuery Migrate JS -->    <script src="assets/js/vendor/jQuery-migrate-3.3.0.min.js"></script>    <!-- Modernizer JS -->    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>    <!-- Bootstrap JS -->    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>    <!-- Slick Slider JS -->    <script src="assets/js/plugins/slick.min.js"></script>    <!-- Countdown JS -->    <script src="assets/js/plugins/jquery.countdown.min.js"></script>    <!-- Ajax JS -->    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>    <!-- Jquery Nice Select JS -->    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>    <!-- Jquery Ui JS -->    <script src="assets/js/plugins/jquery-ui.min.js"></script>    <!-- jquery magnific popup js -->    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>    <!-- Main JS -->    <script src="assets/js/main.js"></script>    <!-- Custom JS -->    <script>        const userid= <?php print $_SESSION['loginid']; ?>;        function newmodal() {            $('#adressmodal').modal('show');            document.getElementById('savebuttonmodal').setAttribute('onclick','newadress()');        }        function getdistricts(status,row) {            $("#district").empty();            $("#district").html('<option value="null">İlçe seçiniz..</option>');            var city = document.getElementById('city').value;            var text = $("#city option:selected").text();            var data = new FormData();            data.append('id',city);            $.ajax({                type: 'POST',                url: 'assets/php/getdistricts.php',                processData: false,  // tell jQuery not to process the data                contentType: false,  // tell jQuery not to set contentType                data: data,                success: function (output) {                    data = JSON.parse(output);                    data.forEach(function (row) {                        var select = document.getElementById('district');                        var option = document.createElement('option');                        option.setAttribute('value',row.id);                        option.innerText = row.name;                        select.append(option);                    });                    if (status==1){                        document.getElementById('district').value=row.district_id;                        $('#adress').val(row.adress);                        $('#phonenumber').val(row.phone);                    }                },                error: function (xhr, err) {                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);                    alert("responseText: " + xhr.responseText);                }            });        }        function gethoods(status,row) {            $("#hood").empty();            $("#hood").html('<option value="null">İlçe seçiniz..</option>');            var city = document.getElementById('hood').value;            var data = new FormData();            data.append('id',city);            $.ajax({                type: 'POST',                url: 'assets/php/getdistricts.php',                processData: false,  // tell jQuery not to process the data                contentType: false,  // tell jQuery not to set contentType                data: data,                success: function (output) {                    data = JSON.parse(output);                    data.forEach(function (row) {                        var select = document.getElementById('hood');                        var option = document.createElement('option');                        option.setAttribute('value',row.id);                        option.innerText = row.name;                        select.append(option);                    });                    if (status==1){                        document.getElementById('hood').value=row.district_id;                        $('#adress').val(row.adress);                        $('#phonenumber').val(row.phone);                    }                },                error: function (xhr, err) {                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);                    alert("responseText: " + xhr.responseText);                }            });        }        function newadress() {            var data = new FormData();            data.append('name',document.getElementById('adressname').value);            data.append('cityid',document.getElementById('city').value);            data.append('districtid',document.getElementById('district').value);            data.append('hoodid',document.getElementById('hood').value);            data.append('adress',document.getElementById('adress').value);            data.append('userid',userid);            data.append('phone',document.getElementById('phonenumber').value);            $.ajax({                type: 'POST',                url: 'assets/php/newadress.php',                processData: false,  // tell jQuery not to process the data                contentType: false,  // tell jQuery not to set contentType                data: data,                success: function (output) {                    alert(output);                    location.reload();                },                error: function (xhr, err) {                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);                    alert("responseText: " + xhr.responseText);                }            });        }        function saveadress(id) {            var data = new FormData();            data.append('id',id);            data.append('name',document.getElementById('adressname').value);            data.append('cityid',document.getElementById('city').value);            data.append('districtid',document.getElementById('district').value);            data.append('hoodid',document.getElementById('neighborhood').value);            data.append('adress',document.getElementById('adress').value);            data.append('userid',userid);            data.append('phone',document.getElementById('phonenumber').value);            $.ajax({                type: 'POST',                url: 'assets/php/saveadress.php',                processData: false,  // tell jQuery not to process the data                contentType: false,  // tell jQuery not to set contentType                data: data,                success: function (output) {                    alert(output);                    location.reload();                },                error: function (xhr, err) {                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);                    alert("responseText: " + xhr.responseText);                }            });        }        function editadress(id) {            $('#adressmodal').modal('show');            document.getElementById('savebuttonmodal').setAttribute('onclick','saveadress('+id+')');            var data = new FormData();            data.append('id',id);            $.ajax({                type: 'POST',                url: 'assets/php/getadress.php',                processData: false,  // tell jQuery not to process the data                contentType: false,  // tell jQuery not to set contentType                data: data,                success: function (output) {                    var data = JSON.parse(output);                    var row = data[0];                    $('#adressname').val(row.name);                    document.getElementById('city').value=row.city_id;                    getdistricts(1,row);                },                error: function (xhr, err) {                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);                    alert("responseText: " + xhr.responseText);                }            });        }        function changepassword() {            var current = document.getElementById('current-pwd');            var newpass = document.getElementById('new-pwd');            var confirmpass = document.getElementById('confirm-pwd');            var data = new FormData();            data.append('id',userid);            data.append('current',current);            data.append('new',newpass);            data.append('confirm',confirmpass);            $.ajax({                type: 'POST',                url: 'assets/php/changepassword.php',                processData: false,  // tell jQuery not to process the data                contentType: false,  // tell jQuery not to set contentType                data: data,                success: function (output) {                    alert(output);                    location.reload();                },                error: function (xhr, err) {                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);                    alert("responseText: " + xhr.responseText);                }            });        }        function saveaccount() {            var data = new FormData();            data.append('name',document.getElementById('first-name').value);            data.append('last',document.getElementById('last-name').value);            data.append('mail',document.getElementById('email').value);            data.append('id',userid);            $.ajax({                type: 'POST',                url: 'assets/php/saveaccount.php',                processData: false,  // tell jQuery not to process the data                contentType: false,  // tell jQuery not to set contentType                data: data,                success: function (output) {                    alert(output);                    location.reload();                },                error: function (xhr, err) {                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);                    alert("responseText: " + xhr.responseText);                }            });        }    </script></body><!-- Adress Modal --><div class="modal fade" id="adressmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">    <div class="modal-dialog" role="document">        <div class="modal-content">            <div class="modal-header">                <h5 class="modal-title" id="exampleModalLabel">Yeni Adres</h5>                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                    <span aria-hidden="true">&times;</span>                </button>            </div>            <div class="modal-body">                <div class="container">                    <div class="row">                        <div class="col">                            <label style="display: block;text-align: center" for="adressname">Adres Adı</label>                            <input type="text" id="adressname" class="form-control"> <br>                        </div>                    </div>                    <div class="row">                        <div class="col">                            <select class="form-select" onchange="getdistricts()" id="city">                                <option value="null">Şehir seçiniz..</option>                                <?php                                $query = $db->query("SELECT * FROM cities", PDO::FETCH_ASSOC);                                if ( $query->rowCount() ){                                foreach( $query as $row ){                                ?>                                    <option value="<?php print $row['id'] ?>"><?php print $row['name'] ?></option>                                <?php                                    }                                }                                ?>                            </select>                        </div>                    </div><br>                    <div class="row">                        <div class="col">                            <select class="form-select" id="district" onchange="gethoods()">                                <option value="null">İlçe seçiniz..</option>                            </select>                        </div>                    </div><br>                    <div class="row">                        <div class="col">                            <select class="form-select" id="hood">                                <option value="null">Mahalle seçiniz..</option>                            </select>                        </div>                    </div><br>                    <div class="row">                        <div class="col">                            <textarea id="adress" rows="5" class="form-control" placeholder="Açık adres giriniz.."></textarea>                        </div>                    </div>                    <div class="row">                        <div class="col">                            <label style="display: block;text-align: center" for="phonenumber">Telefon Numarası</label>                            <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="phonenumber" class="form-control"> <br>                        </div>                    </div>                </div>            </div>            <div class="modal-footer">                <button type="button" class="btn obrien-button-2 primary-color" data-dismiss="modal">Vazgeç</button>                <button type="button" id="savebuttonmodal" class="btn obrien-button-2 primary-color">Kaydet</button>            </div>        </div>    </div></div></html>