<?php
require "db.php";
$query = $db->prepare("DELETE FROM users WHERE id = :id");
$delete = $query->execute(array(
    'id' => $_POST['id']
));
if ($delete){
    print "Silme işlemi başarılı!";
}
else{
    print "Bir hata oluştu!";
}
