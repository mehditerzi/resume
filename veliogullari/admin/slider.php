<!DOCTYPE html>
<?php session_start();
if($_SESSION['adminlogin'] == 1){
}else{
    header('Location: login.php');
}
$filename="Slider";
?>
<html lang="en">
<?php require "partials/header.php";?>
<body class="hold-transition sidebar-mini layout-fixed">
<script src="plugins/jquery/jquery.min.js"></script>
<script src="assets/js/slidercustom.js"></script>
<div class="wrapper">

    <?php require "partials/side_navbar.php";?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">İçerik Yönetimi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">İçerik</li>
                            <li class="breadcrumb-item active">Slider</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4>Düzenleme Paneli</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <button class="btn-primary btn"  onclick="newslider()">Yeni Oluştur</button>
                                <button class="btn-primary btn" onclick="savechangesslider()">Değişiklikleri kaydet</button>
                                <button class="btn-danger btn" onclick="deleteslider()">Sil</button>
                                <div style="margin-top: 10px;"></div>
                                <button class="btn-primary btn" onclick="previewslider()">Önizle</button>
                                <button class="btn-primary btn" onclick="mobileslider()">Mobil Önizleme</button>
                                <div style="margin-top: 15px;"></div>
                                <select class="form-control form-select-sm" id="select" onchange="getslider()">
                                    <option value="null">- Slider Seçiniz -</option>
                                    <?php
                                    try {
                                        $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
                                    }
                                    catch (PDOException $e) {
                                        print $e->getMessage();
                                    }
                                    $query = $db->prepare("SELECT * FROM sliders");
                                    $query->execute();
                                    if ( $query->rowCount() ){
                                        $sayac = 1;
                                        foreach( $query as $row ){
                                            ?>
                                            <option value="<?php print $row['id'];?>"><?php print $row['title'];?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="baslik">Başlık</label>
                                <input class="form-control" id="baslik" type="text">
                                <label for="text">Açıklama</label>
                                <input class="form-control" id="text" type="text">
                            </div>
                            <div class="col">
                                <label for="btn-text">Buton Yazısı</label>
                                <input class="form-control" id="btn-text" type="text">
                                <label for="btn-link">Buton Linki</label>
                                <input class="form-control" id="btn-link" type="text">
                            </div>
                            <div class="col">
                                <label for="image">Arkaplan</label>
                                <input class="form-control" id="image" type="file">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Önizleme</h4>
                    </div>
                    <div class="card-body" style="height: 800px;align-content: center;" id="bodyprev">
                        <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms" id="preview" src="/index.php" width="100%" height="100%" style="border-width: 2px;left: 50%;border-radius: 1px;border-color: black;">
                    </div>
                </div>
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
<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
</body>
</html>
