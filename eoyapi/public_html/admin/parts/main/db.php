<?php
session_start();
if (!$_SESSION['login']){
    session_destroy();
    header("location: login.php");
}
try {
    $db = new PDO("mysql:host=localhost;dbname=eoyapi_main;charset=utf8", "eoyapi_admin", "GDstHyKXPZ6T");
} catch ( PDOException $e ){
    print $e->getMessage();
}
?>