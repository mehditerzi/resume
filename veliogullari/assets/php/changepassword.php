<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
if ($_POST['new'] == $_POST['confirm']){
    $query = $db->query("SELECT * FROM users WHERE id = '{$_POST['id']}'")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
        if (isset($_POST['stat'])||$_POST['stat']=="forgot"){
            $current = $query['password'];
            }
        else{
            $current = $_POST['current'];
        }
        if ($query['password'] == $current){
            $query = $db->prepare("UPDATE users SET
password = ?
WHERE id = ?");
            $insert = $query->execute(array(
                $_POST['new'],$_POST['id']
            ));
            if ($insert){
                print "İşlem Başarılı!";
            }
        }
        else{
            print "Girilen şifre yanlış!";
        }
    }
}
else {
    print "Şifreler birbiriyle uyuşmuyor!";
}