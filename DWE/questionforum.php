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
        <form id="forum_q" method="get">
            <input class="inputq" type="text" id="q_pseudo" name="q_pseudo" placeholder="Pseudo" required/><br>
            <input class="inputq" type="text" id="q_sujet" name="q_sujet" placeholder="Sujet" required/><br>
            <textarea class="inputq" type="text" id="q_contenu" name="q_contenu" placeholder="Question" required/></textarea><br>
            <input type="submit" id="sub_q" name="sub_q" value="Envoyer sur le forum" >
        </form>

      <?php 

        $date = date("Y-m-d");
if(isset($_GET['sub_q'])){
        if(isset($_GET['q_pseudo'])){
          $login=$_GET['q_pseudo'];
        }
        if(isset($_GET['q_sujet'])){
          $sujet=$_GET['q_sujet'];
        }
        if(isset($_GET['q_pseudo'])){
          $contenu=$_GET['q_contenu'];
        }

        
          echo 'Votre pseudo : '.$login.'<br> Sujet de votre message : '.$sujet.'<br> Contenu de votre message : '.$contenu.' ';
           $sql='INSERT INTO forumQ VALUES ("","'.$sujet.'", "'.$contenu.'","'.$date.'","'.$login.'")';
        $req=$bdd->query($sql);
        }

       



      ?>


   
        </body>
</html>
