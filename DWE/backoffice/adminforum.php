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
            <li><a href="adminforum.php"> Forum </a></li>
            <li><a href="adminfaq.php"> FAQ </a></li>
            <li><a href="newsletter.php"> Newsletter </a></li>
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

  
  $subject=$bdd2->query('SELECT * FROM forumq');
      foreach($subject as $subjects):
    $post=$bdd2->query('SELECT * FROM forumr WHERE FR_sujet="'.$subjects['ID_forum'].'"');
   $posts=$post->fetchAll();
    $count=count($posts);
?>
    <a href="adminforumpost.php?id=<?= $subjects['ID_forum'] ?>"><li style="display:inline-block; vertical-align:top;margin-left:20px;border-right:1px solid black;" >
    <p ><p><?= $subjects['q_sujet'] ?></p> 
        publié par <i><?= $subjects['q_pseudo']; ?></i> le <?= $subjects['Date']; ?>.
        <br /> Nombre de réponses au sujet : <?= $count ?></p>
    </li>
  </a>
<?php
     endforeach;  
     } 
?>    
    </div>
</div>
</body>
</html>