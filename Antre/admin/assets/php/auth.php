<?php
session_start();
try {
    $db=new PDO("mysql:host=localhost;dbname=antredesign;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$username = $_POST['username'];
$password = $_POST['password'];
$query = $db->query("SELECT * FROM users WHERE username = '{$username}' AND password= '{$password}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
    $_SESSION['adminlogin'] = 1;
    $_SESSION['adminloginid']= $query['id'];
    $_SESSION['adminusername']= $query['username'];
    $_SESSION['adminpassword']= $query['password'];
    $_SESSION['adminmail']= $query['mail'];
    print "1";
}
else{
    print "0";
}
?>
