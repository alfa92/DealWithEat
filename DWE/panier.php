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
            <body>
                
                <table id="panier_panier">
                    <img src="css/images/picnic5.png" style="width:60px;position:absolute;margin-top:20px;margin-left:10%;">
                    <center id="panier_titre">Votre Panier </center>
               
                    
                <tr>
                        <th> Produit </th>
                        <th> Quantité </th>
                        <th> Prix unité </th>
                        <th> Prix </th>
                        <th> Actions </th>
                      
                </tr>
                    <?php foreach($products as $products): ?>
                 <tr>
                       <td><img style="width:50px;" src="css/images/<?= $products->Pr_Nom;?>.jpg"><?= $products->Pr_Nom;?></td>
                       <td> <?= $_SESSION['panier'][$products->Pr_idProduits];?></td>
                       <td> <?= $products->Pr_Prix;?> €/kg </td>
                        <td style="color:green;font-weight:500;font-size:22px;"> <?= $products->Pr_Prix;?> €</td>
                     <td><a href="panier.php?delPanier=<?= $products->Pr_idProduits ;?>"> Supprimer </a></td>
                    
                   </tr>
                  <?php endforeach; ?>
                    <tr >
                    <td style="border:none;" colspan=""> </td>
                    </tr>
                    <tr style="border:1px solid black;">
                    <td colspan="2" style="border:1px solid black;"> Prix total</td>
                    <td colspan="4" style="color:red;font-weight:500;font-size:24px;"> <?= number_format($panier->total(),2,',',' '); ?> €</td>
                       
                </tr>
</table>
                
                <div id="panier_dessous">
                    <h2 style="margin-top:20px;"> Retourner faire du shopping </h2>
                    <h2 style="margin-left:80%;"> Payer </h2>
                
                </div>
            </body>


</html>
        
    