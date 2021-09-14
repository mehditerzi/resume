<?php
require "db.php";
$query = $db->prepare("INSERT INTO users SET
username = ?,
password = ?,
mail = ? WHERE id = ?");
$insert = $query->execute(array(
    $_POST['username'], $_POST['password'], $_POST['mail'],$_POST['id']
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "Kullanıcı başarıyla güncellendi!";
}
