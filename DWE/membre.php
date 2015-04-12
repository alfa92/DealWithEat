<?php session_start(); ?><html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    
<div id="principal">

    <header>
        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 

    </header>
<div id="produit_info">
<?php

			
			$a=$_GET['a'];

			$req='SELECT * FROM User WHERE US_pseudo="'.$a.'"';
			$res=mysqli_query($conn2,$req);


	if($rows1=mysqli_fetch_array($res)){
		$pseudo=$rows1['US_pseudo']; $membre=$rows1['US_prenom'];$mail=$rows1['US_mail'];$prenom=$rows1['US_prenom'];

			?>	Pseudo du membre : <?= $pseudo ?> <br />
                Nom du membre : <?= $membre ?> <br />
                Prenom du membre : <?= $prenom ?><br />
                Email : <?= $mail ?> <br />
                 <br /> </a>
	<?php
}
	
?>
</div>