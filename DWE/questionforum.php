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
    <div id="formulairequest">
<form id="form-id" action="#">
<ul>
   <li>
      <label><strong>Pseudo</strong></label>
      <input name="pseudo" type="text" placeholder="ecrivez votre pseudo ici"/>
   </li>

   <li>
      <label><strong>Sujet</strong></label>
      <input  name="sujet" type="text" placeholder="Votre sujet"/>
   </li>
                     
   <li>
      <textarea id="boitemsg" class="cadre" name="boitemsg" placeholder="Ecrivez votre question ici"/></textarea>
   </li>
                     
   <button type="button" id="btnenvoyer"> <a href="probleme1.php">Envoyer</a></button>                     
</ul>
</form>


</div>
   
</body>
</html>
