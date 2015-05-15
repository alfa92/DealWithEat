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
<?php 

    $a=$_GET['a'];
    $article=$bdd2->query('SELECT * FROM forumq WHERE idforum="'.$a.'"'); 
 while ($articles = $article->fetch())
{ ?>
   <tr>
       <td> <?php echo $articles['Fo_Sujet'] ;?> </a><br></td>
       <td> <?php echo $articles['Fo_Pseudo'] ;?>  </a><br></td>
       <td> <?php echo $articles['com'] ;?>  </a><br></td>
   </tr>

 <?php } 
 $article->closeCursor();?>
    
    </body>