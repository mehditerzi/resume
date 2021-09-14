<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$query = $db->prepare("DELETE FROM products WHERE 
id = :secilmissatir");
$insert = $query->execute(array(
    'secilmissatir' => $_POST['id']
));
if ( $insert ){
    print "işlem başarılı!";
}
?>