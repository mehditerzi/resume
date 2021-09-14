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
mail = ?
WHERE id = ?");
$insert = $query->execute(array(
    $_POST['name'],$_POST['last'],$_POST['mail'],$_POST['id']
));
if ( $insert ){
    print "işlem başarılı!";
}