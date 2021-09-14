<?php

try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
} catch (PDOException $e) {
    print $e->getMessage();
}
if($_POST['filestat'] == 0){
    $img=$_POST['image'];
} else {
    $path=$_FILES['image']['name'];
    $ext=pathinfo($path,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['image']['tmp_name'],'../../../assets/sliders/'.$_POST['id'].'.'.$ext);
    $img = "assets/sliders/".$_POST['id'].'.'.$ext;
}
$query=$db->prepare("INSERT INTO sliders SET
title = ?,
text = ?,
image = ?,
button_text = ?,
button_link = ?");
$insert=$query->execute(array(
    $_POST['title'],$_POST['text'],$img,$_POST['btntext'],$_POST['btnlink']
));
if($insert){
    print "işlem başarılı!";
}
?>