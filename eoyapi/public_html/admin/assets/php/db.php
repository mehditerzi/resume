<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=eoyapi_main;charset=utf8", "eoyapi_admin", "GDstHyKXPZ6T");
} catch ( PDOException $e ){
    print $e->getMessage();
}
?>