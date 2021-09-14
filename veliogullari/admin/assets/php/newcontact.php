<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$query = $db->prepare("INSERT INTO contact SET
branch_name = ?,
adress = ?,
phone = ?,
mail = ?");
$insert = $query->execute(array(
    $_POST['name'],$_POST['adress'],$_POST['phone'],$_POST['mail']
));
if ( $insert ){
    print "işlem başarılı!";
}