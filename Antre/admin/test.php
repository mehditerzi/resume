<?php
error_reporting(0);
require_once "script/pdocrud.php";

$pdocrud = new PDOCrud(false, "pure", "pure");
$pdocrud->fieldTypes("image", "image");
$pdocrud->colRename("image", "Resim");
$pdocrud->colRename("title", "Başlık");
$pdocrud->colRename("undertitle", "Altbaşlık");
$pdocrud->colRename("text", "Açıklama");
$pdocrud->colRename("leftbtn_text", "Sol Buton Yazısı");
$pdocrud->colRename("leftbtn_link", "Sol Buton Linki");
$pdocrud->colRename("rightbtn_text", "Sağ Buton Yazısı");
$pdocrud->colRename("rightbtn_link", "Sağ Buton Linki");


$pdocrud->fieldRenameLable("image", "Resim");
$pdocrud->fieldRenameLable("title", "Başlık");
$pdocrud->fieldRenameLable("undertitle", "Altbaşlık");
$pdocrud->fieldRenameLable("text", "Açıklama");
$pdocrud->fieldRenameLable("leftbtn_text", "Sol Buton Yazısı");
$pdocrud->fieldRenameLable("leftbtn_link", "Sol Buton Linki");
$pdocrud->fieldRenameLable("rightbtn_text", "Sağ Buton Yazısı");
$pdocrud->fieldRenameLable("rightbtn_link", "Sağ Buton Linki");
echo $pdocrud->dbTable("sliders")->render();
?>