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
        <?php 
        $id=$_GET['id'];
        $type=$_GET['type'];

                    $sql=$bdd2->query('SELECT * FROM Transaction WHERE AN_idAnnonce="'.$id.'"');
                    $affiche=$sql->fetch();
        ?>
        <div id="principal">
        <body>
            <?php 
if(isset($affiche['US_idUseracheteur'])){
    $user=$affiche['US_idUseracheteur'];
}

if($user==$_SESSION['id_perso']){
            ?> <h1> Vous avez déjà envoyé une demande pour ce produit.</h1> <?php
        }else{
            
            $sql1=$bdd2->query('INSERT INTO Transaction VALUES ("", "'.$_SESSION['id_perso'].'", "'.$id.'", "","", "'.$type.'")');
            ?> <h1>Votre demande pour ce produit a été envoyé.</h1> <?php            
        }
            
            ?>
        </body>
</div>
</html>