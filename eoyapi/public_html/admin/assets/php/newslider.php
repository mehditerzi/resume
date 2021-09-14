<?php
require "db.php";
if (move_uploaded_file($_FILES['image']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/uploads/".$_POST['header'].$_FILES['image']['name'])){
    $img="/uploads/".$_POST['header'].$_FILES['image']['name'];
}
else{
    die("Dosya hatalı veya yükleme sorunu!");
}
$query = $db->prepare("INSERT INTO slider SET
header = ?,
subheader = ?,
buttontext = ?,
buttonlink = ?,
image = ?");
$insert = $query->execute(array(
    $_POST['header'], $_POST['subheader'], $_POST['buttontext'],$_POST['buttonlink'],$img
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "Slider başarıyla oluşturuldu!";
}
