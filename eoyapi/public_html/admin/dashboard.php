<?php require "parts/main/db.php";?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>GSWS - Admin</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
          rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="assets/css/prism.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body class="dark-only">
<!-- Loader starts-->
<?php require "parts/main/_loader.html";?>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <?php require "parts/main/_page_header.html";?>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        <?php require "parts/main/_page_sidebar.html";?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Giriş</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row starter-main">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Anasayfa Slider Yönetimi</h5>
                            </div>
                            <div class="form theme-form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sliderHeader">Başlık</label>
                                                    <input class="form-control" id="sliderHeader" type="text" placeholder="Bir başlık girin">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sliderSubHeader">Alt Başlık</label>
                                                    <input class="form-control" id="sliderSubHeader" type="text" placeholder="Bir alt başlık girin">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sliderButtonText">Buton Yazısı</label>
                                                    <input class="form-control" id="sliderButtonText" type="text" placeholder="Buton Yazısı">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sliderButtonLink">Buton link</label>
                                                    <input class="form-control" id="sliderButtonLink" type="text" placeholder="/product">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="sliderImage">Slider Resim</label>
                                                    <input class="form-control" id="sliderImage" name="sliderImage" type="file" accept="image/png, image/jpeg"
                                                           multiple="false">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Resim</th>
                                                        <th>Başlık</th>
                                                        <th>Alt Başlık</th>
                                                        <th>Buton</th>
                                                        <th>Link</th>
                                                        <th>İşlem</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $query = $db->query("SELECT * FROM slider", PDO::FETCH_ASSOC);
                                                    if ( $query->rowCount() ){
                                                        foreach( $query as $row ){
                                                    ?>
                                                    <tr>
                                                        <td><img src="<?php print $row['image'];?>" style="width: 150px; height: 70px;" alt="" srcset=""></td>
                                                        <td><?php print $row['header'];?></td>
                                                        <td><?php print $row['subheader'];?></td>
                                                        <td><?php print $row['buttonlink'];?></td>
                                                        <td><?php print $row['buttontext'];?></td>
                                                        <td>
                                                            <button class="btn btn-outline-danger btn-sm m-5" onclick="sliderRemove('<?php print $row['id'];?>')" type="button">Sil</button>
                                                            <button class="btn btn-outline-primary btn-sm m-5" type="button" data-toggle="modal"
                                                                    data-target="#<?php print $row['id'];?>">Düzenle</button>
                                                            <?php include "parts/dashboard/_modal.php";?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button onclick="saveSlider()" class="btn btn-outline-primary col-md-6" type="button">Ekle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <?php require "parts/main/_footer.html";?>
    </div>
</div>
<!-- latest jquery-->
<script src="assets/js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap js-->
<script src="assets/js/bootstrap/popper.min.js"></script>
<script src="assets/js/bootstrap/bootstrap.js"></script>
<!-- feather icon js-->
<script src="assets/js/icons/feather-icon/feather.min.js"></script>
<script src="assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="assets/js/sidebar-menu.js"></script>
<script src="assets/js/config.js"></script>
<!-- Plugins JS start-->
<script src="assets/js/prism/prism.min.js"></script>
<script src="assets/js/clipboard/clipboard.min.js"></script>
<script src="assets/js/custom-card/custom-card.js"></script>
<script src="assets/js/tooltip-init.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="assets/js/script.js"></script>
<script src="assets/js/light.js"></script>
<!-- login js-->
<!-- Plugin used-->
<script src="assets/js/control/slider.js"></script>
</body>

</html>