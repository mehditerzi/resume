<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$query = $db->prepare("DELETE FROM categories WHERE 
id = :secilmissatir");
$insert = $query->execute(array(
    'secilmissatir' => $_POST['id']
));
$query = $db->prepare("DELETE FROM brands WHERE 
category_id = :secilmissatir");
$delete = $query->execute(array(
    'secilmissatir' => $_POST['id']
));
if ( $insert && $delete){
    print "işlem başarılı!";
}