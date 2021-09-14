<?php
$mail = $_POST['mail'];
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$data=[];
$query = $db->query("SELECT * FROM users WHERE mail= '{$mail}'")->fetch(PDO::FETCH_ASSOC);
if ($query){
    // create curl resource
    $ch = curl_init();
    $string = $query['id'];
    $pass = '';
    $method = 'aes128';
    $urldata = openssl_encrypt ($string, $method, $pass);
    print $urldata;
    $body = "Şifrenizi yenilemek için <a href='veliogullarimarket.com/resetpassword.php?key=".$urldata."'>buraya tıklayınız..</a>";
    // set url
    curl_setopt($ch, CURLOPT_URL, "https://veliogullarimarket.com/admin/assets/php/sendmail.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "head=Sifre Yenileme&body=".$body);

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);
    if ($output=="1"){
        header("Location: https://veliogullarimarket.com/forgot-password.php?email=sent");
    }
    else{
        header("Location: https://veliogullarimarket.com/forgot-password.php?email=error");
    }
}
else{
    header("Location: https://veliogullarimarket.com/forgot-password.php?email=error");
}
?>