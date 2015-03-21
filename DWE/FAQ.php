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
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
			
    <?php 

         $req = "SELECT DISTINCT * FROM FAQ ";

// envoi de la requête
$res = mysqli_query($conn1,$req) or die ('Erreur '.$requete.' '.$mysqli->error);
// resultat de la requete
$lignes = $res->fetch_assoc();
    
        

    ?>
    </header>
    <body>
         <h1 id="FAQh1" style="border-bottom:2px dotted gray;width:90%;">FAQ</h1>
        <aside style="width:20%";>
            <nav>
                <ul>
                    <li>Réglement</li>
                    <li>Inscription</li>
                    <li>Connexion</li>
                    <li>Achat - Vente  -Echange</li>
                    
                </ul>
            </nav>
        </aside>
        <section >
           
                    <h6> Questions populaires </h6>
            <?php if($lignes['FA_Emplacement']=='Questions populaires'){ ?>
                            <p><strong><?php  echo $lignes['FA_Sujet']?></strong><br>
            <?php  echo $lignes['FA_Reponse']?></p>
            <?php
    }
            ?>
                    <h6>Réglement</h6>
                             <?php while($lignes['FA_Emplacement']=='Réglement'){ ?>
                            <p><strong><?php  echo $lignes['FA_Sujet']?></strong><br>
            <?php  echo $lignes['FA_Reponse']?></p>
            <?php
    }
            ?>
                    <h6>Inscription</h6>
             <?php if($lignes['FA_Emplacement']=='Inscription'){ ?>
                            <p><strong><?php  echo $lignes['FA_Sujet']?></strong><br>
            <?php  echo $lignes['FA_Reponse']?></p>
            <?php
    }
            ?>
                    <h6>Connexion</h6>
             <?php if($lignes['FA_Emplacement']=='Connexion'){ ?>
                            <p><strong><?php  echo $lignes['FA_Sujet']?></strong><br>
            <?php  echo $lignes['FA_Reponse']?></p>
            <?php
    }
            ?>
                    <h6>Achat - Vente  - Echange</h6>
             <?php if($lignes['FA_Emplacement']=='Achat - Vente - Echange'){ ?>
                            <p><strong><?php  echo $lignes['FA_Sujet']?></strong><br>
            <?php  echo $lignes['FA_Reponse']?></p>
            <?php
    }
            ?>
        
        </section>
    
    </body>
    
    <?php include('php/pied_de_page.php'); ?>
    
    
</html>