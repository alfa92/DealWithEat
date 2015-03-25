<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 25/03/15
 * Time: 10:50
 */

?>
<html>
<head>
    <meta charset=UTF-8>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>

    <title>Deal With Eat</title>

</head>
<div id="body">
    <div id="principal">
        <header>
            <?php include('php/config.php'); ?>
            <?php include('php/connexion.php'); ?>
            <?php include('php/header.php'); ?>
            <?php if (isset($_SESSION['id']) && $_SESSION['id'] == '1') {
                include('nav_connect.php');
            } else {
                include('nav.php');
            } ?>


        </header>
        <body>
        <h1 id="FAQh1" style="border-bottom:2px dotted gray;width:90%;"> Contacter nous </h1>

        <form id="formmail" style="width:60%;">
            <input type="radio" name="x" value="un"><label style="width: 200px;" for="probl"> Problème</label>
            <br>
            <input type="radio" name="x" value="deux"><label style="width: 200px;" for="suggest"> Suggestion</label>
            <br>

            <label for="sujetmail"><i> Thème du mail </i></label>
            <select name="sujetmail1">
                <option>Problèmes inscription</option>
                <option>Problèmes payement</option>
                <option>Problèmes echange</option>
                <option>Problèmes autres</option>
            </select>
            <br>
            <label for="suggestion"><i> Si il y a suggestion choisissez le thème de la suggestion </i></label>
            <select name="suggestion">
                <option>Amélioration vendeur</option>

            </select>
            <br>
            <br>
            <input name="titre_mail" placeholder="Sujet de mail" required/>
            <br>
            <br>
            <textarea placeholder="Contenu du mail" rows="10" cols="100"></textarea>
            <br>
            <center><input type="submit" value="Envoyer le mail"></center>
        </form>

        </body>

        <?php include('php/pied_de_page.php'); ?>


</html>