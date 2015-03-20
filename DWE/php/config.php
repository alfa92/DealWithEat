<?php


/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/

//On se connecte a la base de donnee
$conn=mysqli_connect('localhost', 'root', 'root','dealwitheat');
$conn1=mysqli_connect('localhost', 'root', 'root','mydb');
mysqli_set_charset($conn1,"UTF8");
$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', 'root');
//Email du webmaster
$mail_webmaster = 'example@example.com';

//Adresse du dossier de la top site
$url_root = 'http://www.example.com/';

/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Nom du fichier de laccueil
$url_home = 'accueil.php';

//Nom du design
$design = 'default';
?>