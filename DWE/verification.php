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
                <?php include('php/connexion.php'); ?>
                <?php include('php/header.php'); ?>
                <?php if (isset($_SESSION['id']) && $_SESSION['id'] == '1') {
                    include('nav_connect.php');
                } else {
                    include('nav.php');
                } ?>


            </header>
            <body>
                <table id="estetiks">
                  <tr>
                            <th > Votre pseudo </th>
                            <th> Votre mail </th>
                                 
                    </tr>
                    
           <td id="plcmt"><?php if(isset($_GET['qui'])){ echo $_GET['qui']; }  ?></td>
           <td id="stylecontenu"><?php if(isset($_GET['contenu'])){ echo $_GET['contenu']; }  ?> </td>
        
               </table>
                
              
              <center><input type="submit" name="subenvoyer" id="btnenvoyer" value="Envoyer"></center>

                </body>

                <?php
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
                            $mail->addAddress($qui=$_GET['qui']);

    //Set the subject line
                            $mail->Subject = '[DWE] contact ';

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
                            $mail->charSet = "UTF-8";
                            $mail->msgHTML('<br> voici une question : 
                                        <br>');

    //send the message, check for errors
                            if (!$mail->send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else {
                                echo "Un mail vous a été envoyé";
                            }

                ?>

            <?php include('php/pied_de_page.php'); ?>


    </html>