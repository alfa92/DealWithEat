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

    <body>


      <div id="problemes">
         

        
            <table>
              <tr>
                        <th > Pseudo </th>
                        <th> Sujet </th>
                        <th> Date </th>
                        
                        
                </tr>
   <tr>
       <td id="tdpseudo"><a href="probleme1.php"><h5><strong> <?php if(isset($_SESSION['login'])){ echo $_SESSION['login']; }  ?> </strong> </h5><img id=ava src="css/images/avatar.png"> </a><br></td>
       <td>
        




 <br></td>
      


       <td id="tdate"><a href="#">  <?php


$jour = date('d');
$mois = date('m');
$annee = date('Y');

$heure = date('H');
$minute = date('i');


echo 'Sujet posté le ' . $jour . '/' . $mois . '/' . $annee .' '. 'à ' . $heure. ' h ' . $minute;
?> </a><br></td>
   </tr>



   
</table>
        


    </body>
    </html>