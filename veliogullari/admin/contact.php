<!DOCTYPE html>
<?php session_start();
if($_SESSION['adminlogin'] == 1){
}else{
    header('Location: login.php');
}
$filename="İletişim";
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
                        <h1 class="m-0">İçerik Yönetimi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">İçerik</li>
                            <li class="breadcrumb-item active">İletişim</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <button class="btn btn-outline-primary" onclick="newmodal()" data-toggle="modal" data-target="#contactmodal">Yeni Şube Ekle</button>
                <?php
                try {
                    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
                }
                catch (PDOException $e) {
                    print $e->getMessage();
                }
                $query = $db->prepare("SELECT * FROM contact");
                $query->execute();
                if ( $query->rowCount() ){
                    $sayac = 1;
                    foreach( $query as $row ){
                        ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 contenteditable="true" id="branchname<?php print $row['id'];?>"><?php print $row['branch_name'];?></h4>
                            <button class="btn btn-outline-primary" onclick="savecontact('<?php print $row['id'];?>')">Kaydet</button>
                            <button class="btn btn-outline-danger" onclick="deletecontact('<?php print $row['id'];?>')">Sil</button>
                        </div>
                        <div class="card-body">
                                        <input id="adress<?php print $row['id'];?>" class="form-control" placeholder="Adres" value="<?php print $row['adress'];?>"><br>
                                        <input id="phone<?php print $row['id'];?>" class="form-control" type="text" placeholder="Telefon" value="<?php print $row['phone'];?>"><br>
                                        <input id="mail<?php print $row['id'];?>" class="form-control" type="text" placeholder="Mail" value="<?php print $row['mail'];?>"><br>
                        </div>

                    </div>
                        <?php
                    }
                }
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
    function newmodal() {
        $('#modal-title').html('Yeni Şube Oluştur');
        $('#savebuton').attr('onclick','newbranch()');
    }
    function clearmodal() {
        $('#modal-title').html('');
        $('#savebuton').attr('onclick','');
        $('.modalinput').val('');
    }
    function savecontact(id) {
        var data = new FormData();
        data.append('id',id);
        data.append('name',$('#branchname'+id).html());
        data.append('adress',$('#adress'+id).val());
        data.append('phone',$('#phone'+id).val());
        data.append('mail',$('#mail'+id).val());
        $.ajax({
            type: 'POST',
            url: 'assets/php/savecontact.php',
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
    function newbranch() {
        var data = new FormData();
        data.append('name',$('#newbranchname').val());
        data.append('adress',$('#adress').val());
        data.append('phone',$('#phone').val());
        data.append('mail',$('#mail').val());
        $.ajax({
            type: 'POST',
            url: 'assets/php/newcontact.php',
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
    function deletecontact(id) {
        var data = new FormData();
        data.append('id',id);
        $.ajax({
            type: 'POST',
            url: 'assets/php/deletecontact.php',
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
<div class="modal fade" id="contactmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="name">Şube Adı</label>
                <input type="text" class="form-control modalinput" id="newbranchname">
                <label for="adress">Adres</label>
                <input type="text" class="form-control modalinput" id="adress">
                <label for="phone">Telefon Numarası</label>
                <input type="text" class="form-control modalinput" id="phone">
                <label for="mail">Mail</label>
                <input type="text" class="form-control modalinput" id="mail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="savebuton">Kaydet</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearmodal()">Close</button>
            </div>
        </div>
    </div>
</div>
</html>
