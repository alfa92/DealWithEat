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
        
        <p style="text-align:center;font-family:'Roboto' sans-serif ; font-size:30px; color:Green;"><?php if(isset($msgconnexion)){echo $msgconnexion;} ?></p>
                <p style="text-align:center;font-family:'Roboto' sans-serif ; font-size:30px; color:red;"><?php if(isset($msgconnexionfail)){echo $msgconnexionfail;} ?></p>
        
        <?php 

    $msg='';
    $msgconnexionfail='';

    
    
    if(isset($_POST['login'])){
        $login=$_POST['login'];
    }else{
        $login=NULL;
    }

    if(isset($_POST['pass'])){
        $pass=md5($_POST['pass']);
    }else{
        $pass=NULL;
    }


?>


<?php 
    $requete = "SELECT membre_mdp FROM membres WHERE membre_pseudo='".$login."'";

// envoi de la requête
$resultat = mysqli_query($conn,$requete) or die ('Erreur '.$requete.' '.$mysqli->error);
// resultat de la requete
$ligne = $resultat->fetch_assoc();

    if(isset($_POST['subconnect'])){
            if($pass==$ligne["membre_mdp"]){
        
        
        $_SESSION['login']=$login;
        $msgconnexion="Bienvenue ".$_SESSION['login']."";
                $_SESSION['id']='1';
        
      
    }else{
        $msgconnexionfail= "La connexion a échoué, veuillez réessayer";

    }
    }
        if(isset($_SESSION['login']) ){
    if($_SESSION['id']=='1'){
        ?> <div id="connecterdiv" > <p>Bonjour <?php echo $_SESSION['login'] ?>
</p></div> <?php
            $_SESSION['id']='1';
       }
    else{
         ?> <div id="connectdivvous" >
        
            
            <a id="connecvs" > Connectez-vous  </a>
            
            <form ACTION="connectez_vous.php" METHOD="POST"> 
            <input name="login" class="connectv" type="text" placeholder="Pseudo">
            <input name="pass" class="connectv" type="password" placeholder="Mot de passe">
            <input name="subconnect" class="subconnect" type="submit" value="Ok" >
                  </form>
                <p STYLE="margin-top:-15px;"> Pas encore inscrit ? <a href="Inscription.php" style="color:black; text-decoration:none;border-bottom:1px dotted black ">Rejoignez-nous</a> </p>
          
                
        </div> <?php
        }
        }else{
        ?> <div id="connectdivvous" >
        
            
            <a id="connecvs" > Connectez-vous  </a>
            
            <form ACTION="connectez_vous.php" METHOD="POST"> 
            <input name="login" class="connectv" type="text" placeholder="Pseudo">
            <input name="pass" class="connectv" type="password" placeholder="Mot de passe">
            <input name="subconnect" class="subconnect" type="submit" value="Ok" >
                  </form>
                <p STYLE="margin-top:-15px;"> Pas encore inscrit ? <a href="Inscription.php" style="color:black; text-decoration:none;border-bottom:1px dotted black ">Rejoignez-nous</a> </p>
          
                
        </div> <?php }
?>




