<?php
require "db.php";
$stmt = $db->prepare('SELECT * FROM users where mail = :username AND password = :password');
$stmt->execute( array(':username' => $_POST['mail'],':password' => $_POST['password']) );
if ($stmt->rowCount()){
    session_start();
    foreach ($stmt as $row){
        $_SESSION['login'] = true;
        $_SESSION['username'] = $row['username'];
        print "Giriş Başarılı!";
    }
}else{
    print "Hatalı mail/şifre!";
}