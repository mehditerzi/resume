<!DOCTYPE html>
<?php session_start();
if($_SESSION['adminlogin'] == 1){
}else{
    header('Location: login.php');
}
$filename="Portfolio";
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
                $pdocrud->fieldTypes("slides", "file_multi");
                $pdocrud->tableColFormatting("image","image",array("width"=>"50px","height"=>"50px"));
                $pdocrud->colRename("title", "Başlık");
                $pdocrud->fieldRenameLable("title", "Başlık");
                $pdocrud->colRename("slides", "Slayt");
                $pdocrud->fieldRenameLable("slides", "Slayt");
                $pdocrud->colRename("text", "Altbaşlık");
                $pdocrud->fieldRenameLable("text", "Altbaşlık");
                $pdocrud->colRename("category", "Kategori");
                $pdocrud->fieldRenameLable("category", "Kategori");
                $pdocrud->colRename("content", "İçerik");
                $pdocrud->fieldRenameLable("content", "İçerik");
                $pdocrud->colRename("image", "Resim");
                $pdocrud->fieldRenameLable("image", "Resim");
                $pdocrud->fieldTypes("content","textarea","required='0'");
                $pdocrud->fieldCssClass("content", array("ckeditor"));
                $pdocrud->fieldNotMandatory("content");
                $pdocrud->crudRemoveCol(array("content","slides","id"));
                // get departments
                $data =  $pdocrud->getPDOModelObj()->select("categories");
                $options = array();
                foreach($data as $record) {
                    $options[$record['id']] = $record['name'];
                }
                $pdocrud->relatedData('category','categories','id','name');
                $pdocrud->addPlugin("select2");//to add plugin
                $pdocrud->addPlugin("ckeditor");//to add plugin
                $pdocrud->fieldTypes("category", "multiselect");
                $pdocrud->fieldDataBinding("category", $options, "", "","array");
                echo $pdocrud->dbTable("portfolio")->render();
                echo $pdocrud->loadPluginJsCode("ckeditor","cG9ydGZvbGlvIyRjb250ZW50QDNkc2ZzZGYqKjk5MzQzMjQ=");

                echo $pdocrud->loadPluginJsCode("select2","select");//to add plugin call on select elements
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
