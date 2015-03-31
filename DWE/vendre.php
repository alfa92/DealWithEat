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
function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{
   //Test1: fichier correctement uploadé
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
   //Test2: taille limite
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
   //Test3: extension
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
   //Déplacement
     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
}
 
//EXEMPLES
  $upload1 = upload('icone','imageUploades/monicone1',15360, array('png','gif','jpg','jpeg') );
  $upload2 = upload('mon_fichier','imageUploades/file112',1048576, FALSE );
 
  if ($upload1) "Upload de l'icone réussi!<br />";
  if ($upload2) "Upload du fichier réussi!<br />";
?>

            
          










            <!-- FORMULAIRE EN HTML -->

<?php 

/*création du formulaire pour l'upload d'image*/
?>

<section>
  <article>
    <form id="FormulaireVendre" method="post" action="annonce.php" enctype="multipart/form-data" name="form1">
               Veuillez indiquer si vous vendez des fruits ou des légumes:<br />

         <input type="radio" name="TypeProduit" value="fruit" id="fruit" /> <label for="fruit">fruit</label><br />
         <input type="radio" name="TypeProduit" value="legume" id="legume" /> <label for="legume">légume</label><br /> <br/>


        <label for="file">Ajouter une photo :</label>
        <input type="file" name="fichier" id="fichier" />
        <input type="submit" name="submit" value="Insérer le fichier" />


  </form>




</article>
</section>





 
            
         </body>
        
    </div>   
        </div>
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>