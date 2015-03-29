<?php $expire = 365*24*3600;
setcookie("id",time()+$expire);session_start() ?>
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
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
			
    
    </header>


    <h3>Résultats de votre recherche.</h3>
<?php


$mot = htmlspecialchars($_POST['search']);
$mot = str_replace(' ', '', $mot);

if(isset($_POST['search'])){

    $requete = "SELECT * FROM membres WHERE prenom=" . $mot . "";
    $repse = $bdd1->query($requete);


    while ($donnees = $repse->fetch()) {
        echo 'petit';
        ?>
        <p> <?php $donnees['prenom']; ?></p>

    <?php
    }

    ?>


<br/>
<br/>
<a href="accueil.php">Faire une nouvelle recherche</a></p>
<?php
} // Fini d'afficher les résultats ! Maintenant, nous allons afficher l'éventuelle erreur en cas d'échec de recherche et le formulaire.
else
{ // de nouveau, un peu de HTML
?>
<h3>Pas de résultats</h3>
<p>Nous n'avons trouvé aucun résultat pour votre requête </p>
<?
// Fini d'afficher l'erreur ^^
}  ?>
    
    
