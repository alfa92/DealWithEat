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

            $requetemembre=$bdd2->query( "select * from user where US_pseudo like '%$search%' 
                                    or US_nom like '%$search%' 
                                        or US_prenom like '%$search%' ");
             
           
            $requete= $bdd2->query("select * from Produit where Pr_Nom like '%$search%' ");
            $produit=$requete->fetch(); 

            $vrequete =$bdd2->query( "SELECT * FROM Annonce WHERE PR_idP = '".$produit['PR_idP']."'");

        

    ?>
            

<h1> Résultat de la recherche </h1>
    
<?php 
        while ($rows=$vrequete->fetch()) {
            $pseudo=$bdd2->query('SELECT US_pseudo FROM User WHERE US_idUser="'.$rows['US_idUserannonceur'].'"');
        $ps=$pseudo->fetch();
            
            $nom=$produit['PR_nom']; $membre=$ps['US_pseudo'];$prix=$rows['AN_prix'];$quantite=$rows['AN_quantite'];
?> 
       
               <a href="produit.php?q=<?= $rows['AN_idAnnonce']; ?>"> Nom du produit : <?= $nom ?> <br>
                Pseudo du membre : <?= $membre ?> <br>
                Prix du produit : <?= $prix ?> <br>
                Quantitée : <?= $quantite ?> <br> </a>
<br>
            <?php
            }
            
        ?>
<?php 
        while ($rows1=$requetemembre->fetch()) {
            $mnom=$rows1['US_prenom']; $mpseudo=$rows1['US_pseudo'];
?> 
       <a href="membre.php?a=<?= $rows1['US_idUser'] ?>">
                Prenom du membre : <?= $mnom ?> <br>
                Pseudo du membre  : <?= $mpseudo ?> <br>
        </a>

<br>
            <?php
            }
            
        ?>
    </body>

    </div>
    
    <?php include('php/pied_de_page.php'); ?>
</html>
    
