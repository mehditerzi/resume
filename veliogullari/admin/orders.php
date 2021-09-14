<!DOCTYPE html>
<?php session_start();
error_reporting(1);
if($_SESSION['adminlogin'] == 1){
}else{
    header('Location: login.php');
}
$filename="Siparişler";
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
if ($_GET['status']=="completed"){
    $qq = "WHERE status='Tamamlandı'";
}
if ($_GET['status']=="onhold"){
    $qq = "WHERE status='Yolda' OR status='Hazırlanıyor'";
}
if ($_GET['status']=="cancel"){
    $qq = "WHERE status='İptal'";
}
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
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <table id="products">
                    <thead>
                    <td>Sipariş No</td>
                    <td>Sipariş İçeriği</td>
                    <td>Sipariş Durumu</td>
                    <td>Fiyat</td>
                    </thead>
                    <?php
                    $query = $db->query("SELECT * FROM orders ".$qq, PDO::FETCH_ASSOC);
                    if ( $query->rowCount() ){
                        foreach( $query as $row ){
                            ?>
                            <tr>
                                <td><?php print $row['id'];?></td>
                                <td><select class="form-control">
                                        <option>İçeriği görmek için tıklayın.</option>
                                        <?php
                                        $contents = $db->query("SELECT * FROM order_contents WHERE order_id =".$row['id'], PDO::FETCH_ASSOC);
                                            foreach ($contents as $content){
                                                $product = $db->query("SELECT * FROM products WHERE id = '{$content['product_id']}'")->fetch(PDO::FETCH_ASSOC);;
                                                    print "<option>".$product['name']."x".$content['quantity']."</option>";
                                            }
                                        ?>
                                    </select></td>
                                <td>
                                    <select class="form-control" onchange="changestatus(<?php print $row['id'];?>)" id="status<?php print $row['id'];?>">
                                        <option value="Hazırlanıyor" <?php if ("Hazırlanıyor" == $row['status']) print "selected";?>>Hazırlanıyor</option>
                                        <option value="Yolda" <?php if ("Yolda" == $row['status']) print "selected";?>>Yolda</option>
                                        <option value="Tamamlandı" <?php if ("Tamamlandı" == $row['status']) print "selected";?>>Tamamlandı</option>
                                        <option value="İptal" <?php if ("İptal" == $row['status']) print "selected";?>>İptal</option>
                                    </select>
                                </td>
                                <td><?php print $row['price'];?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
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
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>$('#products').DataTable();
function changestatus(id) {
    var data = new FormData();
    data.append('id',id);
    data.append('value',document.getElementById('status'+id).value);
    $.ajax({
        type: 'POST',
        url: 'assets/php/changestatus.php',
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


</script>
</body>
</html>
