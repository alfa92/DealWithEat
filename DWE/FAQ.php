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

        $queryfaq1 = 'SELECT * FROM FAQ WHERE FA_Emplacement="Questions populaires"';
        $reponsefaq1 = $bdd->query($queryfaq1);
        $queryfaq2 = 'SELECT * FROM FAQ WHERE FA_Emplacement="Réglement"';
        $reponsefaq2 = $bdd->query($queryfaq2);
        $queryfaq3 = 'SELECT * FROM FAQ WHERE FA_Emplacement="Inscription"';
        $reponsefaq3 = $bdd->query($queryfaq3);
        $queryfaq4 = 'SELECT * FROM FAQ WHERE FA_Emplacement="Connexion"';
        $reponsefaq4 = $bdd->query($queryfaq4);
        $queryfaq5 = 'SELECT * FROM FAQ WHERE FA_Emplacement="ACHAT - VENTE - ECHANGE"';
        $reponsefaq5 = $bdd->query($queryfaq5);




        ?>
    </header>
    <body>
    <h1 id="FAQh1" style="border-bottom:2px dotted gray;width:90%;">FAQ<i
            style="margin-left:70%;font-size: 20px;letter-spacing: normal;"><a href="forum.php">Accéder au forum
                d'aide</a></i></h1>
         <aside id="asidefaq" ;>
            <nav>
                <ul>
                    <li><a href="#faqr">Réglement</a></li>
                    <li><a href="#faqi">Inscription</a></li>
                    <li><a href="#faqc">Connexion</a></li>
                    <li><a href="#faqave">Achat - Vente -Echange</a></li>
                    
                </ul>
            </nav>
        </aside>
         <section id="sectionfaq">

             <h6 id="faqQP"> QUESTIONS POPULAIRES </h6>
             <?php while ($donnees = $reponsefaq1->fetch()) { ?>
                 <p><strong><?php echo $donnees['FA_Sujet'] ?></strong><br>
                     <?php echo nl2br($donnees['FA_Reponse']) ?></p>
            <?php
    }

            ?>
             <h6 id="faqr">REGLEMENT</h6>
             <?php while ($donnees2 = $reponsefaq2->fetch()) { ?>
                 <p><strong><?php echo $donnees2['FA_Sujet'] ?></strong><br>
                     <?php echo nl2br($donnees2['FA_Reponse']) ?></p>
            <?php
             }
            ?>
             <h6 id="faqi">INSCRIPTION</h6>
             <?php while ($donnees3 = $reponsefaq3->fetch()) { ?>
                 <p><strong><?php echo $donnees3['FA_Sujet'] ?></strong><br>
                     <?php echo nl2br($donnees3['FA_Reponse']) ?></p>
            <?php
             }
            ?>
             <h6 id="faqc">CONNEXION</h6>
             <?php while ($donnees4 = $reponsefaq4->fetch()) { ?>
                 <p><strong><?php echo $donnees4['FA_Sujet'] ?></strong><br>
                     <?php echo nl2br($donnees4['FA_Reponse']) ?></p>
            <?php
             }
            ?>
             <h6 id="faqave">ACHAT - VENTE - ECHANGE</h6>
             <?php while ($donnees5 = $reponsefaq5->fetch()) { ?>
                 <p><strong><?php echo $donnees5['FA_Sujet'] ?></strong><br>
                     <?php echo nl2br($donnees5['FA_Reponse']) ?></p>
            <?php
             }
            ?>
        
        </section>
    
    </body>
    
    <?php include('php/pied_de_page.php'); ?>
    
    
</html>