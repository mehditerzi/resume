<?php
$id = $_POST['id'];
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$data=[];
$query = $db->prepare("SELECT * FROM brands WHERE category_id= '{$id}'");
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
print $json;
?>