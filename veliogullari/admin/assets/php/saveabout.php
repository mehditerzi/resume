<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$query = $db->prepare("UPDATE about SET
content = ? WHERE 
id = 1");
$insert = $query->execute(array(
    $_POST['content']
));
if ( $insert ){
    print "işlem başarılı!";
}