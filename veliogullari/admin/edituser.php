<!DOCTYPE html>
<?php session_start();
if($_SESSION['adminlogin'] == 1){
}else{
    header('Location: login.php');
}
$filename="Ürün Düzenleme";
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$id = $_GET['id'];
$selected = $db->query("SELECT * FROM users WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
if ( $selected ){
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
                        <h1 class="m-0">Üyeler</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
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
                        <h3>Üye Düzenleme</h3>
                        <button class="btn btn-primary" onclick="saveuser(<?php print $_GET['id'];?>)">Kaydet</button>
                    </div>
                    <div class="card-body">
                        <div class="container" style="z-index: 100;">
                            <div class="row">
                                <div class="col"><input type="text" class="form-control" id="firstname" value="<?php print $selected['firstname'];?>"></div>
                                <div class="col"><input type="text" class="form-control" id="surname" value="<?php print $selected['surname'];?>"></div>
                                <div class="col"><input type="text" class="form-control" id="mail" value="<?php print $selected['mail'];?>"></div>
                                <div class="col"><input type="text" class="form-control" id="password" value="<?php print $selected['password'];?>"></div>
                            </div>
                            <div class="row">
                                <h3>Siparişleri</h3><br>
                                <?php
                                $orders = $db->prepare("SELECT * FROM orders WHERE user_id=".$selected['id']);
                                $orders->execute();
                                foreach ($orders as $order){
                                    print $order['id']." Tarih:".$order['date']." Durum:".$order['status']." Fiyat".$order['price']."₺ <br>";
                                }
                                ?>

                            </div>
                            <div class="row">
                                <h3>Adresleri</h3><br>
                                <?php
                                $orders = $db->prepare("SELECT * FROM adresses WHERE user_id=".$selected['id']);
                                $orders->execute();
                                foreach ($orders as $order){
                                    print $order['id']."<input type='text' id='name".$order['id']."' class='form-control' value='".$order['name']."'> <input type='text' id='adress".$order['id']."' class='form-control' value='".$order['adress']."'> <input type='text' id='phone".$order['id']."' class='form-control' value='".$order['phone']."'> <button class='btn btn-primary' onclick='saveadress(".$order['id'].")'>Kaydet</button><br>";
                                }
                                ?>
                            </div>
                        </div>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- CKEditor 4 -->
<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
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
<script>
    function saveuser(id) {
        var name = document.getElementById('firstname').value;
        var surname = document.getElementById('surname').value;
        var mail = document.getElementById('mail').value;
        var password = document.getElementById('password').value;
        var data= new FormData();
        data.append('name',name);
        data.append('surname',surname);
        data.append('mail',mail);
        data.append('password',password);
        data.append('id',id);
        $.ajax({
            type: 'POST',
            url: 'assets/php/edituser.php',
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            data: data,
            success: function (output) {
                if (output=="Başarılı"){
                    alert(output);
                    location.reload();
                }
            },
            error: function (xhr, err) {
                alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
                alert("responseText: " + xhr.responseText);
            }
        });
    }
    function saveadress(id) {
        var name = document.getElementById('name'+id).value;
        var adress = document.getElementById('adress'+id).value;
        var mail = document.getElementById('phone'+id).value;
        var data = new FormData();
        data.append('name',name);
        data.append('adress',adress);
        data.append('phone',mail);
        data.append('id',id);
        $.ajax({
            type: 'POST',
            url: 'assets/php/saveadress.php',
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            data: data,
            success: function (output) {
                if (output=="Başarılı"){
                    alert(output);
                    location.reload();
                }
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
