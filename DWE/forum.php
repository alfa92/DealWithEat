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

          $article=$DB->query('SELECT * FROM forumQ');

    ?>
    
    
<a href="questionforum.php"> Poster un article </a>

    
        <body>
           <div id="techniques">
            <h1> Techniques </h1>
        </div>

            <div id="probleme">

            <table id="tableforum">
              <tr>
                        <th> Sujet </th>
                        <th> Reponse </th>
                        <th> Date </th>
             </tr>
               <?php foreach ($article as $article): ?>
   <tr>
       <td><a href="probleme1.php"> <?php echo $article->Fo_Sujet ;?> </a><br></td>
       <td><a href="#"> <?php echo $article->Fo_Pseudo ;?>  </a><br></td>
       <td><a href="#"> <?php echo $article->Fo_Date ;?>  </a><br></td>
   </tr>

 <?php endforeach ?>
   
</table>


   
</table>
            
            
            
        </body>
    </div>   
    
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>