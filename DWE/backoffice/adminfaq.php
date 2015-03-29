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

        <h1> Vous pouvez ici mettre en ligne des post sur la FAQ</h1>

        <h2> Il vous suffit de remplir le forumlaire ci-dessous</h2>

        <form id="postfaq" name="postfaq" method="post">
            <label for="Emplacement">Choisissez l'emplacement du sujet </label>
            <select name="Emplacement">
                <option> - - - - - - -</option>
                <option>Questions populaires</option>
                <option>Réglement</option>
                <option>Inscription</option>
                <option>Connexion</option>
                <option>ACHAT - VENTE - ECHANGE</option>
            </select>
            <br>
            <input name="titre" placeholder="Saisir le sujet" required/>
            <br>
            <textarea name="reponse" placeholder="Veuillez saisir la réponse au sujet mentionné plus haut" cols="75"
                      rows="8" required></textarea>
            <br>
            <input name="subfaq" type="submit" value="Poster la sujet">
        </form>

        <?php
        if (isset($_POST['subfaq'])) {

            if (isset($_POST['Emplacement'])) {
                $emp = $_POST['Emplacement'];
            }
            if (isset($_POST['titre'])) {
                $titrefaq = ($_POST['titre']);
            }
            if (isset($_POST['reponse'])) {
                $repfaq = $_POST['reponse'];
            }

            $reqmlf = "INSERT INTO FAQ VALUES ('', '" . $emp . "', '" . $titrefaq . "' , '" . $repfaq . "' )";
            $db = $bdd->query($reqmlf);
        }
        }?>
        </div>
    </body>
</html>