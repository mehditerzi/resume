<?php
$path = $_FILES['image']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
move_uploaded_file($_FILES['image']['tmp_name'],'../../../assets/sliders/'.'temporary.'.$ext);
print "/veliogullari/assets/sliders/".'temporary.'.$ext;
?>
