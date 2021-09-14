<?php
require "db.php";
$query = $db->prepare("INSERT INTO users SET
username = ?,
password = ?,
mail = ?");
$insert = $query->execute(array(
    $_POST['username'], $_POST['password'], $_POST['mail']
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "Kullanıcı başarıyla oluşturuldu!";
}
