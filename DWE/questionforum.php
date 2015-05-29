<?php session_start() ;?>
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
        <?php include('php/header.php'); ?>
        <?php include('php/connexion.php'); ?>
  <?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?>
    
    </header>
        <body>
        <form id="forum_q" method="post">
        <?php 
            if($_SESSION['id']>0){
         ?>   
         <h3> Poster un article </h3>
            <input class="inputq" type="text" id="q_sujet" name="q_sujet" placeholder="Sujet" required/><br>
            <textarea cols="20" rows="7" class="inputq" type="text" id="q_contenu" name="q_contenu" placeholder="Question"  required/></textarea><br>
            <input  type="submit" id="sub_q" name="sub_q" value="Envoyer sur le forum"   />
        </form>

      <?php

        $date = date("Y-m-d");
if(isset($_POST['sub_q'])){
        if(isset($_SESSION['login'])){
          $pseudo=$_SESSION['login'];
        }
        if(isset($_POST['q_sujet'])){
          $sujet=$_POST['q_sujet'];
        }
        if(isset($_POST['q_contenu'])){
          $contenu=$_POST['q_contenu'];
        }

        
          echo ' '.$pseudo.' votre question ayant pour sujet '.$sujet.' est en ligne il vous suffit de cliquer sur le lien si dessous pour le voir ';
           $sql='INSERT INTO forumq VALUES ("","'.$date.'","'.$pseudo.'","'.$sujet.'", "'.$contenu.'")';
        
        $req=$bdd2->query($sql);

        } ?> <br />
        <a style="margin-left:60%;font-size:16px;border-bottom:1px dashed red;" href="forum.php"> Vers le forum </a>

<?php }else{ ?>
<p> Vous ne pouvez pas poster d'article si vous n'êtes pas inscrit et/ou connecté, merci de vous connectez ou de vous inscrire afin de poster un sujet </p> 
  
<section id="user">
        <div id="user_presentation">
        <a href="Inscription.php"> <h1> Inscrivez-vous </h1> 
        <p> Vous pouvez vous inscrire sur notre site pour accéder à plus de fonctionnalités. </p>
            </div>
    <div class="user">
        <img class="imguser" src="css/images/membre_lite.png" />
        <h2>Inscription lite</h2>
        <p> L'inscription lite, ou inscription rapide est une inscription dans laquelle seul un mail, un pseudo et un mot de passe vous sont demandés. Cette incription vous donne la place de membre lite. Un membre lite peut accéder au site internet dans son intégralité mais ne peux ni acheter, ni echanger, ni vendre des produits. Il pourrat ajouter des produits dans son panier mais pour finaliser sa commande il lui sera demander de finaliser son inscription.</p>
    </div>
    <div class="user">
        <img class="imguser" src="css/images/membre_plus.png" />
        <h2>Inscription complète</h2>
        <p> L'inscription complète vous demande plus d'information comme votre adresse, votre nom etc... Lorsque vous obtenez le grade de membre complet vous pouvez alors vendre, acheter et echanger comme bon vous semble. De plus vous pourrez poster des commentaires sur les profils des autres membres. </p>
    </div></a>
        </section>
         <?php } ?>
        </body>
        </div>
        <?php include('php/pied_de_page.php'); ?>
</html>
