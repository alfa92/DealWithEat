<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 24/03/15
 * Time: 20:59
 */

?>
    <html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>

        <title>Deal With Eat</title>
    </head>
    <header>
        <?php include('../php/config.php'); ?>

    </header>
    <body>
    <a href="adminmembre.php">
        <h1> Interface Administrateur </h1>

        <h2> Ici vous pouvez voir et modifier le site et ses données ( membres, annonces, forum, faq, actualités).</h2>
    </a>
    <hr>
    <div id="navcontainer">
        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="#"> Membres </a></li>
                <li><a href="#"> Annonces </a></li>
                <li><a href="#"> Forum </a></li>
                <li><a href="adminfaq.php"> FAQ </a></li>
                <li><a href="#"> Actualités</a></li>
                <li><a href="../accueil.php"> Retour sur le site</a></li>
            </ul>
        </nav>

        <hr>

        <h1> Vous pouvez ici mettre en ligne des post sur la FAQ</h1>

        <h2> Il vous suffit de remplir le forumlaire ci-dessous</h2>

        <form name="postfaq" method="post">
            <label for="Emplacement">Choisissez l'emplacement du sujet </label>
            <select name="Emplacement">
                <option> - - - - - - -</option>
                <option>Questions populaires</option>
                <option>Réglement</option>
                <option>Inscription</option>
                <option>Connexion</option>
                <option>Achat - Vente - Echange</option>
            </select>
            <br>
            <input name="titre" placeholder="Saisir le sujet"/>
            <br>
            <textarea name="reponse" placeholder="Veuillez saisir la réponse au sujet mentionné plus haut" cols="55"
                      rows="8"></textarea>
            <br>
            <input type="submit" value="Poster la sujet">
        </form>

    <?php

        $reqmlf = "INSERT INTO FAQ VALUES ('', '" . $_POST['Emplacement'] . "', '" . $_POST['titre'] . "' , '" . $_POST['reponse'] . "' )";


    $db = mysqli_query($conn1, $reqmlf) or die('Erreur SQL !' . $reqmlf . '<br>' . mysql_error());
?>