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
           <div id="actgauche">               
            <h1> Le fruit légume </h1>
               <p> Il n'est pas rare d'entendre des polémiques concernant, par exemple, l'appartenance de la tomate, ou de la courgette à la famille des légumes ou à celle des fruits. Ces polémiques n'ont pas lieu d'être : en effet, les deux réponses sont correctes selon le point de vue que l'on adopte. Ce sont des fruits au sens botanique. Ce sont des légumes sous l'angle de la consommation et du langage général. Le terme légume n'a pas de sens précis en botanique et stricto-sensu il désignait la gousse (en latin legumen) des légumineuses avant de s'étendre tardivement à l'ensemble des légumes que nous connaissons. Dans le langage courant, il désigne généralement une plante cultivée au jardin ou dans les champs. Un fruit peut donc bien être un légume. Certains peuvent être consommés comme légume ou comme dessert : le melon est un fruit qui se consomme comme fruit (au dessert) ou comme légume (en hors-d'œuvre). </p><br>
            <div id="action"><a href="#cible"> Commenter</a>
             
            <a id="like"> J'aime </a>
                   <form id="cible">
                <textarea id="paragraph_text" name="comment" cols="80" rows="3"></textarea><br>
                    <input id="comment" name='comment_sub' type=submit value="Commenter">
                    
                </form>
                </div>
            </div>
            
                       <div id="actgauche">
            <h1> Le fruit légume </h1>
               <p> Il n'est pas rare d'entendre des polémiques concernant, par exemple, l'appartenance de la tomate, ou de la courgette à la famille des légumes ou à celle des fruits. Ces polémiques n'ont pas lieu d'être : en effet, les deux réponses sont correctes selon le point de vue que l'on adopte. Ce sont des fruits au sens botanique. Ce sont des légumes sous l'angle de la consommation et du langage général. Le terme légume n'a pas de sens précis en botanique et stricto-sensu il désignait la gousse (en latin legumen) des légumineuses avant de s'étendre tardivement à l'ensemble des légumes que nous connaissons. Dans le langage courant, il désigne généralement une plante cultivée au jardin ou dans les champs. Un fruit peut donc bien être un légume. Certains peuvent être consommés comme légume ou comme dessert : le melon est un fruit qui se consomme comme fruit (au dessert) ou comme légume (en hors-d'œuvre). </p><br>
            <div id="action"><a href="#cible1"> Commenter</a>
             
            <a id="like"> J'aime </a>
                   <form id="cible1">
                <textarea id="paragraph_text" name="paragraph_text" cols="80" rows="3"></textarea><br>
                    <input id="comment" type=submit value="Commenter">
                    
                </form>
                </div>
            </div>
            
            
            
            
            
            
            
           
            <div id="actdroite">
                <div class="lastarticle">
            <h1> Derniers articles </h1>
               
               <a href="#"> La polution des fruits </a><br>
                <a> La polution des fruits </a><br>
                <a> La polution des fruits </a><br>
                <a> La polution des fruits </a><br>
                <a> La polution des fruits </a><br>
                </div>
                <div class="moreview">
             <h1> Articles les plus vues </h1>
               
               <a href="#"> La polution des fruits </a><br>
                <a> La polution des fruits </a><br>
                <a> La polution des fruits </a><br>
                </div>
                    <div class="bestblog">
             <h1> Les meilleurs bloggeurs </h1>
               
               
                <a href="#"> Paulo </a><br>
                <a> I'likeFruit </a><br>
                <a> Music&Fruit </a><br>
              </div>
                
            </div>
            
            
            
        </body>
    </div>   
    
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>