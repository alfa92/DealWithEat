<?php session_start(); ?><html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    
<script type="text/javascript">
    function updateTextInput(val) {
      document.getElementById('textInput').value=val; 
    }
  </script>
<div id="principal">

    <header>
        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 

    </header>
    
    <body >
        
        <?php if(isset($_SESSION['id_perso'])){ ?>
        <?php $id=$_GET['id'];
            
    $sql=$bdd2->query('SELECT * FROM Annonce WHERE AN_idANnonce="'.$id.'"');
    $row=$sql->fetch();
    $sql4=$bdd2->query('SELECT US_pseudo,US_mail FROM User WHERE US_idUser ="'.$row['US_idUserannonceur'].'"');
    $row4=$sql4->fetch();
    $sql1=$bdd2->query('SELECT * FROM Produit WHERE PR_idP="'.$row['PR_idP'].'"');
    $row1=$sql1->fetch();
    $sql2=$bdd2->query('SELECT * FROM Transaction WHERE AN_idAnnonce="'.$id.'"');
    $row2=$sql2->fetch();
    $sql3=$bdd2->query('SELECT US_pseudo,US_mail FROM User WHERE US_idUser ="'.$row2['US_idUseracheteur'].'"');
    $row3=$sql3->fetch();

if($row2['TR_typetransaction']=='0'){
    $type="achat";   
}else{
    $type="echange";   
}
?>
        
            
        
        <h1><?= $row1['PR_nom']; ?></h1>
        <h2>Proposé à l'<?= $type ?> par <?= $row3['US_pseudo']; ?> </h2>
        
        <br/>
        <center><fieldset style="width:700px">
        <legend><h1>Message de <?= $row3['US_pseudo']; ?></h1></legend>
        <p> <?= $row2['TR_echangecontenu'] ?></p></center>
        </fieldset>
        
        
        <center><p>Si vous n'acceptez pas cet echange cliquer sur refuser sinon compléter votre validation </p>
        <form method="post">
            <input type="submit" name="refus" value="Refuser" />
        </form>
            </center>
        <center><form method="POST" >
            <label for="dispo">Donner vos disponibilités et/ou votre méthode d'envoi</label><br />
            <textarea name="dispo" rows="4" cols="50"> </textarea><br />
            <input type="submit" name="envoi_dispo" />
        </form></center>    
        <?php 
    if(isset($_POST['envoi_dispo'])){
        if(!empty($_POST['dispo'])){
            
         date_default_timezone_set('Etc/UTC');

                        require 'phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
                        $mail = new PHPMailer;
                        $mail->isSMTP();
                        $mail->CharSet = 'UTF-8';
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 587;
                        $mail->SMTPSecure = 'tls';
                        $mail->SMTPAuth = true;

                        $mail->Username = "dwedealwitheat@gmail.com";

                        $mail->Password = "G10Edwe2015";
                
                        $mail->setFrom('dwedealwitheat@gmail.com', 'DWE');

                        $mail->addReplyTo('dwedealwitheat@gmail.com', 'DWE');

                        $mail->addAddress($row3['US_mail'], $row3['US_pseudo']);

                        $mail->Subject = '[DWE] Validation de votre échange';
                
                        $mail->msgHTML('Bonjour '.$row3['US_pseudo'].', <br /> votre demande d\'échange pour le produit :"'.$row1['PR_nom'].'"http://localhost:8888/Github_DWE/DealWithEat/DWE/produit.php?q='. $id.') a été accepté. <br />Voici le message que vous a laissé le vendeur '.$row4['US_pseudo'].' : <br />'.$_POST['dispo'].'<br /> Merci de bien vouloir communique avec lui grâce à son adresse mail : ' .$row4['US_mail'].'    <br /><br /> Ce mail est un mail automatique veuillez ne pas y repondre.'); 

                        if (!$mail->send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        } else {
                            echo "<br />Un mail a été envoyé";
                            $delete=$bdd2->query('DELETE FROM Transaction WHERE TR_idTran="'.$row2['TR_idTran'].'"');
                        }
            
        }else{
            echo "<center>Veuillez indiquer vos disponibilité pour le rendez-vous et/ou votre moyen d'envoi (méthode (ex: envoyer le cheque à mon adresse et je vous envoi le produit))</center>";
        }
}

    
    
    
    
    ?>
        
        
        <?php }else{ ?><h1> Vous n'avez pas accès à cette page si vous n'êtes pas connecté/inscrit </h1> <?php } ?>
    </body>