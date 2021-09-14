<?php
session_start();
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}

$query = $db->prepare("INSERT INTO newsletter SET
mail = ?");
$insert = $query->execute(array(
    $_POST['mail']
));
if ($insert){
    $_SESSION['newsletter']=1;
    header("location:/index");
}
else{
    print "hata oluştu";
}