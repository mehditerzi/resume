<!DOCTYPE html>
<?php session_start();
if($_SESSION['adminlogin'] == 1){
}else{
    header('Location: login.php');
}
$filename="Blog";
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
                <?php
                ini_set('display_errors', 'Off');
                error_reporting(64);
                require_once "script/pdocrud.php";

                $pdocrud = new PDOCrud(false, "bootstrap4", "fair");
                $pdocrud->fieldTypes("image", "file_new");
                $pdocrud->fieldTypes("date", "date");
                $pdocrud->tableColFormatting("image","image",array("width"=>"50px","height"=>"50px"));
                $pdocrud->colRename("title", "Başlık");
                $pdocrud->fieldRenameLable("title", "Başlık");
                $pdocrud->colRename("image", "Görsel");
                $pdocrud->fieldRenameLable("image", "Görsel");
                $pdocrud->colRename("description", "Açıklama");
                $pdocrud->fieldRenameLable("description", "Açıklama");
                $pdocrud->colRename("content", "İçerik");
                $pdocrud->fieldRenameLable("content", "İçerik");
                $pdocrud->fieldTypes("content","textarea","required='0'");
                $pdocrud->fieldCssClass("content", array("ckeditor"));
                $pdocrud->fieldNotMandatory("content");
                $pdocrud->crudRemoveCol(array("content"));
                $pdocrud->colRename("date", "Tarih");
                $pdocrud->addPlugin("ckeditor");//to add plugin
                $pdocrud->fieldRenameLable("date", "Tarih");
                echo $pdocrud->dbTable("blog")->render();
                echo $pdocrud->loadPluginJsCode("ckeditor","YmxvZyMkY29udGVudEAzZHNmc2RmKio5OTM0MzI0");
                ?>
            </div><!-- /.container-fluid -->
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
