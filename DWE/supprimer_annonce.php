<?php session_start(); 
include('php/config.php');?>


<html>

<head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>

<header>
        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
    <?php 
    if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
      
    
    </header>

<?php 

$req=$bdd2->prepare('DELETE FROM Annonce WHERE AN_idAnnonce=:idAnnonce');
$req->execute(array(
	'idAnnonce'=>$_GET['id']

	));

	echo " Votre annonce vient d'être supprimé ";


?>



</html>














