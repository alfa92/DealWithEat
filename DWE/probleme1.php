<?php session_start() ;?>

<html>


 <script src="fichier.js" type="text/javascript"></script>
    <script type="text/javascript">
        
    </script>

    
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

          $article=$DB->query('SELECT * FROM forumQ');

    ?>


    <body>
      <div id="problemes">
            <table>
              <tr>
                        <th > Pseudo </th>
                        <th> Sujet </th>
                        <th> Date </th>     
                </tr>
                <?php foreach ($article as $article): ?>
   <tr>
       <td id="tdpseudo"><a href="probleme1.php"><h5><strong> <?= $article->Fo_Pseudo; ?>  </strong> </h5><!--img id=ava src="css/images/avatar.png"--> </a><br></td>
       <td><?= $article->Fo_Contenu; ?> 
        
 <br></td>
      


       <td id="tdate"><a href="#"> 
       <?= $article->Fo_Date; ?> 
   </a><br></td>
   </tr>

<?php endforeach; ?>

   
</table>







        


    </body>
    </html>