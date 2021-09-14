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
$filename="zones";
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
                        <h1 class="m-0">Hizmet Bölgeleri</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
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
                        <h3>Düzenleyin</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h3 style="text-align: center;">Şehir</h3>
                                    <input class="form-control" id="citytext">
                                    <button class="btn btn-primary" onclick="addcity()">Ekle</button>
                                    <button class="btn btn-danger" onclick="deletecity()">Sil</button>
                                    <button class="btn btn-dark" onclick="savecity()">Kaydet</button>
                                </div>
                                <div class="col">
                                    <h3 style="text-align: center;">İlçe</h3>
                                    <input class="form-control" id="districttext">
                                    <button class="btn btn-primary" onclick="addistrict()">Ekle</button>
                                    <button class="btn btn-danger" onclick="deletedistrict()" >Sil</button>
                                    <button class="btn btn-dark" onclick="savedistrict()">Kaydet</button>
                                </div>
                                <div class="col">
                                    <h3 style="text-align: center;">Mahalle</h3>
                                    <input class="form-control" id="hoodtext">
                                    <button class="btn btn-primary" onclick="addhood()">Ekle</button>
                                    <button class="btn btn-danger" onclick="deletehood()" >Sil</button>
                                    <button class="btn btn-dark" onclick="savehood()">Kaydet</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <select size="10" class="form-control" id="city" onchange="getdistricts()">
                                        <?php
                                        $query = $db->query("SELECT * FROM cities ", PDO::FETCH_ASSOC);
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
                                    <select size="10" class="form-control" id="district" onchange="gethoods()">

                                    </select>
                                </div>
                                <div class="col">
                                    <select size="10" class="form-control" id="neighborhood">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
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

<script>
    function getdistricts() {
        $("#district").empty();
        var city = document.getElementById('city').value;
        var text = $("#city option:selected").text();
        document.getElementById('citytext').value = text;
        var data = new FormData();
        data.append('id',city);
        $.ajax({
            type: 'POST',
            url: 'assets/php/getdistricts.php',
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            data: data,
            success: function (output) {
                data = JSON.parse(output);
                data.forEach(function (row) {
                    var select = document.getElementById('district');
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
    function addcity() {
        if (document.getElementById('citytext').value != ""){
            var data = new FormData();
            data.append('name',document.getElementById('citytext').value);
            $.ajax({
                type: 'POST',
                url: 'assets/php/newcity.php',
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
    function addistrict() {
        if (document.getElementById('districttext').value != "" || "" != $("#city option:selected").text()){
            var data = new FormData();
            data.append('name',document.getElementById('districttext').value);
            data.append('cityid',document.getElementById('city').value);
            $.ajax({
                type: 'POST',
                url: 'assets/php/newdistrict.php',
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
    function deletecity() {
        if (confirm("Emin misiniz?")){
            var city = document.getElementById('city').value;
            var data = new FormData();
            data.append('id',city);
            $.ajax({
                type: 'POST',
                url: 'assets/php/deletecity.php',
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
    function deletedistrict() {
        if (confirm("Emin misiniz?")){
            var city = document.getElementById('district').value;
            var data = new FormData();
            data.append('id',city);
            $.ajax({
                type: 'POST',
                url: 'assets/php/deletedistrict.php',
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
    function savecity() {
        var city = document.getElementById('city').value;
        var name = document.getElementById('citytext').value;
        var data = new FormData();
        data.append('name',name);
        data.append('id',city);
        $.ajax({
            type: 'POST',
            url: 'assets/php/savecity.php',
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
    function savedistrict() {
        var city = document.getElementById('district').value;
        var name = document.getElementById('districttext').value;
        var data = new FormData();
        data.append('name',name);
        data.append('id',city);
        $.ajax({
            type: 'POST',
            url: 'assets/php/savedistrict.php',
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

    function gethoods() {
        $("#neighborhood").empty();
        var city = document.getElementById('district').value;
        var text = $("#district option:selected").text();
        document.getElementById('districttext').value = text;
        var data = new FormData();
        data.append('id',city);
        $.ajax({
            type: 'POST',
            url: 'assets/php/gethoods.php',
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            data: data,
            success: function (output) {
                data = JSON.parse(output);
                data.forEach(function (row) {
                    var select = document.getElementById('neighborhood');
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
    function addhood() {
        if (document.getElementById('hoodtext').value != "" || "" != $("#district option:selected").text()){
            var data = new FormData();
            data.append('name',document.getElementById('hoodtext').value);
            data.append('cityid',document.getElementById('district').value);
            $.ajax({
                type: 'POST',
                url: 'assets/php/newhood.php',
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
    function savehood() {
        var city = document.getElementById('neighborhood').value;
        var name = document.getElementById('hoodtext').value;
        var data = new FormData();
        data.append('name',name);
        data.append('id',city);
        $.ajax({
            type: 'POST',
            url: 'assets/php/savehood.php',
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
    function deletehood() {
        if (confirm("Emin misiniz?")){
            var city = document.getElementById('neighborhood').value;
            var data = new FormData();
            data.append('id',city);
            $.ajax({
                type: 'POST',
                url: 'assets/php/deletehood.php',
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
</script>
</body>
</html>
