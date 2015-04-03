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

        <p style="text-align:center;font-family:'Roboto', sans-serif ; font-size:30px; color:Green;"><?php if (isset($msgconnexion)) {
                echo $msgconnexion;
            } ?></p>

        <p style="text-align:center;font-family:'Roboto', sans-serif ; font-size:30px; color:red;"><?php if (isset($msgconnexionfail)) {
                echo $msgconnexionfail;
            } ?></p>
        
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


        <!-- PROCEDURE D'OUBLIE DE MOT DE PASSE -->
        <?php


        // Je selectionne toutes les données de la table membres pour vérifier que le pseudo existe bien.
        $ob = "SELECT * FROM membres";
        $resultatob = mysqli_query($conn, $ob) or die ('Erreur ' . $ob . ' ' . $mysqli->error);
        $tabob = $resultatob->fetch_assoc();


        if (isset($_POST['pseudo']) && $_POST['pseudo'] != NULL) {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['mail'];


            // Je selectionne le mail du pseudo
            $obmdp = "SELECT * FROM membres WHERE membre_pseudo='" . $pseudo . "'";
            // envoi de la requête
            $resultatobmdp = $bdd1->query($obmdp) or die ('Erreur ' . $obmdp . ' ' . $mysqli->error);
            // resultat de la requete
            $donnees = $resultatobmdp->fetch();
            $mdp = $donnees['membre_mdp'];
            // Je vérifie que les deux cases sont bien remplies
            if (isset($pseudo) && $pseudo != NULL && isset($email) && $email != NULL) {
                // Si le pseudo existe dans la table membres
                if ($pseudo == $donnees['membre_pseudo']) {
                    // SI le mail indiqué est le même mail que celui dans la ligne du pseudo
                    if ($email == $donnees['membre_mail']) {

                        date_default_timezone_set('Etc/UTC');

                        require 'phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
                        $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
                        $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
                        // $mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
                        // $mail->Debugoutput = 'html';

//Set the hostname of the mail server
                        $mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                        $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
                        $mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
                        $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
                        $mail->Username = "dwedealwitheat@gmail.com";

//Password to use for SMTP authentication
                        $mail->Password = "G10Edwe2015";

//Set who the message is to be sent from
                        $mail->setFrom('dwedealwitheat@gmail.com', 'DWE');

//Set an alternative reply-to address
                        $mail->addReplyTo('dwedealwitheat@gmail.com', 'DWE');

//Set who the message is to be sent to
                        $mail->addAddress($email, $donnees['prenom'] . ' ' . $donnees['nom']);

//Set the subject line
                        $mail->Subject = '[DWE] Oublie de mot de passe ';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
                        $mail->charSet = "UTF-8";
                        $mail->msgHTML('<p><strong>Bonjour ' . $pseudo . '</strong> <br><br> Votre mot de passe est le suivant : ' . $mdp . '
                                    <br><br> Merci de ne pas répondre à ce mail ! Ceci est un mail automatique</p>');

//send the message, check for errors
                        if (!$mail->send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        } else {
                            echo "Un mail vous a été envoyé";
                        }
                    } else {
                        echo "L'adresse mail rentrée n'est pas la bonne";
                    }
                } else {
                    echo "Le pseudo n'existe pas ";
                }

            }
        }
        ?>
