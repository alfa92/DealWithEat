<?php session_start(); ?><html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    
<script type="text/javascript">
    function updateTextInput(val) {
      document.getElementById('textInput').value=val; 
    }
  </script>
<div id="principal">

    <header>
        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 

    </header>
    
    <body >
        <?php $id=$_GET['id'];
            
    $sql=$bdd2->query('SELECT * FROM Annonce WHERE AN_idANnonce="'.$id.'"');
    $row=$sql->fetch();
    $sql1=$bdd2->query('SELECT * FROM Produit WHERE PR_idP="'.$row['PR_idP'].'"');
    $row1=$sql1->fetch();
    $sql2=$bdd2->query('SELECT * FROM Transaction WHERE AN_idAnnonce="'.$id.'"');
    $row2=$sql2->fetch();
    $sql3=$bdd2->query('SELECT US_pseudo FROM User WHERE US_idUser ="'.$row2['US_idUseracheteur'].'"');
    $row3=$sql3->fetch();

if($row2=='0'){
    $type="échange";   
}else{
    $type="achat";   
}
?>
        
        <h1><?= $row1['PR_nom']; ?></h1>
        <h2>Proposé à l'<?= $type ?> par <?= $row3['US_pseudo']; ?> </h2>
        
        <center><p>Si vous n'acceptez pas cet achat cliquer sur refuser sinon compléter votre validation </p>
        <form method="post">
            <input type="submit" name="refus" value="Refuser" />
        </form>
            </center>
        <center><form method="POST" >
            <label for="dispo">Donner vos disponibilités et/ou votre méthode d'envoi</label><br />
            <textarea name="dispo" rows="4" cols="50"> </textarea><br />
            <input type="submit" name="envoi_dispo" />
        </form></center>
    
    </body>