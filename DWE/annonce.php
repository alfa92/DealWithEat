 <?php session_start() ;

 ini_set('display_errors','on');
error_reporting(E_ALL);
?>
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
        <form method="POST" action="#">
            
        <h4> Types </h4>
            <input type="radio" name="FruitLegume" value="0" /><label for="Fruit">Fruit</label><br/>
            <input type="radio" name="FruitLegume"  value="1"/><label for="Légume">Légume</label><br/>
        
        <h4> Produits </h4>
                  <div id="liste_annonces">


                    <label for="prix:"> Prix:<input name="prix" type="range" min="0" max="100" value="0" oninput="document.getElementById('prix').textContent=value" />
                        <span id="prix">0</span> </label> <br/>
                    <label for="quantite:"> Quantité:<input name="quantite" type="range" min="0" max="100" value="0" oninput="document.getElementById('quantite').textContent=value" />
                        <span id="quantite">0</span> </label> <br/>    
                    
                        
                     <label class ="echangeok"for ="echangeok"> Type de transaction : </label> <br/>
                     <input  type="radio" name="echangeok" value="0" id="vente" /> <label for="legume">Vente</label>
                     <input  type="radio" name="echangeok" value="1" id="echange" /> <label for="fruit">Echange</label><br />
                         
                                          
                  </div>
        <h4>  Produits Biologiques </h4>
              
                    <input type="radio" name="BioPeuImporte" value="0" /> <label for="Bio">Bio</label><br/>
                    <input type="radio" name="BioPeuImporte" value="1" /> <label for="PeuImporte">Peu importe</label><br/> </br>
                    <center><input type='submit' name='filtre' value='Filtrer'  > </center>
        </form>
    </div>
        
    
            <div style="margin-top:0;" id="droite_annonce"> 
<<<<<<< Updated upstream
                
=======
                <?php include('slider.php'); ?>

>>>>>>> Stashed changes
<?php


if(isset($_POST['BioPeuImporte'])){
  $BioPeuImporte=$_POST['BioPeuImporte'];
}
if(isset($_POST['echangeok'])){
$echangeok=$_POST['echangeok'];
}
if(isset($_POST['FruitLegume'])){
$FruitLegume=$_POST['FruitLegume'];
}


$product_req = NULL;
if(empty($_POST['filtre'])){

  $product_req=$bdd2->query('SELECT * FROM Annonce');

}elseif(isset($_POST['filtre']) && !isset($BioPeuImporte) && !isset($echangeok) &&  !isset($FruitLegume)){

echo "Veuillez choisir au moins un critère et recommencez SVP";

}elseif(isset($_POST['filtre']) && isset($FruitLegume)){

 $product_req=$bdd2->query('SELECT * FROM Produit WHERE PR_type="'.$FruitLegume.'"');
  
 }elseif(isset($_POST['filtre']) && isset($echangeok)){

$product_req=$bdd2->query('SELECT * FROM Annonce WHERE PR_type="'.$echangeok.'"');
   
 }elseif(isset($_POST['filtre']) && isset($BioPeuImporte)){

$product_req=$bdd2->query('SELECT * FROM Annonce WHERE PR_type="'.$BioPeuImporte.'"');
   
}
      $products =  $product_req->fetchAll();
      foreach($products as $product) {
       $nom=$bdd2->query('SELECT PR_nom FROM Produit WHERE PR_idP="'.$product['PR_idP'].'"');
        $req=$nom->fetch(); 
?>        
      


        <div id="article_annonce">
            <form id="panier" method="post" action="annonce.php">

<<<<<<< Updated upstream
                  <h1 > 
                  <a href="produit.php?q=<?= $products['AN_idAnnonce']; ?>"><?= $req['PR_nom']; ?></h1> 
                      <h5> Prix : <?= $products['AN_prix']; ?>€/kg</h5> 
=======
                  <h5 style="text-align:right;border-bottom:1px dashed black;"> 
                  <a href="produit.php?q=<?= $product['AN_idAnnonce']; ?>"><?= $req['PR_nom']; ?></h5></a>
                      <p> <?php echo $product['AN_description']; ?> </p>
              
>>>>>>> Stashed changes
                
                <?php if($product['AN_image'] == NULL){ ?>
              <img id="image_article" src="imageproduit/<?php echo $req['PR_idP'] ?>.jpg">
                <?php }else{ ?>
                 <img id="image_article" src="<?=  $products['AN_image'] ?>">
                <?php }?>
                <div id="info_produit">
<<<<<<< Updated upstream
                      <i>Quantité disponible : <?php echo $products['AN_quantite']; ?> kg </i>
                </div></a>  
=======
                      <h5> Prix : <?= $product['AN_prix']; ?>€/kg</h5> 
                </div>
>>>>>>> Stashed changes


                <a id="ajout_panier"  href="panier/addpanier.php?id=<?= $products['AN_idAnnonce']; ?>"> 
                <img id="div_ajout_panier" src="css/images/addpanier.png" width="40" height="40">  </a> <br>
                
                    
                
            </form>
        </div>
  
<?php
     }  
?>

     </div>
</body>
    <?php include('php/pied_de_page.php'); ?>
    
</html>