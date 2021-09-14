<?php
require "db.php";
$query = $db->prepare("DELETE FROM projects WHERE id = :id");
$delete = $query->execute(array(
    'id' => $_POST['id']
));
if ($delete){
    print "Silme işlemi başarılı!\r";
    $query = $db->prepare("DELETE FROM project_images WHERE project_id = :id");
    $delete = $query->execute(array(
        'id' => $_POST['id']
    ));
    if ($delete){
        print "Projeye ait slaytlar da silindi!";
    }
    else{
        print "Bir hata oluştu!";
    }
}
else{
    print "Bir hata oluştu!";
}
