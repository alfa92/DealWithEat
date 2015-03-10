<?php $expire = 365*24*3600;
setcookie("pseudo",time()+$expire);session_start()  ?>


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
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} 
        
              
               $requete = "SELECT * FROM membres WHERE membre_pseudo='".$_COOKIE['pseudo']."'";

// envoi de la requête
$resultat = mysqli_query($conn,$requete) or die ('Erreur '.$requete.' '.$mysqli->error);
// resultat de la requete
$ligne = $resultat->fetch_assoc();
    
              ?>
    
    </header>
    <body><br>
        <div id="account_top">
        <fieldset class="title_account">
            <legend> <?php 
              echo $_COOKIE['pseudo'];
            ?></legend>
            </fieldset>
            <img id=avatar_moyen src="css/images/avatar.png">
        <div id="navcontainercompte"> 
     	<!-- Nav -->
				<nav id="navcompte">
					<ul>
						<li ><a href="moncompte.php">Profil</a></li>
                        <li><a href="actualites.php"> Paramètres </a></li>
						<li><a href="#"> Mes annonces </a></li>
						<li><a href="logout.php"> Déconnexion </a></li>
					</ul>
				</nav>
        </div>

<table id="account_data">
   <tr>
       <td>Nom</td>
       <td><?php echo $ligne['nom']; ?></td>
       
   <tr>
       <td>Prenom</td>
       <td><?php echo $ligne['prenom']; ?></td>
    
   </tr>
       <td>Date de naissance</td>
       <td><?php echo $ligne['age']; ?></td>
     
   <tr>
       <td>Pseudo</td>
       <td><?php echo $ligne['membre_pseudo']; ?></td>
       
   </tr>
       <td>Mail</td>
       <td><?php echo $ligne['membre_mail']; ?></td>
     
   <tr>
       <td>Adresse</td>
       <td><?php echo $ligne['adresse']; ?></td>
        
   </tr>
       <td>Ville</td>
       <td><?php echo $ligne['ville']; ?></td>
     
   <tr>
       <td> Pays </td>
       <td><?php echo $ligne['pays']; ?></td>
        
   </tr>
       <td>Mot de passe</td>
       <td></td>
    

   
</table>
      
    </body>
    </div>
</html>
