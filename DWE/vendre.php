<?php session_start() ?>
<html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    <div id="body">
<div id="principal">
    <header>
        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
			
    
    </header>

        <body>
            
            <h1> Vendre</h1>
            <h2> Pour mettre en vente un produit veuillez remplir le formulaire ci-dessous</h2>
            
          <!-- PHP -->
            <?php 


            ?>
            
            <!-- FORMULAIRE EN HTML -->
            
         </body>
        
    </div>   
        </div>
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>