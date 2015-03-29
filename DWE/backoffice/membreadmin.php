<?php session_start(); ?>
<html>
<head>
    <meta charset=UTF-8>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>

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

    <h1> Vous pouvez gérer les membres </h1>

    <h2> Modifier ou supprimer les membres </h2>

    <br>
    <?php

    $admembre = 'SELECT * FROM membres ORDER BY membre_pseudo';
    $repmembre = $bdd1->query($admembre);


    while ($donnees1 = $repmembre->fetch()) {
        ?>

        <table id="membre_data" style="margin-left:4%;">
            <tr>
                <td style="width:20px;"><?php echo $donnees1['membre_id'] ?></td>
                <td style="width:100px;"><?php echo $donnees1['membre_pseudo'] ?></td>
                <td style="width:300px;"><?php echo $donnees1['membre_mail'] ?></td>

                <td style="width:150px;"><?php echo $donnees1['prenom'] ?></td>
                <td style="width:100px;"><?php echo $donnees1['nom'] ?></td>

                <td style="width:100px;"><?php echo $donnees1['ville'] ?></td>

                <form method="post">
                    <td style="width:100px;"><input type="button" value="Modifier"/></td>
                    <td style="width:100px;"><input name="deleteb" type="button" value="Supprimer"/></td>
                </form>
            </tr>
        </table>
        <hr>

    <?php
    }
    }
    ?>
</div>
</body>
</html>