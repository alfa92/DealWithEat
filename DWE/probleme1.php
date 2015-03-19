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

        <div id="question">
            <h1> Poser vos question ici </h1>
            <textarea id="paragraph_text" cols="80" rows="3"></textarea><br>


              <div id="action"><a href="#cible"> Commenter</a>
             
            <a id="like"> J'aime </a>
                   <form id="cible">
                <textarea id="paragraph_text" name="comment" cols="80" rows="3"></textarea><br>
                    <input id="comment" name='comment_sub' type=submit value="Commenter">
                    
                </form>
                </div>
        </div>


    </body>