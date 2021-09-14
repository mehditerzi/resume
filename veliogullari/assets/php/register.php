<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$query = $db->prepare("SELECT * FROM users WHERE mail = ?");
$select = $query->execute(array(
    $_POST['mail']
));
if ( $query->rowCount() == 0 ){
    $query = $db->prepare("INSERT INTO users SET
firstname = ?,
surname = ?,
mail = ?,
password = ?");
    $insert = $query->execute(array(
        $_POST['firstname'], $_POST['lastname'], $_POST['mail'],$_POST['password']
    ));
    if ( $insert ){
        $last_id = $db->lastInsertId();
        if ($_POST['newsletter']){
            $query = $db->prepare("INSERT INTO newsletter SET
mail = ?");
            $insert = $query->execute(array(
                $_POST['mail']
            ));
        }
        header("location: /login");
    }
}
else{
    header("location: /register?error=Bu mail adresi zaten kullanılıyor!");
}
?>