<?php
include("resize-class.php");
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
if ($_POST['process']==0){

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
tax = ?,
buy_price = ?,
taxedbuy_price = ?
");
    $insert = $query->execute(array(
        $_POST['name'], "/veliogullari/data/products/".$_POST['categoryid'].$_POST['brandid'].$_POST['name'].'.png', $_POST['description'],
        $_POST['barcode'],$_POST['price'],0,0,$_POST['quantity'],$_POST['brandid'],$_POST['categoryid'],$slug,$_POST['tax'],$_POST['buyprice'],
        $_POST['taxedbuyprice']
    ));
    if ( $insert ){
        $last_id = $db->lastInsertId();
        print "Başarılı";
    }
    else{
        print_r($db->errorInfo());
    }
}
if ($_POST['process']==1){
    $query = $db->prepare("INSERT INTO brands SET
name = ?,
category_id = ?");
    $insert = $query->execute(array(
        $_POST['brandname'],$_POST['categoryid']
    ));
    if ( $insert ){
        $brandid = $db->lastInsertId();
//        file_put_contents("temporary.png",file_get_contents($_POST['image']));
//        $ext = getExtension(mime_content_type('temporary.png'));
//        file_put_contents('temporary.'.$ext,file_get_contents('temporary.png'));
//        $resizeObj = new resize('temporary.'.$ext);
//        $resizeObj -> resizeImage(600, 600, 0);
//        $resizeObj -> saveImage('data/products/'.$_POST['categoryid'].$brandid.$_POST['name'].'.'.$ext, 100);
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
tax = ?,
buy_price = ?,
taxedbuy_price = ?
");
        $insert = $query->execute(array(
            $_POST['name'], "/veliogullari/data/products/".$_POST['categoryid'].$brandid.$_POST['name'].'.png', $_POST['description'],
            $_POST['barcode'],$_POST['price'],0,0,$_POST['quantity'],$brandid,$_POST['categoryid'],$slug,$_POST['tax'],$_POST['buyprice'],
            $_POST['taxedbuyprice']
        ));
        if ( $insert ){
            $last_id = $db->lastInsertId();
            print "Başarılı";
        }
        else{
            print "ürün ekleme hatası";
            print_r($db->errorInfo());
        }
    }
    else{
        print "marka ekleme hatası1";
        print_r($db->errorInfo());
    }
}
if ($_POST['process']==2){
    $query = $db->prepare("INSERT INTO categories SET
name = ?");
    $insert = $query->execute(array(
        $_POST['categoryname']
    ));
    if ($insert){
       $categoryid = $db->lastInsertId();
        $query = $db->prepare("INSERT INTO brands SET
name = ?,
category_id = ?");
        $insert = $query->execute(array(
            $_POST['brandname'],$categoryid
        ));
        if ($insert){
            $brandid = $db->lastInsertId();
//            file_put_contents("temporary.png",file_get_contents($_POST['image']));
//            $ext = getExtension(mime_content_type('temporary.png'));
//            file_put_contents('temporary.'.$ext,file_get_contents('temporary.png'));
//            $resizeObj = new resize('temporary.'.$ext);
//            $resizeObj -> resizeImage(600, 600, 0);
//            $resizeObj -> saveImage('data/products/'.$categoryid.$brandid.$_POST['name'].'.'.$ext, 100);
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
tax = ?,
buy_price = ?,
taxedbuy_price = ?
");
            $insert = $query->execute(array(
                $_POST['name'], "/veliogullari/data/products/".$categoryid.$brandid.$_POST['name'].'.png', $_POST['description'],
                $_POST['barcode'],$_POST['price'],0,0,$_POST['quantity'],$brandid,$categoryid,$slug,$_POST['tax'],$_POST['buyprice'],
                $_POST['taxedbuyprice']
            ));
            if ( $insert ){
                $last_id = $db->lastInsertId();
                print "Başarılı";
            }
            else{
                print "ürün ekleme hatası";
                print_r($db->errorInfo());
            }
        }
        else{
            print "marka ekleme hatası";
            print_r($db->errorInfo());
        }
    }
    else{
        print "kategori ekleme hatası";
        print_r($db->errorInfo());
    }
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