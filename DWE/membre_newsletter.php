<?php session_start() ?>

<html>
    <head>
        <link rel="icon" type="image/png" href="css/images/logoDWE.png" />
        <meta charset=UTF-8>
        <meta name="description" content="Deal With Eat est un site d'échange et de vente de fruits et légumes entre particuliers. Une personne à coté de chez vous échange peut être votre fruit préféré.">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
       
        

        <title>Deal With Eat</title>
        
    </head>
    <header>

    <!-- Inclusion des page communes aux pages -->

        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
        <?php if (isset($_SESSION['id']) && $_SESSION['id'] == '1') {
                include('nav_connect.php');
            }else{
                include('nav.php');
            } ?>
         
        
        
       <center> 
           <?php
            $sql=$bdd2->query('SELECT * FROM User WHERE US_idUser="'.$_SESSION['id_perso'].'"')->fetch();
            if(isset($_POST['news_sub']))
            {
                $sql=$bdd2->query('UPDATE User SET US_news = "'.$_POST['newsletter'].'" WHERE US_pseudo="'.$_SESSION['login'].'"');
                echo "<br />Votre choix a été pris en compte";
                
                // Je selectionne le mail du pseudo
            $inscriptionnl =$bdd2->query("SELECT * FROM user WHERE US_idUser='" . $_SESSION['id_perso'] . "'") or die ('Erreur ' . $inscriptionnl . ' ' . $mysqli->error);
            // resultat de la requete
            $donnees = $inscriptionnl->fetch();
                 if($_POST['newsletter']==1){ 
    
    $body="<h1>Bonjour ".$donnees['US_prenom']."</h1>
           <p style='  font-family: 'Roboto', sans-serif;'> Je vous envois ce mail pour vous prévenir que votre inscription à la newsletter à bien été prise en compte. 
            <br />
             <br /> 
             <br /> 
            <hr />
            <img src='css/images/mail_image.png' width='600px' />
            <br /> 
           Deal With Eat vous remercie de l'utilisation de son site et vous souhaite une bonne continuation avec toute notre équipe .
           
           <br />
           <br />
           <br />
           <center>Ceci est un mail automatique, merci de ne pas y répondre .</center></p>" ;

}else{ 
    
      $body="<h1>Bonjour ".$donnees['US_prenom']."</h1>
           <p style='  font-family: 'Roboto', sans-serif;> Je vous envois ce mail pour vous prévenir que votre désinscription à la newsletter à bien été prise en compte. 
            <br />
             <br /> 
             <br /> 
            <hr />
            <img src='css/images/mail_image.png' width='600px' />
            <br /> 
           Deal With Eat vous remercie de l'utilisation de son site et vous souhaite une bonne continuation avec toute notre équipe .
           
           <br />
           <br />
           <br />
           <center>Ceci est un mail automatique, merci de ne pas y répondre .</center></p>" ;
}

          
    
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

                        $mail->addAddress($donnees['US_mail'], $donnees['US_prenom'] . ' ' . $donnees['US_nom']);

                        $mail->Subject = '[DWE] Inscription à la Newsletter ';
                
                        $mail->msgHTML($body); 

                        if (!$mail->send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        } else {
                            echo "<br />Un mail vous a été envoyé";
                        }
            }else
            {
                
            }

        ?>
        </center>
        
</header>
    <body>
        
        <h1> Inscription à la newsletter </h1>
            <h2> Inscrivez-vous ou désinscrivez-vous à la newsletter </h2>
        
        <i style="margin-left:10%;width:45%;"> Que contient notre Newsletter ?</i>
            <p style="margin-left:20%;width:45%;">Elle contient les derniers produits ajouté dans votre région.<br /> Les denières mise à jour du site internet.<br /> Des offres privilèges et quelques pubs vers d'autres sites qui nous ont intéressés</p>
        
      <center><form action="#" method="POST">
                <label for="newsletter">M'inscrire </label>
                <input type="radio" name="newsletter" value="1" />
                <label for="newsletter">Me désinscrire </label>
                <input type="radio" name="newsletter" value="0" /><br />
               <input type="submit" name="news_sub" value="Envoyer" />
        </form>
       
        </center> 
        
    </body>
         
            <?php include('php/pied_de_page.php'); ?>
        
</html>