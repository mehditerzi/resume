<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$query = $db->prepare("UPDATE users SET
firstname = ?,
surname = ?,
mail = ?,
password = ?
WHERE id = ?");
$insert = $query->execute(array(
    $_POST['name'],$_POST['surname'],$_POST['mail'],$_POST['password'],$_POST['id']
));
if ( $insert ){
    print "işlem başarılı!";
}