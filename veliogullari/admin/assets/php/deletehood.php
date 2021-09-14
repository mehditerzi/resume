<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$query = $db->prepare("DELETE FROM neighborhoods WHERE 
id = :secilmissatir");
$delete = $query->execute(array(
    'secilmissatir' => $_POST['id']
));
if ($delete){
    print "işlem başarılı!";
}