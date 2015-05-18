<?php session_start() ;


?>
<html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    <header>
        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
        <?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){
            include('nav_connect.php');}else{
            include('nav.php');} ?>
        </header>


    <br>
    <?php


    $ids=array_keys($_SESSION['panier']);
    if(empty($ids)){
        $products=array();
    }else{
    $products=$DB->query('SELECT * FROM Annonce WHERE AN_idAnnonce IN ('.implode(',',$ids).')');
    }

    ?>
    <body id="bodypanier">
        
        
        
    <h1 id="monpanier"> Mon panier </h1>
                                    <h2 > <?= $panier->count(); ?> article<?php if($panier->count()> 1){echo 's';} ?></h2>
        
    <?php    if($panier->count()> 0){ ?>
<p id="continuer" ><a href="annonce.php">Continuer mes achats</a></p>
<br>
        
      
        
<?php 

foreach($products as $products):
       $nom=$bdd2->query('SELECT PR_nom FROM Produit WHERE PR_idP="'.$products->PR_idP.'"');
                    $req=$nom->fetch();    
                    $log=$bdd2->query('SELECT US_pseudo FROM User WHERE US_idUser="'.$products->US_idUserannonceur.'"');
                    $pseudo=$log->fetch();                         
                            
        
        ?>
<section id="panier">
    <img id="imgpanier" src="imageproduit/<?php echo $products->PR_idP; ?>.jpg">
    <div id="descriptionpanier">
    <span id="nom"><?= $req['PR_nom'];?></span><br> 
        <span id="vendeurpro">  <?= $pseudo['US_pseudo'];?></span><br><br>
 <span id="autre"> Quantité disponible <?= $products->AN_quantite;?> kg </span><br>
    <span id="autre"> Récolté le  <?= $products->AN_datepublication;?></span><br>
    <span id="autre"> A consomer avant le <?= $products->AN_datepublication;?></span><br>

    <a id="delproduit" href="panier.php?delPanier=<?= $products->AN_idAnnonce ;?>"> Supprimer du panier </a>

       
    <span id="Prix_unite"> <?= $products->AN_prix;?> €/kg</span>
    <!--span id="quantite"><?= $_SESSION['panier'][$products->AN_idAnnonce];?> kg</span>
    <span id="prixproduit"><?= $products->AN_Prix;?> €</span-->
    </div>
    
    
    
</section >
                
<?php endforeach; ?>
        
    <section id="total">
        <h1> ma commande </h1>
        <div id="macommande">
            <span id="commande"> Sous-total : <?php if(null !== $panier->total()){ echo number_format($panier->total(),2,',',' ');} ?>       € </span><br>
        <span id="commande" style="padding-bottom:30px!important;border-bottom:2px dotted black;"> Prix de transport ou envoi : <?= $products->AN_prixcolis; ?>   € </span>
            <br>
            <br>
            <br>
            <span style="padding-top:30px!important;margin-left:50%;">Total : <strong><?= number_format($panier->total(),2,',',' ')+$products->AN_prixcolis; ?> € </strong></span>
            
        </div>
        
    </section>
        
        <?php }else{
        ?> <center><p> Vous n'avez pas de produit dans votre panier, vous pouvez ajouter des produits via la page <a style="border-bottom:1px dotted gray;" href="annonce.php"> annonce </a></p></center> <?php  } ?>

<br>
</body>

</html>
        
    