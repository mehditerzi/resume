<!DOCTYPE html>
<?php session_start();
if($_SESSION['adminlogin'] == 1)
{

}else{
    header('Location: login.php');
}try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}catch (PDOException $e) {
    print $e->getMessage();
}
$filename="Ürünler"
;?>
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
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1> </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header"> </div>
                    <div class="card-body">
                        <table id="products" width="100%">
                            <thead>
                            <td>Resim</td>
                            <td>İsim</td>
                            <td>Barkod</td>
                            <td>Fiyat</td>
                            <td>Stok</td>
                            <td>Marka</td>
                            <td>Kategori</td>
                            <td>İşlemler</td>
                            </thead>
                            <tbody> </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer"> <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        <div class="float-right d-none d-sm-inline-block"> <b>Version</b> 3.1.0-rc </div>
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script>
    $(document).ready(function() {
        $('#products').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "assets/php/server_processing.php"
        });
    });
    function deleteproduct(id) {
        if (confirm("Emin misiniz?")){
            var data = new FormData();
            data.append('id',id);
            $.ajax({
                type: 'POST',
                url: 'assets/php/deleteproduct.php',
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                 data: data,
                success: function (output) {
                    alert(output);
                    },
                error: function (xhr, err) {
                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
                    alert("responseText: " + xhr.responseText);
                }
            });
        }
    }
</script>
</body>

</html>