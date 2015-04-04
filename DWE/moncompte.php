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


    <div id="infocompte" style="margin-top:100px;margin-left:23%;">
        <ul>
             <li> Pseudo : <?php echo $ligne['membre_pseudo']; ?></li>
            <li> <?php if (isset ($ligne['nom'])){echo $ligne['nom'];} ?></li>
            <li><?php echo $ligne['prenom']; ?></li>
       
            <li><?php echo $ligne['age']; ?></li>
            <li> Mail : <?php echo $ligne['membre_mail']; ?></li>
            <li> Adresse : <?php echo $ligne['adresse']; ?></li>
            <li> Ville : <?php echo $ligne['ville']; ?></li>
            <li> Pays : <?php echo $ligne['pays']; ?></li>
        </ul>
    </div>    
            <a href="moncompte_modif.php"><p style="margin-left:60%;margin-top:50px;"> Modifier mes données </p></a>
            
        <div id="map">
            
        </div>
      
    </body>
    </div>
       <?php include('php/pied_de_page.php'); ?>
</html>

<?php } ?>