<?php 
require '_header.php';
?>
<html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
<?php
    if(isset($_GET['id'])){
        $product = $DB->query('SELECT AN_idAnnonce FROM Annonce WHERE AN_idAnnonce="'.$_GET['id'].'"');
        if(empty($product)){
            die ("Ce produit n'existe pas");
        }

        $panier->add($product[0]->AN_idAnnonce);

        echo 'Le produit a été ajouté à votre panier <a href="javascript:history.back()"> Retourner sur le catalogue</a>';?>
    <p><a href="../panier.php"> Voir son panier </a></p>
<?php

    }else{
        echo("Vous n'avez pas séléctionner de produit à ajouter au panier");
    }

    ?>
    </html>