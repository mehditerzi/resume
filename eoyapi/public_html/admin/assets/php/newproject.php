<?php
require "db.php";
if (move_uploaded_file($_FILES['image']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/uploads/".$_POST['name'].$_FILES['image']['name'])){
    $img="/uploads/".$_POST['name'].$_FILES['image']['name'];
}
else{
    die("Dosya hatalı veya yükleme sorunu!");
}
$query = $db->prepare("INSERT INTO projects SET
name = ?,
text = ?,
location = ?,
category = ?,
date = ?,
count = ?,
image = ?");
$insert = $query->execute(array(
    $_POST['name'],$_POST['text'], $_POST['location'],$_POST['category'],$_POST['date'],$_POST['count'],$img
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "Proje başarıyla oluşturuldu!\r";
}
foreach ($_FILES['slides'] as $slide){
    if (move_uploaded_file($slide['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/uploads/".$_POST['name'].$slide['name'])){
        $img="/uploads/".$_POST['name'].$_FILES['image']['name'];
        $query = $db->prepare("INSERT INTO project_images SET
project_id = ?,
image = ?");
        $insert = $query->execute(array(
            $last_id,$img
        ));
        if ( $insert ){
            print $slide['name']." isimli fotoğraf başarıyla yüklendi!!\r";
        }else{
            print $slide['name']." isimli fotoğraf başarıyla yüklendi fakat veritabanına işlenemedi!\r";
        }
    }
    else{
        print($slide['name']." isimli dosya hatalı veya yükleme sorunu!\r");
    }
}