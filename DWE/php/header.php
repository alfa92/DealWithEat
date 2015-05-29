<?php require'panier/_header.php'; ?>

<div id="container_header">
        <a href='accueil.php'><div class="logo">
            <h1> Deal With Eat</h1>
            <h2> Vendez, Achetez, Echangez</h2>
            <img id="logo" src="css/images/logoDWE.png">
    </div></a>
    
        <div id="searchdiv">
        
            <form method="get" action="res_recherche.php">
            <input id="search" name="search" type="text" placeholder="Recherche rapide">
            <input id="subsearch" type="submit" value="">
            </form>
            
        </div>



    <a href="panier.php"><img  id="panier_partout" src="css/images/shop.png" style="z-index: 1;"> </a>
    
    <?php  if($panier->count() >0){ ?>
    <p style="text-align:center;padding-top:2px;padding-right:2px;margin-top:-80px;margin-left:80%;background-color:#white;border:1px solid black;width:28px;height:28px;border-radius:50%;z-index:1;"><?= $panier->count(); ?></p> <?php } ?>

       

    </div>
<!-- PARTI CONNEXION -->

<?php

$msg='';
$msgconnexionfail='';
$msgad = NULL;

if(isset($_POST['login'])){
    $login=$_POST['login'];
}else{
    $login=NULL;
}
if(isset($_POST['pass'])){
   $prefixe="m0td3p4ss3dEbut";
                        $suffixe="mOtdEpAssEf1N";
                                $pass = md5($prefixe.$_POST['pass'].$suffixe); 
}else{
    $pass=NULL;
}
?>

<?php
$requete = "SELECT * FROM User WHERE US_pseudo='".$login."'";

// envoi de la requête
$resultat = mysqli_query($conn2,$requete) or die ('Erreur '.$requete.' '.$mysqli->error);
// resultat de la requete
$ligne = $resultat->fetch_assoc();


if(isset($_POST['subconnect'])){
    if($pass==$ligne["US_mdp"]){


        $_SESSION['login']=$login;
        $msgconnexion="Bienvenue ".$_SESSION['login']."";
        $_SESSION['id']='1';
        $_SESSION['id_perso']=$ligne['US_idUser'];

    } else {
        $msgconnexionfail = "La connexion a échoué, veuillez réessayer";

    }
}
if(isset($_SESSION['login']) ){
    if($_SESSION['id']=='1'){
        ?>

        <div id="connecterdiv"><p><?php echo $_SESSION['login']; ?><br> <i style="font-size:12px;"><a
                        href="panier.php">Mon panier <?= $panier->count(); ?></a></i>
            </p>
            <?php 
            $requete = "SELECT * FROM User WHERE US_pseudo='".$_SESSION['login']."'";
            $resultat =$bdd2->query($requete);
            $ligne = $resultat->fetch();

               
                $filename = "image_user/".$ligne['US_idUser']."/".$ligne['US_image'];
                if($ligne['US_image'] == "" or !file_exists($filename)){
                      $avatar="<img id='avatar_little' width='120px' src='image_user/avatar.png' />"; 
                }else{
                      $avatar="<img id='avatar_little' width='120px' src='image_user/".$ligne['US_idUser']."/".$ligne['US_image']."' />"; 
                }
            ?>
                <?= $avatar ?>
                </div> <?php
        $_SESSION['id']='1';
    }
    else{
        ?> <div id="connectdiv" >

            <a id="connect" href="#connexiondiv"> Connectez-vous <img  src="css/images/arrow486.png"> </a>
            <div id="connexiondiv">
                <form ACTION="accueil.php" METHOD="POST">
                    <input name="login" class="connect" type="text" placeholder="Pseudo">
                    <input name="pass" class="connect" type="password" placeholder="Mot de passe">
                    <input name="subconnect" class="subconnect" type="submit" value="Ok" >
                </form>
                <p STYLE="margin-top:-15px;"> Pas encore inscrit ? <a href="Inscription.php" style="color:black; text-decoration:none;border-bottom:1px dotted black ">Rejoignez-nous</a> </p>

            </div>
        </div> <?php
    }
}else{
    ?>


    <div id="connectdiv"  >

        <a id="connect" href="#connectdiv"> Connectez-vous <img  src="css/images/arrow486.png"> </a>

        <form ACTION="accueil.php" METHOD="POST">
            <input name="login" class="connect" type="text" placeholder="Pseudo">
            <input name="pass" class="connect" type="password" placeholder="Mot de passe">
            <input name="subconnect" class="subconnect" type="submit" value="Ok" >
        </form>
        <p STYLE="margin-top:-17px;"> Pas encore inscrit ? <a href="Inscription.php" style="color:black; text-decoration:none;border-bottom:1px dotted black ">Rejoignez-nous</a> </p>
        <p STYLE="margin-top:-20px;"><a href="oubliemdp.php" style="color:black; text-decoration:none;border-bottom:1px dotted black ">Mot de passe oublié ?</a> </p>


    </div> <?php }
?>