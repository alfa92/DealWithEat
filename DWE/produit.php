<?php session_start(); ?><html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    
<div id="principal">

    <header>
        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 

    </header>

<?php

			
			$q=$_GET['q'];

			$req='SELECT * FROM Produits WHERE Pr_idProduits="'.$q.'"';
			$res=mysqli_query($conn1,$req);


	if($rows=mysqli_fetch_array($res)){
		$nom=$rows['Pr_Nom']; $membre=$rows['Pr_Membre'];$prix=$rows['Pr_Prix'];$quantite=$rows['Pr_Quantité'];

			?>	Nom du produit : <?= $nom ?> <br>
                Nom du membre : <?= $membre ?> <br>
                Prix du produit : <?= $prix ?> <br>
                Quantitée : <?= $quantite ?> <br> </a>
	<?php
}
	
?>