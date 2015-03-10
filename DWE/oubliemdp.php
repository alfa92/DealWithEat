<?php session_start() ;
phpinfo(); ?>
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


 <?php  

                    // Je selectionne toutes les données de la table membres pour vérifier que le pseudo existe bien.
                    $ob="SELECT * FROM membres";
                 $resultatob = mysqli_query($conn,$ob) or die ('Erreur '.$ob.' '.$mysqli->error);
                $tabob = $resultatob->fetch_assoc();


            if(isset($_POST['pseudo']) && $_POST['pseudo']!=NULL){
                $pseudo=$_POST['pseudo'];   
                $mail=$_POST['mail'];
                
            // Je selectionne le mail du pseudo
            $obmdp = "SELECT membre_mail,membre_mdp,membre_pseudo FROM membres WHERE membre_pseudo='".$pseudo."'";
            // envoi de la requête
            $resultatobmdp = mysqli_query($conn,$obmdp) or die ('Erreur '.$obmdp.' '.$mysqli->error);
            // resultat de la requete
            $tabobmdp = $resultatobmdp->fetch_assoc();
                        
                // Je vérifie que les deux cases sont bien remplies
                        if(isset($pseudo) && $pseudo!=NULL && isset($mail) && $mail!=NULL){
                            // Si le pseudo existe dans la table membres
                            if($pseudo==$tabob['membre_pseudo']){
                                // SI le mail indiqué est le même mail que celui dans la ligne du pseudo
                                if($mail==$tabobmdp['membre_mail']){ 
                                    echo "Vous allez recevoir un email à l'adresse indiquée";
// Le message
$message = "Bonjour ".$tabobmdp['membre_pseudo'].", \r\n Le mot de passe lié à votre compte est le suivant \r\n Mot de passe = " .md5($tabobmdp['membre_mdp']).". \r\n Ne pas réponde à ce message, merci. A bientot sur Deal With Eat  ";

// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Envoi du mail
mail($tabobmdp['membre_mail'], '[Deal With Eat] Oublie mot de passe', $message);

                                }else{
                                    echo "L'adresse mail rentrée n'est pas la bonne";}
                            }else{ 
                                echo "Le pseudo n'existe pas ";}
                            
                        }
                    }
            ?>
    
        <p> Vous avez oublié votre mot de passe ? Pas de problème remplissez les champs ci-dessous pour que l'on vous renvoie un mot de passe </p>
            
             <form ACTION="oubliemdp.php" METHOD="POST"> 
            <input name="pseudo" class="connectv" type="text" placeholder="Pseudo" required>
            <input name="mail" class="connectv" type="mail" placeholder="Entrez votre email" required>
            <input name="sub_obmdp" class="subobmdp" type="submit" value="Envoyer" >
                  </form>
    </header>
        

       
        
          

            
    
</html>