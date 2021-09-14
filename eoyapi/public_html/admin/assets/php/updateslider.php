<?php
require "db.php";
$query = $db->prepare("UPDATE slider SET
header = ?,
subheader = ?,
buttontext = ?,
buttonlink = ?
WHERE id = ?");
$insert = $query->execute(array(
    $_POST['header'], $_POST['subheader'], $_POST['buttontext'],$_POST['buttonlink'],$_POST['id']
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "Slider başarıyla güncellendi!";
}else{
    print "Bir hata oluştu!";
}
