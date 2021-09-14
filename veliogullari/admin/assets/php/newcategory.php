<?php

try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
} catch (PDOException $e) {
    print $e->getMessage();
}
$query=$db->prepare("INSERT INTO categories SET
name = ?");
$insert=$query->execute(array(
    $_POST['name']
));
if($insert){
    print "işlem başarılı!";
}
?>