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
            <li><a href="forumadmin.php"> Forum </a></li>
            <li><a href="adminfaq.php"> FAQ </a></li>
            <li><a href="../accueil.php" TARGET=_BLANK> Voir le site</a></li>
            <li><a href="logout.php"> Deconnexion</a></li>
        </ul>
    </nav>
<div id="back_right">

    <a href="adminmembre.php">
    <h1> Interface Administrateur </h1>

   
</a>

    <h1 style="text-align:left;"> Vous pouvez gérer le forum </h1>
             
    <?php

  
  $products=$bdd2->query('SELECT * FROM forumq');
      foreach($products as $products):
       
?>
            <div id="forumadmin">
                    <a href="forumadminarticle.php?article=<?= $products['ID_forum']; ?>"><p> <?php echo $products['q_sujet']; ?></p> </a>
            </div> 
    <?php
     endforeach;  
     } 
?>  
    <style>
            #forumadmin{
                display:inline-block;
                vertical-align:top;
                box-shadow:2px 2px 2px black;
                min-width:230px;
                max-width:250px;
                min-height:50px;           
                border:1px solid grey;
            }
    
            #forumadmin p{
                font-size:14px;
                font-weight:400;
                text-align:center;
            }
    </style>

            <a href="action/delannonce.php?id=<?php echo $products['AN_idAnnonce']; ?>"></a>
        </div>

  
  
    </div>
</div>
</body>
</html>