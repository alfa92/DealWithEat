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
    $products=$DB->query('SELECT * FROM Produits WHERE Pr_idProduits IN ('.implode(',',$ids).')');
    }

    ?>
    <body id="bodypanier">
        
        
        
    <h1 id="monpanier"> Mon panier </h1>
                                    <h2 > <?= $panier->count(); ?> article<?php if($panier->count()> 1){echo 's';} ?></h2>
        
    <?php    if($panier->count()> 0){ ?>
<p id="continuer" ><a href="annonce.php">Continuer mes achats</a></p>
<br>
        
        
        
<?php foreach($products as $products): ?>
<section id="panier">
    <img id="imgpanier" src="css/images/<?= $products->Pr_Nom;?>.jpg"><br>
    <div id="descriptionpanier">
    <span id="nom"><?= $products->Pr_Nom;?></span><br> 
        <span id="vendeurpro">  <?= $products->Pr_Membre;?></span><br><br>
       
 <span id="autre"> Quantité disponible <?= $products->Pr_Quantité;?> kg </span><br>
    <span id="autre"> Récolté le  <?= $products->Pr_Date_récolte;?></span><br>
    <span id="autre"> A consomer avant le <?= $products->Pr_Date_péremption;?></span><br>

    <a id="delproduit" href="panier.php?delPanier=<?= $products->Pr_idProduits ;?>"> Supprimer du panier </a>

       
    <span id="Prix_unite"> <?= $products->Pr_Prix;?> €/kg</span>
    <span id="quantite"><?= $_SESSION['panier'][$products->Pr_idProduits];?> kg</span>
    <span id="prixproduit"><?= $products->Pr_Prix;?> €</span>
    </div>
    
    
    
</section >
                
<?php endforeach; ?>
        
    <section id="total">
        <h1> ma commande </h1>
        <div id="macommande">
            <span id="commande"> Sous-total : <?php if(null !== $panier->total()){ echo number_format($panier->total(),2,',',' ');} ?>       € </span><br>
        <span id="commande" style="padding-bottom:30px!important;border-bottom:2px dotted black;"> Prix de transport ou envoi : <?= $products->Pr_Prix_Envoi;?>   € </span>
            <br>
            <br>
            <br>
            <span style="padding-top:30px!important;margin-left:50%;">Total : <strong><?= number_format($panier->total(),2,',',' ')+$products->Pr_Prix_Envoi; ?> € </strong></span>
            
        </div>
        
    </section>
        
        <?php }else{
        ?> <center><p> Vous n'avez pas de produit dans votre panier, vous pouvez ajouter des produits via la page <a style="border-bottom:1px dotted gray;" href="annonce.php"> annonce </a></p></center> <?php  } ?>

<br>
</body>



</html>
        
    