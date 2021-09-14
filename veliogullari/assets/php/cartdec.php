<?php
session_start();
$array = $_SESSION['cart'];
$array[$_POST['id']]++;
$_SESSION['cart']=$array;
?>
