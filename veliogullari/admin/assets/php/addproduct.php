<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
move_uploaded_file($_FILES['image']['tmp_name'], "products/temporary.".$_FILES['image']['name']);
$old=file_get_contents("products/temporary.".$_FILES['image']['name']);
include("resize-class.php");
$resizeObj = new resize("products/temporary.".$_FILES['image']['name']);
$resizeObj -> resizeImage(600, 600, 0);
$resizeObj -> saveImage('../../../data/products/'.$_POST['category_id'].$_POST['brand_id'].$_POST['name'].'.png', 100);
if ($_POST['issale']){
    $saleprice = $_POST['saleprice'];
}
else{
    $saleprice=0;
}
$slug= slugify($_POST['name']);
$query = $db->prepare("INSERT INTO products SET
name = ?,
image = ?,
description = ?,
barcode = ?,
price = ?,
hassale = ?,
saleprice = ?,
quantity = ?,
brand_id = ?,
category_id = ?,
slug = ?,
buy_price = ?,
taxedbuy_price = ?,
tax = ?");
$insert = $query->execute(array(
    $_POST['name'], "/veliogullari/data/products/".$_POST['category_id'].$_POST['brand_id'].$_POST['name'].'.png', $_POST['description'],
    $_POST['barcode'],$_POST['price'],$_POST['issale'],$saleprice,$_POST['quantity'],$_POST['brand_id'],$_POST['category_id'],$slug,$_POST['taxlessbuyprice'],$_POST['taxedbuyprice'],$_POST['tax']
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "Başarılı";
}
function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}