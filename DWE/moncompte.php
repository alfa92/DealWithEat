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
              
               $requete = "SELECT * FROM membres WHERE membre_pseudo='".$_SESSION['login']."'";

// envoi de la requête
$resultat = mysqli_query($conn,$requete) or die ('Erreur '.$requete.' '.$mysqli->error);
// resultat de la requete
$ligne = $resultat->fetch_assoc();
    
              ?>
    
    </header>
    <body><br>
        <div id="account_top">
        <fieldset class="title_account">
            <legend>Bienvenue sur votre compte <?php 
              if (isset ($ligne['prenom'])){echo $ligne['prenom'];}
              if (isset ($ligne['nom'])){echo ' '.$ligne['nom'];}
            ?></legend>
            <i id="no_me">Si vous n'ètes pas <?php 
              if (isset ($ligne['membre_pseudo'])){echo $ligne['membre_pseudo'];}
            ?> veuillez <a href="logout.php">vous déconnectez</a>. 
        </i></fieldset>
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
       <td><?php if (isset ($ligne['nom'])){echo $ligne['nom'];} ?></td>
       <td> <a href="moncompte_modif.php"> Modifier </a></td>
   <tr>
       <td>Prenom</td>
       <td><?php echo $ligne['prenom']; ?></td>
        <td> <a href="moncompte_modif.php"> Modifier </a></td>
   </tr>
       <td>Date de naissance</td>
       <td><?php echo $ligne['age']; ?></td>
     <td> <a href="moncompte_modif.php"> Modifier </a></td>
   <tr>
       <td>Pseudo</td>
       <td><?php echo $ligne['membre_pseudo']; ?></td>
       
   </tr>
       <td>Mail</td>
       <td><?php echo $ligne['membre_mail']; ?></td>
     <td> <a href="moncompte_modif.php"> Modifier </a></td>
   <tr>
       <td>Adresse</td>
       <td><?php echo $ligne['adresse']; ?></td>
        <td> <a href="moncompte_modif.php"> Modifier </a></td>
   </tr>
       <td>Ville</td>
       <td><?php echo $ligne['ville']; ?></td>
     <td> <a href="moncompte_modif.php"> Modifier </a></td>
   <tr>
       <td> Pays </td>
       <td><?php echo $ligne['pays']; ?></td>
        <td> <a href="moncompte_modif.php"> Modifier </a></td>
   </tr>
       <td>Mot de passe</td>
       <td></td>
    <td> <a href="moncompte_modif.php"> Modifier </a></td>

   
</table>
      
    </body>
    </div>
       <?php include('php/pied_de_page.php'); ?>
</html>

<?php } ?>