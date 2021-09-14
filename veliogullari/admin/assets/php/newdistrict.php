<?php

try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
} catch (PDOException $e) {
    print $e->getMessage();
}
$query=$db->prepare("INSERT INTO districts SET
name = ?,
city_id = ?");
$insert=$query->execute(array(
    $_POST['name'],$_POST['cityid']
));
if($insert){
    print "işlem başarılı!";
}
?>