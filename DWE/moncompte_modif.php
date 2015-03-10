<?php session_start(); ?>
<?php 
    
    if(isset($_POST['rafraichir'])){
         if(isset($_POST['nom']) && $_POST['nom']!=NULL){
             $req = 'UPDATE membres SET nom="'.$_POST['nom'].'" WHERE membre_PSEUDO="'.$_SESSION['login'].'"';
             $result = mysqli_query($conn,$req) or die ('Erreur '.$req.''.mysql_error());
        
         }
         if(isset($_POST['prenom']) && $_POST['prenom']!=NULL){
            $req1 = 'UPDATE membres SET prenom="'.$_POST['prenom'].'" WHERE membre_PSEUDO="'.$_SESSION['login'].'"';
             $result1 = mysqli_query($conn,$req1) or die ('Erreur '.$req1.''.mysql_error());
             
         }
         if(isset($_POST['date']) && $_POST['date']!=NULL){
             $req2 = 'UPDATE membres SET age="'.$_POST['date'].'" WHERE membre_PSEUDO="'.$_SESSION['login'].'"';
             $result2 = mysqli_query($conn,$req2) or die ('Erreur '.$req2.''.mysql_error());
         }
         if(isset($_POST['mail']) && $_POST['mail']!=NULL){
           $req3 = 'UPDATE membres SET membre_mail="'.$_POST['mail'].'" WHERE membre_PSEUDO="'.$_SESSION['login'].'"';
             $result3 = mysqli_query($conn,$req3) or die ('Erreur '.$req3.''.mysql_error());
         }else{}
         if(isset($_POST['adresse']) && $_POST['adresse']!=NULL){
           $req4 = 'UPDATE membres SET adresse="'.$_POST['adresse'].'" WHERE membre_PSEUDO="'.$_SESSION['login'].'"';
             $result4 = mysqli_query($conn,$req4) or die ('Erreur '.$req4.''.mysql_error());
         }else{}
         if(isset($_POST['ville']) && $_POST['ville']!=NULL){
            $req5 = 'UPDATE membres SET ville="'.$_POST['ville'].'" WHERE membre_PSEUDO="'.$_SESSION['login'].'"';
             $result5 = mysqli_query($conn,$req5) or die ('Erreur '.$req5.''.mysql_error());
         }else{}
        if(isset($_POST['pays']) && $_POST['pays']!=NULL){
            $req6 = 'UPDATE membres SET pays="'.$_POST['pays'].'" WHERE membre_PSEUDO="'.$_SESSION['login'].'"';
             $result6 = mysqli_query($conn,$req6) or die ('Erreur '.$req6.''.mysql_error());
        }else{}
        
        
        
        if(isset($_POST['apass']) &&  $_POST['apass']!=NULL &&  md5($_POST['apass'])==$ligne['membre_mdp']){
             if(isset($_POST['pass']) && isset($_POST['pass2']) && $_POST['pass']!=NULL && $_POST['pass2']!=NULL && $_POST['pass']==$_POST['pass2'] ){
            $req = 'UPDATE membres SET membre_mdp="'.md5($_POST['pass']).'" WHERE membre_PSEUDO="'.$_SESSION['login'].'"';
             $result = mysqli_query($conn,$req) or die ('Erreur '.$req.''.mysql_error());
             }else{
                $msg="Les deux mots de passes ne sont pas les mêmes";
             }
         }else{
             $msg="L'ancien mot de passe n'est pas bon ";
         }
        
       ?> 
    <SCRIPT LANGUAGE="JavaScript">
     document.location.href="moncompte_modif.php" 
</SCRIPT>

    <?php 
    }
    
?>

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
    <body>
        <?php if(isset($msg)){
               echo $msg;   
              } ?>
        <br>
        <div id="account_top">
        <fieldset class="title_account">
            <legend>Bienvenue sur votre compte <?php 
              echo $ligne['prenom'];echo ' '.$ligne['nom'];
            ?></legend>
            <i id="no_me">Si vous n'ètes pas <?php 
              echo $ligne['membre_pseudo'];
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
<form method="post">
<table id="account_data">
   <tr>
       <td>Nom</td>
       <td><?php echo $ligne['nom']; ?></td>
       <td> <input name="nom" placeholder="Modifier mon nom"/> </td>
   <tr>
       <td>Prenom</td>
       <td><?php echo $ligne['prenom']; ?></td>
       <td> <input name="prenom" placeholder="Modifier mon prenom"/> </td>
   </tr>
       <td>Date de naissance</td>
       <td><?php echo $ligne['age']; ?></td>
    <td> <input name="date" placeholder="Modifier ma date de naissance"/> </td>
   <tr>
       <td>Pseudo</td>
       <td><?php echo $ligne['membre_pseudo']; ?></td>
       
   </tr>
       <td>Mail</td>
       <td><?php echo $ligne['membre_mail']; ?></td>
     <td> <input name="mail" placeholder="Modifier mon mail"/> </td>
   <tr>
       <td>Adresse</td>
       <td><?php echo $ligne['adresse']; ?></td>
        <td> <input name="adresse" placeholder="Modifier mon adresse"/> </td>
   </tr>
       <td>Ville</td>
       <td><?php echo $ligne['ville']; ?></td>
     <td> <input name="ville" placeholder="Modifier ma ville"/> </td>
   <tr>
       <td> Pays </td>
       <td><?php echo $ligne['pays']; ?></td>
       <td> <input name="pays" placeholder="Modifier mon pays"/> </td>
   </tr>
       <td>Mot de passe</td>
       <td><input name="apass" placeholder="Ancien mot de passe"/></td>
    <td> <input name="pass" placeholder="Nouveau mot de passe"/> </td>
    <td> <input name="pass2" placeholder="Retaper mon nouveau mot de passe"/> </td>

   
</table>
    <input id="modif_sub" type="submit" name="rafraichir" value="Envoyer les modifications">
 </form>     
    </body>
    </div>
</html>

<?php } ?>
