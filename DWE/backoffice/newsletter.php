<?php session_start(); ?>
<html>
<head>
    <meta charset=UTF-8>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="backoffice.css" media="screen"/>


    <title>Deal With Eat - Backoffice</title>
</head>
<header>
    <?php include('../php/config.php'); ?>
    <?php require('backoffice.class.php'); ?>
</header>

<?php if(isset($_SESSION['id'])!='2'){
    ?>

    <p style="text-align:center;font-family:'Roboto',sans-serif; font-size:14px;"> Vous n'avez pas accés à cette page, pour accéder à cette page vous devez être <a href="Inscription.php" style="text-decoration:underline;">inscrit</a> et <a style="text-decoration:underline;" href="connectez_vous.php">vous connectez</a> à votre compte. <br>

        <a style="text-decoration:underline;" href="../accueil.php">Retour à l'accueil</a></p>
    <?php ;}else {


?>
<body>


<div id="navcontainer">

    <!-- Nav -->
    <nav id="nav">
      <a href="adminmembre.php"><img style="width:100px;margin-left:25%;margin-top:50px;"src="../css/images/logoDWE.png" /></a>

        <ul>
            <li><a href="membreadmin.php"> Membres </a></li>
            <li><a href="adminannonce.php"> Annonces </a></li>
            <li><a href="#"> Forum </a></li>
            <li><a href="adminfaq.php"> FAQ </a></li>
            <li><a href="../accueil.php" TARGET=_BLANK> Voir le site</a></li>
            <li><a href="logout.php"> Deconnexion</a></li>
        </ul>
    </nav>
<div id="back_right">

    <a href="adminmembre.php">
    <h1> Interface Administrateur </h1>
</a>

    
<?php
    
    
    $sql=$bdd2->query('SELECT * FROM User WHERE US_news = 1 ');
    $newsletter=$bdd2->query('SELECT * FROM `newsletter`');
    $news=$newsletter->fetch();
    $annonce=$bdd2->query('SELECT * FROM Annonce LIMIT 5');
    
    
?>

<fieldset>
    <legend><h2>Aperçu de la Newsletter </h2></legend>
    <p>
        Bonjour, <br />
       <?php echo nl2br($news['NE_texte1'])."<br />".$news['NE_image1']."<br />".nl2br($news['NE_texte2'])."<br />".$news['NE_image2']."<br />" ;
    echo "Les dernières annonces : ";
    while($ann=$annonce->fetch()){
    $produit=$bdd2->query('SELECT * FROM Produit WHERE PR_idP="'.$ann['PR_idP'].'" LIMIT 5');
     while($prods=$produit->fetch()){ 
        $annonces= $prods['PR_nom']."- ".$ann['AN_quantite']."".$ann['AN_unite']."-".$ann['AN_prix']."€ , ";
    echo $annonces;}
   
 
    }
    ?>
    </p>

</fieldset>
    <fieldset>
    <legend><h2>Modifier la newsletter</h2></legend>
    <p>
        <form method="post" action ="#">
            <textarea name="texte1" cols="50" rows="10"></textarea><br />
            <input type="file" name="image1" /><br />
            <textarea name="texte2" cols="50" rows="10"></textarea><br />
            <input type="file" name="image2" /><br />
            <input type="submit" name="submit_news" value="Changer la newsletter" />
        </form>
    </p>
    <?php 
    if(isset($_POST['submit_news'])){
        $sql=$bdd2->query('UPDATE newsletter SET NE_texte1="'.nl2br($_POST['texte1']).'",NE_texte2="'.nl2br($_POST['texte2']).'",NE_image1="'.$_POST['image1'].'",NE_image2="'.$_POST['image2'].'" WHERE 1');
        
    }else
    {
           
    }
    
    
    
    ?>

</fieldset>
    
    
<center>
<form method="post" action ="#">
            <input type="submit" name="send_news" value="Envoyer la newsletter" />
        </form>
         <?php 
        $amail=$bdd2->query('SELECT US_mail,US_pseudo FROM User WHERE US_news= 1');

    $body="<h1 style='font-family:'roboto''> Bonjour  </h1><br />
                        <p style='font-family:'roboto'>".nl2br($news['NE_texte1'])."<br />"
                                       .$news['NE_image1']."<br />"
                                            .nl2br($news['NE_texte2'])."<br />"
                                                    .$news['NE_image2']."<br /><br /> <h2> Dernières annonces en lignes : <br />"
                                       .$annonces.'</p>
                                       <br />
                                       <img src="../css/images/mail_image.png" width="600px" />'
                                      ;
    
    if(isset($_POST['send_news']))    {
        
          date_default_timezone_set('Etc/UTC');

                        require '../phpmailer/PHPMailerAutoload.php';

                                               
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



                       while($email=$amail->fetch()){
             $mail->AddBCC($email[0]);
        

                        $mail->Subject = '[DWE] NEWSLETTER';
                       
                        $mail->msgHTML($body);

    
                       }
                        if (!$mail->send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        } else {
                            echo "Un mail vous a été envoyé";
                        }
    }
    }
    ?>
    </center>
    </div>
</div>
   
</body>
</html>
