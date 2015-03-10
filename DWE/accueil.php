<?php session_start() ?>
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
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
			
    
    </header>
    
    
    <body>
        
            <div id="presentation">
                
                <p style="text-align:center;font-family:'Roboto' sans-serif ; font-size:30px; color:Green;"><?php if(isset($msgconnexion)){echo $msgconnexion;} ?></p>
                <p style="text-align:center;font-family:'Roboto' sans-serif ; font-size:30px; color:red;"><?php if(isset($msgconnexionfail)){echo $msgconnexionfail;} ?></p>
                
                <h1> Le principe </h1>
                <p>
                    Deal With Eat est un site d'échange et de vente de fruits et légumes fraits entre particuliers. 
                    Les produits présents sur le site viennent tous de potager de particulier ou de ferme. 
                    <br>
                    Sur ce site vous pouvez échanger et acheter vos produits. Lors d'un échange il faudra proposer un échange équitable, ainsi chacun pourra consommer les produits d'autres particuliers.
                </p>
                
            </div>
        <img id="principe" src="css/images/vegetable.jpg">
        
        <div id="ccm">
                <h1> Comment ça marche ? </h1>
                <p>
                Notre site offre trois modes de navigation. Le premier est le mode "non inscrit" ce mode permet à l'utilisateur de voir le site sans action de sa part. Le deuxième "inscrit lite" est une inscription rapide qui permet à l'utilisateur d'acheter des produits sur notre site et d'intéragir avec les autres utilisateurs via la FAQ ou la page d'actualité. Enfin vient "l'inscrit complet", ce dernier a les mêmes droits que "l'inscrit lite" mais il peut vendre et échanger des produits. 
                    Pour vous inscrire c'est très simple, il suffit de vous rendre sur la <a href="Inscription.php"> page d'inscription</a>.
                </p>
            </div>
        <img id="ccmimg" src="css/images/carrots.jpg">

        </body>
        
    </div>   
    
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>