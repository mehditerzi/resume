<?php
session_start();
$array = $_SESSION['cart'];
$array[$_POST['id']] = $_POST['qty'];
$_SESSION['cart']=$array;
?>
