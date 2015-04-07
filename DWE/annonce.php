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
		    r<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
        
<body>
    <div id="gauche_annonce">
        <form method="POST">
            
        <h4> Types </h4>
            <input type="radio" name="FruitLegume" value="Fruit" /><label for="Fruit">Fruit</label><br/>
            <input type="radio" name="FruitLegume"  value="Legume"/><label for="Légume">Légume</label>
        
        <h4> Produits </h4>
                  <div id="liste_annonces">
                          <input type="checkbox" value="Courgette" name="Produit" /> <label for="Courgette">Courgette</label> <br/>
                          <input type="checkbox" value="Banane" name="Produit" /> <label for="Banane">Banane</label> <br/>
                          <input type="checkbox" value="Choux"  name="Produit"/> <label for="Choux">Choux</label> <br/>
                          <input type="checkbox" value="Fraise" name="Produit" /> <label for="Fraise">Fraise</label> <br/>
                          <input type="checkbox" value="Cerise" name="Produit"/> <label for="Cerise">Cerise</label> <br/>
                          <input type="checkbox" value="Mangue" name="Produit" /> <label for="Mangue">Mangue</label> <br/>
                          <input type="checkbox" value="Banane" name="Produit" /> <label for="Banane">Banane</label> <br/>
                          <input type="checkbox" value="Choux"  name="Produit"/> <label for="Choux">Choux</label> <br/>
                          <input type="checkbox" value="Fraise" name="Produit" /> <label for="Fraise">Fraise</label> <br/>
                          <input type="checkbox" value="Cerise" name="Produit"/> <label for="Cerise">Cerise</label> <br/>
                          <input type="checkbox" value="Mangue" name="Produit" /> <label for="Mangue">Mangue</label> <br/>
                                          
                  </div>
        <h4>  Produits Biologiques </h4>
						    
    						    <input type="radio" name="BioPeuImporte" value="Bio" /> <label for="Bio">Bio</label><br/>
    						    <input type="radio" name="BioPeuImporte" value="PeuImporte" /> <label for="PeuImporte">Peu importe</label><br/> </br>
                    <center><input type='submit' name='Filtre' value='Fitlrer'  > </center>
        </form>
    </div>
        
    <div id="droite_annonce">
        
        <div id="triage_annonce">
             <form id='triage' method="post" action="annonce.php">
                       <select name="TrierPar" id="TrierPar" value="TrierPar">
                            <option value="vendeur">Vendeur</option>
                            <option value="fruit">Fruit</option>
                            <option value="legume">Légume</option>
                            <option value="saison">Saison</option>
                            <option value="ville">Ville</option>
                        </select>
                        <input id="sub_trierpar" type='submit' name='TrierPar' value='Trier'  >
            </form>
        </div>
<?php

  $products = $DB->query('SELECT * FROM produits');
      foreach ($products as $products):
     
?>
        <div id="article_annonce">
            <form id="panier" method="post" action="annonce.php">
                  <h5 style="text-align:right;border-bottom:1px dashed black;"> <?php echo $products->Pr_Nom; ?></h5>
                      <p> <?php echo $products->Pr_Description; ?> </p>
              
              <img id="image_article" src="css/images/<?php echo $products->Pr_Nom; ?>.jpg">
                
                <div id="info_produit">
                      <h5> Prix : <?php echo $products->Pr_Prix; ?>€/kg</h5> 
                      <h5> Echange contre : Produit / Produit / Produit </h5>
                </div>


                <a id="ajout_panier"  href="panier/addpanier.php?id=<?= $products->Pr_idProduits; ?>">
                <div id="div_ajout_panier"> Ajouter au panier </a><br>
                    <i>Quantité disponible : <?php echo $products->Pr_Quantité; ?> kg </i>
                    
                </div>
            </form>
        </div>
  
<?php
     endforeach;   
?>

        <div id="annonces_pages">
           <form id='triage' method="post" action="annonce.php">
             
                 <select name="TrierPar" id="TrierPar" value="TrierPar">
                      <option value="vendeur">Page 1</option>
                      <option value="fruit">Page 2</option>
                      <option value="legume">Page 3</option>
                      <option value="saison">Page 4</option>
                      <option value="ville">Page 5</option>
                  </select>
                  <input id="sub_page" type='submit' name='page' value='Allez à'  >                   
            </form>
        </div>
</body>
    <?php include('php/pied_de_page.php'); ?>
    
</html> 
    

