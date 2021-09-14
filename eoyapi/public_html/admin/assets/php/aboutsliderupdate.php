<?php
require "db.php";
$query = $db->prepare("UPDATE about_slides SET
header = ?,
subheader = ? WHERE id = ?");
$insert = $query->execute(array(
    $_POST['header'], $_POST['subheader'],$_POST['id']
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "Slider başarıyla güncellendi!";
}else{
    print "Bir hata oluştu!";
}
