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

          $article=$bdd2->query('SELECT * FROM forumq');
          while ($articles = $article->fetch())
{

    ?>


    <body>
      <div id="problemes">
            <table>
              <tr>
                        <th > Pseudo </th>
                        <th> Sujet </th>
                        <th> Date </th>  
                        <form action="forum.php">
                        <input id="repondre" type="submit" value="Repondre" style="width:130px">  
                       </form>
                </tr>
               
   <tr>
       <td id="tdpseudo"> <?php echo $articles['q_pseudo']; ?>
 <br></td>
       <td><?php echo $articles['q_contenu']; ?> 

        
 <br></td>
      


       <td id="tdate"><a href="#"> 
       <?php echo $articles['Date']; ?>
   </a><br></td>
   </tr>

<?php
}

$article->closeCursor(); // Termine le traitement de la requête

?>


   
</table>







        


    </body>
    </html>