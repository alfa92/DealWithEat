<?php session_start() ;
?>
<html>


<head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    

    <header
        <?php include('php/config.php'); ?>
        <?php include('php/header.php'); ?>
        <?php include('nav.php'); ?>




    
        <p> Vous avez oublié votre mot de passe ? Pas de problème remplissez les champs ci-dessous pour que l'on vous renvoie un mot de passe </p>

<form METHOD="POST" ACTION="connectez_vous.php">
            <input name="pseudo" class="connectv" type="text" placeholder="Pseudo" required>
            <input name="mail" class="connectv" type="mail" placeholder="Entrez votre email" required>
            <input name="sub_obmdp" class="subobmdp" type="submit" value="Envoyer" >
                  </form>
    </header>
        

       
        
          

            
    
</html>