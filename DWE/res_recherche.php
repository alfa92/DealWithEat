<?php $expire = 365*24*3600;
setcookie("id",time()+$expire);session_start() ?>
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


        <?php
                $search=$_GET['search'];

        $s=explode(" ",$search);
        print_r($s);
        $research = $DB->query('SELECT * FROM Produits ');
        foreach ($research as $research):

            echo $research->Pr_Nom;

        endforeach;

        ?>
    </body>

    </div>
</html>
    
