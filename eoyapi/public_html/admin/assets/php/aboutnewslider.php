<?php
require "db.php";
$query = $db->prepare("INSERT INTO about_slides SET
header = ?,
subheader = ?");
$insert = $query->execute(array(
    $_POST['header'], $_POST['subheader']
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "Slider başarıyla oluşturuldu!";
}else{
    print "Bir hata oluştu!";
}
