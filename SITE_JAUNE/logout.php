<?php
session_start();
$loginok=false;
session_destroy();
header('location: accueil.php');
exit;
?>