<?php
$id = $_POST['id'];
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$query = $db->query("SELECT * FROM sliders WHERE id= '{$id}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
    $data = array($query['title'],$query['text'],$query['image'],$query['button_text'],$query['button_link']);
    print json_encode($data,JSON_UNESCAPED_UNICODE);
}