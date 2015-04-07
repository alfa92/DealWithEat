<?php session_start(); ?>


<html>
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
        
        <?php if(isset($_SESSION['id'])!='1'){
?>  

<p style="text-align:center;font-family:'Roboto' sans-serif; font-size:14px;"> Vous n'avez pas accés à cette page, pour accéder à cette page vous devez être <a href="Inscription.php" style="text-decoration:underline;">inscrit</a> et <a style="text-decoration:underline;" href="connectez_vous.php">vous connectez</a> à votre compte. <br>

<a style="text-decoration:underline;" href="accueil.php">Retour à l'accueil</a></p>
 <?php ;}else{

?>
			<?php 
              
               $requete = "SELECT * FROM User WHERE US_pseudo='".$_SESSION['login']."'";

// envoi de la requête
$resultat = mysqli_query($conn2,$requete) or die ('Erreur '.$requete.' '.$mysqli->error);
// resultat de la requete
$ligne = $resultat->fetch_assoc();

$id=$ligne['US_idUser']
    
              ?>
    
    </header>
    <body><br>
        <div id="account_top">
        <fieldset class="title_account">
            <legend>Bienvenue sur votre compte <?php 
              if (isset ($ligne['US_prenom'])){echo $ligne['US_prenom'];}
              if (isset ($ligne['US_nom'])){echo ' '.$ligne['US_nom'];}
            ?></legend>
            <i id="no_me">Si vous n'ètes pas <?php 
              if (isset ($ligne['US_pseudo'])){echo $ligne['US_pseudo'];}
            ?> veuillez <a href="logout.php">vous déconnectez</a>. 
        </i></fieldset>
            <img id="avatar_moyen" src="css/images/avatar.png">
        <div id="navcontainercompte"> 
     	<!-- Nav -->
				<!--nav id="navcompte">
					<ul>
						<li ><a href="moncompte.php">Profil</a></li>
                        <li><a href="actualites.php"> Paramètres </a></li>
						<li><a href="#"> Mes annonces </a></li>
						<li><a href="logout.php"> Déconnexion </a></li>
					</ul>
				</nav-->
        </div>


    <div id="infocompte" style="margin-top:50px;margin-left:23%;">
        <ul>
             <li> Pseudo : <?php echo $ligne['US_pseudo']; ?></li>
            <li> <?php if (isset ($ligne['US_nom'])){echo $ligne['US_nom'];} ?></li>
            <li><?php echo $ligne['US_prenom']; ?></li>
       
            <li><?php echo $ligne['US_datenaissance']; ?></li>
            <li> Mail : <?php echo $ligne['US_mail']; ?></li>
            <li> Adresse : <?php echo $ligne['US_adresse']; ?></li>
            <li> Ville : <?php echo $ligne['US_ville']; ?></li>
            <li> Pays : <?php echo $ligne['US_pays']; ?></li>
        </ul>
    </div>    
            <a href="moncompte_modif.php"><p style="margin-left:60%;margin-top:50px;"> Modifier mes données </p></a>
            
        <div id="annoncescompte">
        <h4> Vos annonces </h4>
          <?php

            $req= 'SELECT * FROM Annonce,Produit WHERE US_idUserannonceur="'.$id.'"';
            $res=mysqli_query($conn2,$req); 

            while ($rows=mysqli_fetch_array($res)) {
         
         echo $rows['AN_Nom']; 
?><br>
<?php
         echo $rows['AN_prix'].'€ <br>';

         echo "Quantité restante : ".$rows['AN_quantite']."kg";
         ?> <hr> <?php
}
 ?>   
        </div>
      
    </body>
    </div>
       <?php include('php/pied_de_page.php'); ?>
</html>

<?php } ?>