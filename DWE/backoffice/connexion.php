<?php session_start();
?>

<html>
<head>
    <meta charset=UTF-8>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
       
        <link rel="stylesheet" type="text/css" href="backoffice.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>

    <title>Deal With Eat</title>
</head>
<header>
    <?php include('../php/config.php'); ?>

</header>
<body id="body_admin">


    <?php

    if(isset($_POST['login'])) {
        $login = $_POST['login'];
    }
    if(isset($_POST['pass'])) {
        $prefixe="m0td3p4ss3dEbut";
                        $suffixe="mOtdEpAssEf1N";
        $mdp = md5($prefixe.$_POST['pass'].$suffixe);
    }
    if(isset($_POST['subconnect'])) {
        $boutton = $_POST['subconnect'];
    }


    if(isset($_POST['login'])){
        $co="SELECT US_mdp,US_pseudo,US_admin FROM User WHERE US_pseudo='".$login."'";
        $envoi=mysqli_query($conn2,$co) or die ('Erreur ');

        $donnees = $envoi->fetch_assoc();

        if(isset($boutton)){
            if($donnees['US_mdp']==$mdp){
                if($donnees['US_admin']=='1'){
                    $_SESSION['id']='2';
                   ?>
                    <br><br>
                    <center><p style="color:white;font-family: 'Roboto',sans-serif;"> Vous allez être redirigé vers l'espace administrateur </p></center>

<script type="text/javascript">
var obj = 'window.location.replace("adminmembre.php");';
setTimeout(obj,1000);
</script>
<?php
                }else{
                    echo "Vous n'ètes pas un administrateur ou un modérateur du site";
                }
            }else{
                echo "Identifiants incorrect, veuillez vérifier vos identifiants";
            }
        }

    }
    ?>
    <h1 style="color:white;"> <center>Connexion à l'interface administrateur</center></h1>
    <form id="connect_admin" ACTION="connexion.php" METHOD="POST">
        <input name="login" class="connectv" type="text" placeholder="Pseudo">
        <input name="pass" class="connectv" type="password" placeholder="Mot de passe">
        <input name="subconnect" class="subconnect" type="submit" value="Ok" >
    </form>

<h1><a href="../accueil.php" style="color:white;float:right;margin-right: 20px;">Retourner sur le site</a></h1>