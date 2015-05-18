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
        <?php require('php/header.php'); ?>


        <?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 

        
<body>
    <div id="gauche_annonce">
        <form method="POST">
            
        <h4> Types </h4>
            <input type="radio" name="FruitLegume" value="Fruit" /><label for="Fruit">Fruit</label><br/>
            <input type="radio" name="FruitLegume"  value="Legume"/><label for="Légume">Légume</label>
        
        <h4> Produits </h4>
                  <div id="liste_annonces">
                         
                                          
                  </div>
        <h4>  Produits Biologiques </h4>
              
                    <input type="radio" name="BioPeuImporte" value="Bio" /> <label for="Bio">Bio</label><br/>
                    <input type="radio" name="BioPeuImporte" value="PeuImporte" /> <label for="PeuImporte">Peu importe</label><br/> </br>
                    <center><input type='submit' name='Filtre' value='Fitlrer'  > </center>
        </form>
    </div>
        
    <div id="droite_annonce">
        
        
<?php

  
  $products=$bdd2->query('SELECT * FROM Annonce');
      foreach($products as $products):
       $nom=$bdd2->query('SELECT PR_nom FROM Produit WHERE PR_idP="'.$products['PR_idP'].'"');
        $req=$nom->fetch();
?>
        <div id="article_annonce">
            <form id="panier" method="post" action="annonce.php">

                  <h5 style="text-align:right;border-bottom:1px dashed black;"> 
                  <a href="produit.php?q=<?= $products['PR_idP']; ?>"><?= $req['PR_nom']; ?></h5></a>
                      <p> <?php echo $products['AN_description']; ?> </p>
              
              <img id="image_article" src="imageproduit/<?php echo $products['PR_idP'] ?>.jpg">
                
                <div id="info_produit">
                      <h5> Prix : <?php echo $products['AN_prix']; ?>€/kg</h5> 
                </div>


                <a id="ajout_panier"  href="panier/addpanier.php?id=<?= $products['AN_idAnnonce']; ?>">
                <div id="div_ajout_panier"> Ajouter au panier </a><br>
                    <i>Quantité disponible : <?php echo $products['AN_quantite']; ?> kg </i>

                    
                </div>
            </form>
        </div>
  
<?php
     endforeach;   
?>

     </div>
</body>
    <?php include('php/pied_de_page.php'); ?>
    
</html>
