<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$query = $db->prepare("UPDATE adresses SET
name = ?,
adress = ?,
phone = ?
WHERE id = ?");
$insert = $query->execute(array(
    $_POST['name'],$_POST['adress'],$_POST['phone'],$_POST['id']
));
if ( $insert ){
    print "işlem başarılı!";
}