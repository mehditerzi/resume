<?php
session_start();
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$username = $_POST['mail'];
$password = $_POST['password'];
$query = $db->query("SELECT * FROM users WHERE mail = '{$username}' AND password= '{$password}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
    $_SESSION['login'] = 1;
    if ($_POST['rememberme'] == "true"){
        setcookie('mail',$query['mail'],time() + (86400 * 30),"/");
    }
    $update = $db->query("UPDATE users SET login = 1 WHERE id=".$query['id']);
    $_SESSION['cart']=array();
    $_SESSION['remember'] = $_POST['rememberme'];
    $_SESSION['firstname'] = $query['firstname'];
    $_SESSION['lastname']=$query['surname'];
    $_SESSION['loginid']= $query['id'];
    $_SESSION['password']= $query['password'];
    $_SESSION['mail']= $query['mail'];
    header("location: /index");
}
else{
    header("location: /login?password=wrong");
}
?>