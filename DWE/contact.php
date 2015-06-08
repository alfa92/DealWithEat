<html>
<head>
    <meta charset=UTF-8>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>

    <title>Deal With Eat</title>

</head>
<div id="body">
    <div id="principal">
        <header>
            <?php include('php/config.php'); ?>
            <?php include('php/header.php'); ?>
            <?php if (isset($_SESSION['id']) && $_SESSION['id'] == '1') {
                include('nav_connect.php');
            } else {
                include('nav.php');
            } ?>


        </header>
        <body>
        <h1 id="FAQh1" style="border-bottom:2px dotted gray;width:90%;"> Contacter nous </h1>

        <form id="formmail" action="contact.php" style="width:60%;" method="post">
            

            
     

            <br>
            <label   for="titre_mail"><strong>Sujet : </strong></label>
            <input name="titre_mail" placeholder="Sujet de mail" required/>
            <label id="qui"  for="qui"><strong>Pseudo : </strong></label>
            <input name="qui" placeholder="Votre pseudo" required/>
            <label  id="mail"  for="mail"><strong>Mail : </strong></label>
            <input name="mail" placeholder="Votre Mail" required/>
            <br>
            <br>
            <textarea name="contenu" placeholder="Contenu du mail" rows="10" cols="100" required/></textarea>
            <br>
            <center><input name="submit" type="submit" value="Envoyer le mail"></center>
        </form>
        <table>
              <tr>
                        <th > Votre pseudo </th>
                        <th> Votre mail </th>
                             
                </tr>

        <?php
          if(isset($_POST['contenu'])){
            $_SESSION['contenu']=$_POST['contenu'];
        }
          if (isset($_POST['qui'])){
            $_SESSION['qui']=$_POST['qui'];
          }
          if (isset($_POST['mail'])){
            $_SESSION['mail']=$_POST['mail'];
          }

        ?>


        <?php if (isset($_POST['submit'])){

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
                        $mail->addAddress('dwedealwitheat@gmail.com', 'DWE');

//Set the subject line
                        $mail->Subject = '[DWE] Contact du client ';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
                        $mail->charSet = "UTF-8";
                        $mail->msgHTML('<p><strong> Bonjour, vous avez reçus un mail de la part de </strong>  '.$_SESSION['qui'].' <br><br><br> <strong> Voici son message: </strong> '.$_SESSION['contenu'].'   <br> <strong>Lui repondre: </strong> '.$_SESSION['mail'].'  ');
                                  

//send the message, check for errors
                        if (!$mail->send()) {

                            echo "Mailer Error: " . $mail->ErrorInfo;
                        } else {
                            echo "Votre message à bien été pris en compte. Nous vous recontacterons dans les plus bref delais <br> <a href='accueil.php'> <strong> Cliquez ici pour retourner à l'acceuil </a> </strong>";
                        }
                    }
                        ?>

        </body>

        <?php include('php/pied_de_page.php'); ?>


</html>