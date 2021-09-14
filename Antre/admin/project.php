<!DOCTYPE html>
<?php session_start();
if($_SESSION['adminlogin'] == 1){
}else{
    header('Location: login.php');
}
$filename="Project";
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

                $pdocrud = new PDOCrud(false, "pure", "pure");
                $pdocrud->fieldTypes("image", "file_multi");
                $pdocrud->colRename("portfolio_id", "Portfolyo");
                $pdocrud->fieldRenameLable("portfolio_id", "Portfolyo");
                $pdocrud->addPlugin("ckeditor");//to add plugin
                $pdocrud->fieldNotMandatory("goal");
                $pdocrud->fieldNotMandatory("result");
                $pdocrud->fieldTypes("goal","textarea","required='0'");
                $pdocrud->fieldTypes("result","textarea","required='0'");
                $pdocrud->fieldCssClass("goal", array("ckeditor"));
                $pdocrud->fieldCssClass("result", array("ckeditor"));

                // get departments
                $data =  $pdocrud->getPDOModelObj()->select("portfolio");
                $options = array();
                foreach($data as $record) {
                    $options[$record['id']] = $record['title'];
                }

                // change the type of the dept_id field from textfield to select dropdown
                $pdocrud->fieldTypes("portfolio_id", "select");
                $pdocrud->fieldDataBinding("portfolio_id", $options, "", "","array");
                echo $pdocrud->dbTable("project")->render();
                echo $pdocrud->loadPluginJsCode("ckeditor","cHJvamVjdCMkZ29hbEAzZHNmc2RmKio5OTM0MzI0");
                echo $pdocrud->loadPluginJsCode("ckeditor","cHJvamVjdCMkcmVzdWx0QDNkc2ZzZGYqKjk5MzQzMjQ=");
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
