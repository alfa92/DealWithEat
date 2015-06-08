<?php

/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/

//On se connecte a la base de donnee

$conn2=mysqli_connect('localhost', 'root', 'root','dwe');
try{
		$bdd2 = new PDO('mysql:host=localhost;dbname=dwe;charset=utf8', 'root', 'root');
		$bdd2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
}

mysqli_set_charset($conn2,"UTF8");


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