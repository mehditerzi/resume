<!DOCTYPE html>
<?php session_start();
if($_SESSION['adminlogin'] == 1){
}else{
    header('Location: login.php');
}
$filename="Ürün Ekleme";
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
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
                        <div class="card">
                            <div class="card-header">
                                            <h3>Ürün Ekleme</h3>
                            </div>
                            <div class="card-body">
                                <div class="container" style="z-index: 100;">
                                  <div class="row">
                                      <select class="form-control" id="categories" onchange="getbrands()">
                                          <option value="null">Kategori Seçiniz</option>
                                          <?php
                                          $query = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
                                          if ( $query->rowCount() ){
                                              foreach( $query as $row ){
                                                  ?>
                                                  <option value="<?php print $row['id'];?>"><?php print $row['name']?></option>
                                                  <?php
                                              }
                                          }
                                          ?>
                                      </select>
                                      <div style="height: 50px;">

                                      </div>
                                      <select class="form-control" id="brands">
                                          <option value="null">Marka Seçiniz</option>
                                      </select>
                                  </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="name">Ürün Adı</label>
                                            <input placeholder="Ürün adı giriniz" id="name" type="text" class="form-control">
                                        </div>
                                        <div class="col">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Ürün Ana Resmi</label>
                                            <div class="input-group" id="imageborder">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image">
                                                    <label class="custom-file-label" for="image">Dosya Seçiniz</label>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                    <div class="row" id="border">
                                        <textarea id="description" style="width: 200px;"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="barcode">Barkod No</label>
                                            <input id="barcode" type="text" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="price">Satış Fiyatı</label>
                                            <input id="price" type="number" step="0.5" class="form-control" value="0" >
                                        </div>
                                        <div class="col">
                                            <label for="price">Vergisiz Alış Fiyatı</label>
                                            <input id="taxlessbuyprice" type="number" step="0.5" class="form-control" value="0" >
                                        </div>
                                        <div class="col">
                                            <label for="price">Vergili Alış Fiyatı</label>
                                            <input id="taxedbuyprice" type="number" step="0.5" class="form-control" value="0" >
                                        </div>
                                        <div class="col">
                                            <label for="price">Vergi Yüzdesi</label>
                                            <input id="tax" type="number" step="0.5" class="form-control" value="0" >
                                        </div>
                                        <div class="col">
                                            <label>İndirimli mi?</label><br>
                                            <button class="btn btn-outline-primary" id="yes" onclick="yessale()">Evet</button>
                                            <button class="btn btn-outline-dark" id="no" onclick="nosale()">Hayır</button>
                                        </div>
                                        <div class="col">
                                            <label for="saleprice">İndirimli Fiyat</label>
                                            <input id="saleprice" disabled type="number" step="0.5" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Stok Sayısı</label>
                                            <input type="number" step="1" class="form-control" id="quantity">
                                        </div>
                                        <div class="col">
                                            <button onclick="checkform()" class="btn btn-primary" style="float: right;margin-top: 30px;">Ekle</button>
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
    var sale=0;
    CKEDITOR.config.width = '100%';
    CKEDITOR.replace(document.getElementById('description'));
    function getbrands() {
        $("#brands").empty();
        var city = document.getElementById('categories').value;
        var text = $("#categories option:selected").text();
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
    function yessale() {
        var button = document.getElementById('yes');
        button.setAttribute('class','btn btn-primary');
        sale=1;
        document.getElementById('saleprice').disabled = false;
        document.getElementById('no').setAttribute('class','btn btn-outline-dark');
    }
    function nosale() {
        var button = document.getElementById('no');
        button.setAttribute('class','btn btn-dark');
        sale=0;
        document.getElementById('saleprice').setAttribute('disabled','');
        document.getElementById('saleprice').value ="";
        document.getElementById('yes').setAttribute('class','btn btn-outline-primary');
    }
    function checkform() {
        var status=1;
        if (document.getElementById('categories').value== "null" || document.getElementById('categories').value == ""){
            document.getElementById('categories').setAttribute('style','border:1px solid red;border-color:red;');
            status=0;
        }
        else {
            document.getElementById('categories').setAttribute('style','border:1px solid #ced4da;');
        }
        if (document.getElementById('brands').value== "null" || document.getElementById('brands').value == ""){
            document.getElementById('brands').setAttribute('style','border:1px solid red;border-color:red;');
            status=0;
        }
        else {
            document.getElementById('brands').setAttribute('style','border:1px solid #ced4da;');
        }
        if (document.getElementById('name').value== null || document.getElementById('name').value == ""){
            document.getElementById('name').setAttribute('style','border:1px solid red;border-color:red;');
            status=0;
        }
        else {
            document.getElementById('name').setAttribute('style','border:1px solid #ced4da;');
        }
        if (document.getElementById('image').files[0]== null || document.getElementById('image').files[0] == ""){
            document.getElementById('imageborder').setAttribute('style','border:1px solid red;border-color:red;');
            status=0;
        }
        else {
            document.getElementById('imageborder').setAttribute('style','border:1px solid #ced4da;');
        }
        if (CKEDITOR.instances.description.getData()== null || CKEDITOR.instances.description.getData() == ""){
            document.getElementById('border').style="border:1px solid red";
            status=0;
        }
        else {
            document.getElementById('border').setAttribute('style','border:1px solid #ced4da;');
        }
        if (document.getElementById('barcode').value== null || document.getElementById('barcode').value == ""){
            document.getElementById('barcode').setAttribute('style','border:1px solid red;border-color:red;');
            status=0;
        }
        else{
            document.getElementById('barcode').setAttribute('style','border:1px solid #ced4da;');
        }
        if (document.getElementById('price').value== null || document.getElementById('price').value == ""){
            document.getElementById('price').setAttribute('style','border:1px solid red;border-color:red;');
            status=0;
        }
        else {
            document.getElementById('price').setAttribute('style','border:1px solid #ced4da;');
        }
        if (sale==1){
            if (document.getElementById('saleprice').value== null || document.getElementById('saleprice').value == ""){
                document.getElementById('saleprice').setAttribute('style','border:1px solid red;border-color:red;');
                status=0;
            }
            else {
                document.getElementById('saleprice').setAttribute('style','border:1px solid #ced4da;');
            }
        }
        else {
            document.getElementById('saleprice').setAttribute('style','border:1px solid #ced4da;');
        }
        if (document.getElementById('quantity').value== null || document.getElementById('quantity').value == ""){
            document.getElementById('quantity').setAttribute('style','border:1px solid red;border-color:red;');
            status=0;
        }
        else {
            document.getElementById('quantity').setAttribute('style','border:1px solid #ced4da;');
        }
        if (status==1){
            addproduct();
        }
    }
    function addproduct() {
        var category = document.getElementById('categories').value;
        var brand = document.getElementById('brands').value;
        var name = document.getElementById('name').value;
        var image = document.getElementById('image').files[0];
        var description = CKEDITOR.instances.description.getData();
        var barcode = document.getElementById('barcode').value;
        var price = document.getElementById('price').value;
        var buyprice = document.getElementById('taxlessbuyprice').value;
        var taxedbuyprice = document.getElementById('taxedbuyprice').value;
        var tax = document.getElementById('tax').value;
        var issale = sale;
        var saleprice = document.getElementById('saleprice').value;
        var quantity = document.getElementById('quantity').value;
        var data = new FormData();
        data.append('id',<?php print $selected['id'];?>);
        data.append('category_id',category);
        data.append('brand_id',brand);
        data.append('name',name);
        data.append('image',image);
        data.append('description',description);
        data.append('barcode',barcode);
        data.append('price',price);
        data.append('issale',issale);
        data.append('saleprice',saleprice);
        data.append('quantity',quantity);
        data.append('taxlessbuyprice',buyprice);
        data.append('taxedbuyprice',taxedbuyprice);
        data.append('tax',tax);
        $.ajax({
            type: 'POST',
            url: 'assets/php/addproduct.php',
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
