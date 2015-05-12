<?php $expire = 365*24*3600;
setcookie("id",time()+$expire);session_start() ?>
<html>
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
    <body>
     <?php
                
                $search=$_GET['search'];

            $requetemembre= "select * from user where US_pseudo like '%$search%' 
                                    or US_nom like '%$search%' 
                                        or US_prenom like '%$search%' ";
             $resultatmembre=mysqli_query($conn2,$requetemembre);                            
            $requete= "select * from produits where Pr_Nom like '%$search%' or Pr_Membre like '%$search%' ";
            $resultat=mysqli_query($conn1,$requete); 
    ?>
            

<h1> Résultat de la recherche </h1>
    
<?php 
        while ($rows=mysqli_fetch_array($resultat)) {
            $nom=$rows['Pr_Nom']; $membre=$rows['Pr_Membre'];$prix=$rows['Pr_Prix'];$quantite=$rows['Pr_Quantité'];
?> 
       
               <a href="produit.php?q=<?= $rows['Pr_idProduits']; ?>"> Nom du produit : <?= $nom ?> <br>
                Nom du membre : <?= $membre ?> <br>
                Prix du produit : <?= $prix ?> <br>
                Quantitée : <?= $quantite ?> <br> </a>
<br>
            <?php
            }
            
        ?>
<?php 
        while ($rows1=mysqli_fetch_array($resultatmembre)) {
            $mnom=$rows1['US_nom']; $mpseudo=$rows1['US_pseudo'];
?> 
       
                Nom du membre : <?= $mnom ?> <br>
                Nom du pseudo : <?= $mpseudo ?> <br>

<br>
            <?php
            }
            
        ?>
    </body>

    </div>
</html>
    
