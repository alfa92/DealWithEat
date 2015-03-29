<?php session_start(); ?>
<html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />

        <title>Deal With Eat</title>
    </head>
    <header>
          <?php include('../php/config.php'); ?>
        
    </header>
    <?php if(isset($_SESSION['id'])!='2'){
        ?>

        <p style="text-align:center;font-family:'Roboto',sans-serif; font-size:14px;"> Vous n'avez pas accés à cette page, pour accéder à cette page vous devez être <a href="Inscription.php" style="text-decoration:underline;">inscrit</a> et <a style="text-decoration:underline;" href="connectez_vous.php">vous connectez</a> à votre compte. <br>

            <a style="text-decoration:underline;" href="../accueil.php">Retour à l'accueil</a></p>
        <?php ;}else {
    ?>
    <body>
    <a href="adminmembre.php">
        <h1> Interface Administrateur </h1>

        <h2> Ici vous pouvez voir et modifier le site et ses données ( membres, annonces, forum, faq, actualités).</h2>
    </a>
    <hr>
    <div id="navcontainer">
        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="membreadmin.php"> Membres </a></li>
                <li><a href="#"> Annonces </a></li>
                <li><a href="#"> Forum </a></li>
                <li><a href="adminfaq.php"> FAQ </a></li>
                <li><a href="#"> Actualités</a></li>
                <li><a href="../accueil.php" TARGET=_BLANK> Voir le site</a></li>
                <li><a href="logout.php"> Deconnexion</a></li>
            </ul>
        </nav>

        <hr>
        <h1> Derniers membres inscrit </h1>

        <h2> Les 10 derniers membres inscrit sur votre site </h2>

        <table style="margin-left:4%;">
            <tr>
                <td style="width:40px;border-bottom:2px solid black;;"> ID</td>
                <td style="width:200px;border-bottom:2px solid black;"> Pseudo</td>
                <td style="width:200px;border-bottom:2px solid black;"> Prenom</td>
                <td style="width:200px;border-bottom:2px solid black;"> Nom</td>
                <td style="width:200px;border-bottom:2px solid black;">Ville</td>
                <td style="width:200px;border-bottom:2px solid black;">Adresse mail</td>
            </tr>
            <?php

            $query1 = 'SELECT * FROM membres ORDER BY membre_id DESC Limit 5';
            $reponse1 = $bdd1->query($query1);


            while ($donnees1 = $reponse1->fetch()) {
                ?>

                <table style="margin-left:4%;">
                    <tr>
                        <td style="width:40px;"><?php echo $donnees1['membre_id']?></td>
                        <td style="width:200px;"><?php echo $donnees1['membre_pseudo']?></td>
                        <td style="width:200px;"><?php echo $donnees1['prenom']?></td>
                        <td style="width:200px;"><?php //echo $donnees1['nom']
                            ?></td>
                        <td style="width:200px;"><?php echo $donnees1['ville']?></td>
                        <td style="width:200px;"><?php echo $donnees1['membre_mail']?></td>
                        <form method="post">
                            <td style="width:100px;"><input type="button" value="Modifier"/></td>
                            <td style="width:100px;"><input name="deleteb" type="button" value="Supprimer"/></td>
                        </form>
                    </tr>
                </table>


            <?php
            }
            ?>
            <br>
            <hr>
            <h1> Derniers produits mis en ligne </h1>

            <h2> Les 10 derniers produits mis en ligne </h2>

            <?php

            $query2 = 'SELECT * FROM Produits';
            $reponse2 = $bdd->query($query2);


            while ($donnees = $reponse2->fetch()) {
                ?>
                <table style="margin-left:4%;">
                    <tr>
                        <td style="width:40px;"><?php echo $donnees['Pr_idProduits']?></td>
                        <td style="width:200px;"><?php echo $donnees['Pr_Nom']?></td>
                        <td style="width:200px;"><?php echo $donnees['Pr_Prix']?>€/kg</td>
                        <td style="width:200px;"><?php echo $donnees['Pr_Quantité']?>kg</td>
                        <td style="width:400px;"><?php echo $donnees['Pr_Description']?></td>

                    </tr>
                </table>
            <?php
            }
            ?>

            <hr>

            <h1> Derniers questions sur le forum </h1>

            <h2></h2>

            <?php

            $query3 = 'SELECT * FROM blog';
            $reponse3 = $bdd1->query($query3);


            while ($donnees = $reponse3->fetch()) {
                ?>
                <table style="margin-left:4%;">
                    <tr>
                        <td style="width:200px;"><?php echo $donnees['membre_pseudo']?></td>
                        <td style="width:40px;"><?php echo $donnees['titre_article']?></td>
                        <td style="width:200px;"><?php echo $donnees['article']?></td>
                        <td style="width:200px;"><?php echo $donnees['date']?></td>

                    </tr>
                </table>



          <br>
    </body>
    <footer>
    </footer>
     <?php
            }
    }
    ?> </html>