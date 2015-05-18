<?php session_start(); ?>
<html>
<head>
    <meta charset=UTF-8>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="backoffice.css" media="screen"/>


    <title>Deal With Eat - Backoffice</title>
</head>
<header>
    <?php include('../php/config.php'); ?>
    <?php require('backoffice.class.php'); ?>
</header>

<?php if(isset($_SESSION['id'])!='2'){
    ?>

    <p style="text-align:center;font-family:'Roboto',sans-serif; font-size:14px;"> Vous n'avez pas accés à cette page, pour accéder à cette page vous devez être <a href="Inscription.php" style="text-decoration:underline;">inscrit</a> et <a style="text-decoration:underline;" href="connectez_vous.php">vous connectez</a> à votre compte. <br>

        <a style="text-decoration:underline;" href="../accueil.php">Retour à l'accueil</a></p>
    <?php ;}else {


?>
<body>


<div id="navcontainer">

    <!-- Nav -->
    <nav id="nav">
      <a href="adminmembre.php"><img style="width:100px;margin-left:25%;margin-top:50px;"src="../css/images/logoDWE.png" /></a>

        <ul>
            <li><a href="membreadmin.php"> Membres </a></li>
            <li><a href="#"> Annonces </a></li>
            <li><a href="#"> Forum </a></li>
            <li><a href="adminfaq.php"> FAQ </a></li>
            <li><a href="../accueil.php" TARGET=_BLANK> Voir le site</a></li>
            <li><a href="logout.php"> Deconnexion</a></li>
        </ul>
    </nav>
<div id="back_right">

    <a href="adminmembre.php">
    <h1> Interface Administrateur </h1>

   
</a>

    <h1 style="text-align:left;"> Vous pouvez gérer les membres </h1>


    <br>
    <table id="membre_data" style="margin-left:4%;">
    <tr>
                <th style="width:20px;"> id </th>
                <th style="width:100px;"> Pseudo </th>
                <th style="width:500px;"> Email </th>

                <th style="width:190px;"> Prenom </th>
                <th style="width:100px;"> Nom </th>

                <th style="width:100px;"> Ville </th>

                <th style="width:100px;"> Admin </th>
                <th style="width:100px;"> Modérateur </th>

                <th style="width:100px;"> Modifier </th>
                    <th style="width:100px;"> Supprimer </th>
            </tr>
           </table>               
    <?php

    $admembre = 'SELECT * FROM User ORDER BY US_pseudo';
    $repmembre = $bdd2->query($admembre);

    foreach($repmembre as $donnees1):
    
        ?>

        <table id="membre_data" style="margin-left:4%;">
            
            <tr>
                <td style="width:20px;"><?php echo $donnees1['US_idUser'] ?></td>
                <td style="width:100px;"><?php echo $donnees1['US_pseudo'] ?></td>
                <td style="width:300px;"><?php echo $donnees1['US_mail'] ?></td>

                <td style="width:150px;"><?php echo $donnees1['US_prenom'] ?></td>
                <td style="width:100px;"><?php echo $donnees1['US_nom'] ?></td>

                <td style="width:100px;"><?php echo $donnees1['US_ville'] ?></td>

                <td style="width:100px;"><?php echo $donnees1['US_admin'] ?></td>
                <td style="width:100px;"><?php echo $donnees1['US_moderateur'] ?></td>

                <form method="post" action="#">
                    <td style="width:100px;"><input type="submit" value="Modifier"/></td>
                    <td style="width:100px;"><a href="action/deluser.php?id='<?php echo $donnees1['US_idUser'] ?>'"> Supprimer </a></td>

                </form>
                
            </tr>
        </table>

    <?php
            endforeach; }
    

    ?>            
    </div>
</div>
</body>
</html>