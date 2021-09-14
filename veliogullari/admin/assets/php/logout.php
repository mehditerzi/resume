<?php
session_start();
session_destroy();
header('Location: /obrien/admin/login.php');
?>