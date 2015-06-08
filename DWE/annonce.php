<?php session_start(); ?>
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
                    
                        
                     <label class ="echangeok" for ="echangeok"> Type de transaction : </label> <br/>
                     <input  type="radio" name="echangeok" value="0" id="vente" /> <label for="legume">Vente</label> <br/>
                     <input  type="radio" name="echangeok" value="1" id="echange" /> <label for="fruit">Echange</label><br /><br />
                     





                     <label  for ="echangeok"> Trier selon des prix: </label> <br/>
                     <input  type="radio" name="croissant"  /> <label for="croissant">croissants</label> <br/>
                     <input  type="radio"  name="decroissant" /> <label for="decroissant"> décroissants</label><br />
                         
                                           
                                          
                  </div>

        <h4>  Produits Biologiques </h4>
              
                    <input type="radio" name="BioPeuImporte" value="1" /> <label for="Bio">Produits Biologiques</label><br/>
                    <center><input type='submit' name='filtre' value='Filtrer'  > </center>
        </form>
    </div>
        
    
            <div style="margin-top:0;" id="droite_annonce"> 


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
 if(isset($_POST['croissant'])){
$croissant=$_POST['croissant'];
}
if(isset($_POST['decroissant'])){
$decroissant=$_POST['decroissant'];
}




$product_req=NULL;


if(empty($_POST['filtre'])){
    
  $product_req=$bdd2->query('SELECT * FROM Annonce');
    
}elseif(isset($_POST['filtre']) && !isset($BioPeuImporte) && !isset($echangeok) &&  !isset($FruitLegume) && !isset($croissant) && !isset($decroissant) ){
echo "<p> Veuillez choisir au moins un critère et recommencez SVP</p> </br>";

$product_req=$bdd2->query('SELECT * FROM Annonce');
}elseif(isset($_POST['filtre']) && isset($FruitLegume)){

    $product_req=$bdd2->query('SELECT * FROM Annonce WHERE AN_type="'.$FruitLegume.'"');
    
 }elseif(isset($_POST['filtre']) && isset($echangeok)){

$product_req=$bdd2->query('SELECT * FROM Annonce WHERE AN_echangeok="'.$echangeok.'"');
   
 }elseif(isset($_POST['filtre']) && isset($BioPeuImporte)){
 $product_req=$bdd2->query('SELECT * FROM Annonce WHERE AN_bio="'.$BioPeuImporte.'"');
   
}elseif(isset($_POST['filtre']) && isset($croissant)){


$product_req=$bdd2->query('SELECT * FROM Annonce   ORDER BY AN_prix ASC' ) ;

}

elseif(isset($_POST['filtre']) && isset($decroissant)){


$product_req=$bdd2->query('SELECT * FROM Annonce   ORDER BY AN_prix DESC' ) ;

}






      
     // foreach($product_req as $products) {
while($products=$product_req->fetch()){
       $nom=$bdd2->query('SELECT PR_nom,PR_idP FROM Produit WHERE PR_idP="'.$products['PR_idP'].'"');
        $req=$nom->fetch(); 
?>        
      




        <div id="article_annonce">
            <form id="panier" method="post" action="annonce.php">
                  <h1 > 
                  <a href="produit.php?q=<?= $products['AN_idAnnonce']; ?>"><?= $req['PR_nom']; ?></h1> 
                      <h5> Prix : <?= $products['AN_prix']; ?>€/kg</h5> 

                
                <?php  if($products['AN_image'] == NULL){ ?>
              <img id="image_article" src="imageproduit/<?= $req['PR_idP'] ?>.jpg">
                <?php  }else{ ?>
                 <img id="image_article" src="<?=  $products['AN_image'] ?>">
                <?php  }?>
                <div id="info_produit">
                      <i>Quantité disponible : <?php echo $products['AN_quantite']; ?> kg </i>
                </div></a>  


                <a id="ajout_panier"  href="panier/addpanier.php?id=<?= $product['AN_idAnnonce']; ?>">
                <div id="div_ajout_panier"> Ajouter au panier </a><br>

                    
                </div>
            </form>
        </div>
  
<?php
     }  
?>

     </div>
</body>
    <?php include('php/pied_de_page.php'); ?>
    
</html>