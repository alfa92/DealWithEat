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
<div id="produit_info">
<?php

			
			$q=$_GET['q'];

			$req=$bdd2->query('SELECT * FROM Annonce WHERE PR_idP="'.$q.'"');
			$rows=$req->fetch();
            $req1=$bdd2->query('SELECT * FROM Produit WHERE PR_idP="'.$q.'" ');
            $rows1=$req1->fetch();
            $req2=$bdd2->query('SELECT * FROM User WHERE US_idUser="'.$rows['US_idUserannonceur'].'" ');
            $rows2=$req2->fetch();


		$nom=$rows1['PR_nom']; $membre=$rows2['US_pseudo'];$prix=$rows['AN_prix'];$quantite=$rows['AN_quantite'];

			?>	Nom du produit : <?= $nom ?> <br>
                Nom du membre : <?= $membre ?> <br>
                Prix du produit : <?= $prix ?> <br>
                Quantitée : <?= $quantite ?> <br> </a>
	<?php

?>
</div>