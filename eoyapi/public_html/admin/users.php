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
                                <div class="header-top">
                                    <h5>Kullanıcı Ekle</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form theme-form">
                                    <div class="row m-b-30">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="userName">Kullanıcı Adı</label>
                                                <input id="userName" class="form-control" type="text" placeholder="Adı Soyadı">
                                            </div>
                                            <div class="form-group">
                                                <label for="userPassword">Kullanıcı Şifre</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text" id="inputGroupPrepend"><i
                                                                    style="cursor: pointer;" id="passwordIcon" class="fa fa-eye"></i></span></div>
                                                    <input class="form-control" id="userPassword" type="password" placeholder="Şifre"
                                                           aria-describedby="inputGroupPrepend">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="userMail">Kullanıcı Email</label>
                                                <input id="userMail" class="form-control" type="email" placeholder="info@gosamplewebsite.com">
                                            </div>
                                        </div>
                                    </div>
                                    <a onclick="addUser()" id="addUser" class="btn btn-outline-primary mr-3 col-3" href="#">Ekle</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Kullanıcılar</h5>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="top-tabContent">
                                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                        <div class="row">
                                            {% for user in users %}
                                            <?php
                                            $query = $db->query("SELECT * FROM users", PDO::FETCH_ASSOC);
                                            if ( $query->rowCount() ){
                                                foreach( $query as $row ){
                                            ?>
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="project-box"><span class="badge badge-primary">Aktif</span>
                                                    <h6><?php print $row['username'];?></h6>
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <p>eksiogluonuryapi.com</p>
                                                        </div>
                                                    </div>
                                                    <div class="row details">
                                                        <div class="col-6"><span>Email</span></div>
                                                        <div class="col-6 text-primary"><?php print $row['mail'];?></div>
                                                    </div>
                                                    <div class="row details">
                                                        <!-- <div class="col-6"><span>Tamamlanan İş </span></div>
                                                                      <div class="col-6 text-primary">0</div>
                                                                      <div class="col-6"> <span>Devam Eden İş</span></div>
                                                                      <div class="col-6 text-primary">0</div>
                                                                      <div class="col-6"> <span>Başlanacak İş</span></div>
                                                                      <div class="col-6 text-primary">0</div> -->
                                                    </div>
                                                    <div class="project-status mt-4">
                                                        <button class="btn btn-outline-secondary" onclick="userRemove('<?php print $row['id'];?>')"
                                                                type="button">Sil</button>
                                                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#_<?php print $row['id'];?>"
                                                                type="button">Düzenle</button>
                                                        <?php include "parts/users/_modal.php";?>
                                                    </div>
                                                </div>
                                            </div>
                                            {% endfor %}
                                            <?php   }
                                            } ?>
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
<script src="assets/js/control/user.js"></script>
</body>

</html>