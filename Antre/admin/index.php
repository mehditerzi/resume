<!DOCTYPE html>
<?php session_start();
if($_SESSION['adminlogin'] == 1){
}else{
    header('Location: login.php');
}
$filename="İndex";
?>
<html lang="en">
<?php require "partials/header.php";?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php require "partials/side_navbar.php";?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
<!--                <div class="row mb-2">-->
<!--                    <div class="col-sm-6">-->
<!--                        <h1 class="m-0">İçerik Yönetimi</h1>-->
<!--                    </div> /.col -->
<!--                    <div class="col-sm-6">-->
<!--                        <ol class="breadcrumb float-sm-right">-->
<!--                            <li class="breadcrumb-item">İçerik</li>-->
<!--                            <li class="breadcrumb-item active">Hakkımızda</li>-->
<!--                        </ol>-->
<!--                    </div> /.col -->
<!--                </div> /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
<!--                --><?php
//                ini_set('display_errors', 'Off');
//                error_reporting(64);
//                require_once "script/pdocrud.php";
//
//                $pdocrud = new PDOCrud(false, "pure", "pure");
//                $pdocrud->fieldTypes("image", "image");
//                $pdocrud->colRename("image", "Resim");
//                $pdocrud->colRename("title", "Başlık");
//                $pdocrud->colRename("undertitle", "Altbaşlık");
//                $pdocrud->colRename("text", "Açıklama");
//                $pdocrud->colRename("leftbtn_text", "Sol Buton Yazısı");
//                $pdocrud->colRename("leftbtn_link", "Sol Buton Linki");
//                $pdocrud->colRename("rightbtn_text", "Sağ Buton Yazısı");
//                $pdocrud->colRename("rightbtn_link", "Sağ Buton Linki");
//
//
//                $pdocrud->fieldRenameLable("image", "Resim");
//                $pdocrud->fieldRenameLable("title", "Başlık");
//                $pdocrud->fieldRenameLable("undertitle", "Altbaşlık");
//                $pdocrud->fieldRenameLable("text", "Açıklama");
//                $pdocrud->fieldRenameLable("leftbtn_text", "Sol Buton Yazısı");
//                $pdocrud->fieldRenameLable("leftbtn_link", "Sol Buton Linki");
//                $pdocrud->fieldRenameLable("rightbtn_text", "Sağ Buton Yazısı");
//                $pdocrud->fieldRenameLable("rightbtn_link", "Sağ Buton Linki");
//                echo $pdocrud->dbTable("sliders")->render();
//                ?>
            </div><!-- /.container-fluid -->
            ADMİN PANELE HG
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0-rc
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
</body>
</html>
