<?php
$id = $_POST['id'];
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$data=[];
$query = $db->prepare("SELECT * FROM districts WHERE city_id= '{$id}'");
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
print $json;
//if ( $query->rowCount() ){
//    foreach( $query as $row ){
//        $data .= array('id'=>$row['id'],'name'=>$row['name']);
//    }
//    print json_encode($data,JSON_UNESCAPED_UNICODE);
//}
?>