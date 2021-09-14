<?php
session_start();
if ($_SESSION['login']!=1){
    print "login";
}
else {
    $items = $_SESSION['cart'];
    if (array_key_exists($_POST['id'], $items)) {
        $items[$_POST['id']]++;
        $_SESSION['cart']=$items;
    } else {
        $items[$_POST['id']] = $_POST['qty'];
        $_SESSION['cart']=$items;
    }
}
?>