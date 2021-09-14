<?php

try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
} catch (PDOException $e) {
    print $e->getMessage();
}
$query=$db->prepare("INSERT INTO brands SET
name = ?,
category_id = ?");
$insert=$query->execute(array(
    $_POST['name'],$_POST['categoryid']
));
if($insert){
    print "işlem başarılı!";
}
?>