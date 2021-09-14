<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$query = $db->prepare("INSERT INTO adresses SET
name = ?,
adress = ?,
phone = ?,
user_id = ?,
city_id = ?,
district_id = ?,
hood_id = ?");
$insert = $query->execute(array(
    $_POST['name'],$_POST['adress'],$_POST['phone'],$_POST['userid'],$_POST['cityid'],$_POST['districtid'],$_POST['hoodid']
));
if ( $insert ){
    print "işlem başarılı!";
}