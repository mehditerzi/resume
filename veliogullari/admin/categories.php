<!DOCTYPE html>
<?php session_start();
if($_SESSION['adminlogin'] == 1){
}else{
    header('Location: login.php');
}
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$filename="categories";
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
                        <h1 class="m-0"></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Ürünler</a></li>
                            <li class="breadcrumb-item active">Kategori/Markalar</li>
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
                            <h3>Kategori/Marka</h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control" id="category">
                                        <button class="btn btn-primary" onclick="addcategory()">Ekle</button>
                                        <button class="btn btn-danger" onclick="deletecategory()">Sil</button>
                                        <button class="btn btn-dark" onclick="savecategory()">Kaydet</button>
                                    </div>
                                    <div class="col">
                                        <input class="form-control"id="brand">
                                        <button class="btn btn-primary" onclick="addbrand()">Ekle</button>
                                        <button class="btn btn-danger" onclick="deletebrand()">Sil</button>
                                        <button class="btn btn-dark" onclick="savebrand()">Kaydet</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" id="categories" onchange="getbrands()">
                                            <option value="null">Kategori Seçiniz</option>
                                            <?php
                                            $query = $db->query("SELECT * FROM categories ", PDO::FETCH_ASSOC);
                                            if ( $query->rowCount() ){
                                                foreach( $query as $row ){
                                                    ?>
                                                    <option value="<?php print $row['id'];?>"><?php print $row['name'];?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="brands" class="form-control"></select>
                                    </div>
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
    $.widget.bridge('uibutton', $.ui.button);
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
<script>
    function getbrands() {
        $("#brands").empty();
        var city = document.getElementById('categories').value;
        var text = $("#categories option:selected").text();
        document.getElementById('category').value = text;
        var data = new FormData();
        data.append('id',city);
        $.ajax({
            type: 'POST',
            url: 'assets/php/getbrands.php',
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            data: data,
            success: function (output) {
                data = JSON.parse(output);
                data.forEach(function (row) {
                    var select = document.getElementById('brands');
                    var option = document.createElement('option');
                    option.setAttribute('value',row.id);
                    option.innerText = row.name;
                    select.append(option);
                });
            },
            error: function (xhr, err) {
                alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
                alert("responseText: " + xhr.responseText);
            }
        });
    }
    function addcategory() {
        if (document.getElementById('category').value != ""){
            var data = new FormData();
            data.append('name',document.getElementById('category').value);
            $.ajax({
                type: 'POST',
                url: 'assets/php/newcategory.php',
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                data: data,
                success: function (output) {
                    location.reload();
                },
                error: function (xhr, err) {
                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
                    alert("responseText: " + xhr.responseText);
                }
            });
        }
    }
    function addbrand() {
        if (document.getElementById('brand').value != "" || "" != $("#categories option:selected").text()){
            var data = new FormData();
            data.append('name',document.getElementById('brand').value);
            data.append('categoryid',document.getElementById('categories').value);
            $.ajax({
                type: 'POST',
                url: 'assets/php/newbrand.php',
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                data: data,
                success: function (output) {
                    location.reload();
                },
                error: function (xhr, err) {
                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
                    alert("responseText: " + xhr.responseText);
                }
            });
        }
    }
    function deletecategory() {
        if (confirm("Emin misiniz?")){
            var city = document.getElementById('categories').value;
            var data = new FormData();
            data.append('id',city);
            $.ajax({
                type: 'POST',
                url: 'assets/php/deletecategory.php',
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                data: data,
                success: function (output) {
                    alert(output);
                    location.reload();
                },
                error: function (xhr, err) {
                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
                    alert("responseText: " + xhr.responseText);
                }
            });
        }
    }
    function deletebrand() {
        if (confirm("Emin misiniz?")){
            var city = document.getElementById('brands').value;
            var data = new FormData();
            data.append('id',city);
            $.ajax({
                type: 'POST',
                url: 'assets/php/deletebrand.php',
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                data: data,
                success: function (output) {
                    alert(output);
                    location.reload();
                },
                error: function (xhr, err) {
                    alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
                    alert("responseText: " + xhr.responseText);
                }
            });
        }
    }
    function savecategory() {
        var city = document.getElementById('categories').value;
        var name = document.getElementById('category').value;
        var data = new FormData();
        data.append('name',name);
        data.append('id',city);
        $.ajax({
            type: 'POST',
            url: 'assets/php/savecategory.php',
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            data: data,
            success: function (output) {
                alert(output);
                location.reload();
            },
            error: function (xhr, err) {
                alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
                alert("responseText: " + xhr.responseText);
            }
        });
    }
    function savebrand() {
        var city = document.getElementById('brands').value;
        var name = document.getElementById('brand').value;
        var data = new FormData();
        data.append('name',name);
        data.append('id',city);
        $.ajax({
            type: 'POST',
            url: 'assets/php/savebrand.php',
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            data: data,
            success: function (output) {
                alert(output);
                location.reload();
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
