<?php
session_start();
$array = $_SESSION['cart'];
unset($array[$_POST['id']]);
$_SESSION['cart']=$array;
?>
