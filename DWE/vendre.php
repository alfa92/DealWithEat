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




            <?php session_start() ?>








<?php 

/*création du formulaire pour l'upload d'image*/
?>


<form method="post" action="annonce.php" enctype="multipart/form-data">
           Veuillez indiquer si vous vendez des fruits ou des légumes:<br />

     <input type="radio" name="TypeProduit" value="fruit" id="fruit" /> <label for="fruit">fruit</label><br />
     <input type="radio" name="TypeProduit" value="legume" id="legume" /> <label for="legume">légume</label><br /> <br/>


     <label for="icone">Icône du produit  (JPG, PNG ou GIF | max. 15 Ko) :</label><br />
     <input type="file" name="icone" id="icone" /><br /> <br />

     <label for="mon_fichier">Fichier (tous formats | max. 1 Mo) :</label><br />
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input type="file" name="mon_fichier" id="mon_fichier" /><br /><br />

     <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     <input type="text" name="titre" value="" id="titre" /><br /><br />

     <label for="description">Description de votre fichier (max. 255 caractères) :</label><br />
     <textarea name="description" id="description"></textarea><br />
     <input type="submit" name="submit" value="Envoyer" />
</form>






 
            
         </body>
        
    </div>   
        </div>
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>