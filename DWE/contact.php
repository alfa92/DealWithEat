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
            <input type="radio" name="x" value="un"><label style="width: 200px;" for="probl"> Problème</label>
            <br>
            <input type="radio" name="x" value="deux"><label style="width: 200px;" for="suggest"> Suggestion</label>
            <br>

            
     

            <br>
            <input name="titre_mail" placeholder="Sujet de mail" required/>
            <input name="qui" placeholder="Votre pseudo">
            <br>
            <br>
            <textarea name="contenu" placeholder="Contenu du mail" rows="10" cols="100"></textarea>
            <br>
            <center><input type="submit" value="Envoyer le mail"></center>
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

        ?>

        <?php date_default_timezone_set('Etc/UTC');

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
                        $mail->msgHTML('<p><strong> Bonjour, vous avez reçus un mail de la part de </strong>  '.$_SESSION['qui'].' <br><br><br> <strong> Voici son mail: </strong> '.$_SESSION['contenu'].'  ');
                                  

//send the message, check for errors
                        if (!$mail->send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        } else {
                            echo "Votre message à bien été pris en compte. Nous vous recontacterons dans les plus bref delais";
                        }
                        ?>

        </body>

        <?php include('php/pied_de_page.php'); ?>


</html>