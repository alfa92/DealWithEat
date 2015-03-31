<?php session_start() ;?>
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
        <?php include('php/header.php'); ?>
        <?php include('php/connexion.php'); ?>
  <?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?>
    
    </header>
    
    
    
    <?php 
if(isset($_POST['sujet'])){
         $sujet=$_POST['sujet'];
         }

$sql = "INSERT INTO `faqq`(`Fq_idFAQ`, `Fq_Sujet`, `Fq_Date`, `Fq_Contenu`, `Membres_Me_idMembres`) VALUES ('','".$sujet."','','','')";

            
      if ($conn1->query($sql) == TRUE) {
                // Si ça marche on affiche le résultat
   } else {
                // Sinon on affiche une erreur
    echo "Error: " . $sql . "<br>" . $conn1->error;
}
 ?>


    
        <body>
    <div id="formulairequest">

<form action="questionforum.php" method="post">

<ul>
   <li>
      <label><strong>Pseudo</strong></label>
      <input name="pseudo" type="text" placeholder="ecrivez votre pseudo ici"/>
   </li>

   <li>
      <label><strong> sujet </strong></label>
      <input type="text" name="sujet" placeholder="Votre sujet"/>
   </li>
                     
   <li>
      <textarea id="boitemsg" class="cadre" name="boitemsg" placeholder="Ecrivez votre question ici"/></textarea>
   </li>
                     
   <button type="button" id="btnenvoyer"> <a href="probleme1.php">Envoyer</a></button>                     
</ul>
</form>




</div>
   
</body>
</html>
