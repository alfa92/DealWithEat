<?php session_start() ?>
<html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    
<div id="principal">
    <header>
        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['login']) && $_SESSION['login']=='Alfa59'){include('nav_connect.php');}else{include('nav.php');} ?> 
        
        <?php

if(isset($_POST['deconnexion'])){

// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();
    
// On redirige le visiteur vers la page d'accueil
    ?>
<script LANGUAGE="JavaScript"> 
document.location.href="accueil.php" 
    
</script>
<?php }

?>

<form method=post>
    <input type="submit" name="deconnexion" value="Se déconnecter">
</form>
        
        <a href="accueil.php"> Retour à l'accueil </a>