<?php session_start(); ?>  
<?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
        <?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){
                            include('nav_connect.php');}else{
                                include('nav.php');} ?>

<html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
        <body>
            
            
            
        </body>

</html>