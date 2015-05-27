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
            <li><a href="adminannonce.php"> Annonces </a></li>
            <li><a href="#"> Forum </a></li>
            <li><a href="adminfaq.php"> FAQ </a></li>
            <li><a href="../index.php" TARGET=_BLANK> Voir le site</a></li>
            <li><a href="logout.php"> Deconnexion</a></li>
        </ul>
    </nav>
<div id="back_right">

    <a href="adminmembre.php">
    <h1> Interface Administrateur </h1>

   
</a>

    <h1 style="text-align:left;"> Vous pouvez gérer les membres </h1>


                
    <?php

    $admembre = 'SELECT * FROM User ORDER BY US_idUser DESC';
    $repmembre = $bdd2->query($admembre);

    foreach($repmembre as $donnees1):
    
        $nbannonce=$bdd2->query('SELECT * FROM Annonce WHERE US_idUserannonceur="'.$donnees1['US_idUser'].'"');
        $result = $nbannonce->fetchAll();
        $nombannonce= count($result);

        ?>

         <div id="profil" >
            
                    <center><strong><p style='color:grey;'><?= $donnees1['US_pseudo']; ?></p></strong></center>
                    <p>Prenom :   <?php echo $donnees1['US_prenom']; ?></p> 
                    <p>Nom :  <?php echo $donnees1['US_nom']; ?></p>
                     <p>Admin : <?php echo $donnees1['US_admin']; ?></p> 
                    <p>Moderateur:  <?php echo $donnees1['US_moderateur']; ?></p>
                    <p>Annonces:  <?php echo $nombannonce; ?></p>
        <?php 
               
                $filename = "../image_user/".$donnees1['US_idUser']."/".$donnees1['US_image'];
                if($donnees1['US_image'] == "" or !file_exists($filename)){
                      $avatar="<img id='avatar_little' width='120px' src='../image_user/avatar.png' />"; 
                }else{
                      $avatar="<img id='avatar_little' width='120px' src='../image_user/".$donnees1['US_idUser']."/".$donnees1['US_image']."' />"; 
                }
            ?>
                <?= $avatar ?>
            <a href="action/deluser.php?id=<?php echo $donnees1['US_idUser'] ?>"><p></p> </a>
            <a class="moderateur" href="action/upmoderateur.php?id=<?php echo $donnees1['US_idUser'] ?>"><p></p> </a>
        </div>


    <?php
            endforeach; 
        }
    

    ?>            
    </div>
</div>
</body>
</html>