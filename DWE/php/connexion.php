<?php 

    $msg='';
    $msgconnexionfail='';

    
    
    if(isset($_POST['login'])){
        $login=$_POST['login'];
    }else{
        $login=NULL;
    }

    if(isset($_POST['pass'])){
        $pass=md5($_POST['pass']);
    }else{
        $pass=NULL;
    }


?>


<?php 
    $requete = "SELECT * FROM membres WHERE membre_pseudo='".$login."'";

// envoi de la requête
$resultat = mysqli_query($conn,$requete) or die ('Erreur '.$requete.' '.$mysqli->error);
// resultat de la requete
$ligne = $resultat->fetch_assoc();


    if(isset($_POST['subconnect'])){
            if($pass==$ligne["membre_mdp"]){
        
        
        $_SESSION['login']=$login;
        $msgconnexion="Bienvenue ".$_SESSION['login']."";
                $_SESSION['id']='1';
        
      
    }else{
        $msgconnexionfail= "La connexion a échoué, veuillez réessayer";

    }
    }
        if(isset($_SESSION['login']) ){
    if($_SESSION['id']=='1'){
        ?> <div id="connecterdiv" > <p>Bonjour <?php echo $_SESSION['login'] ?>
</p><img id="avatar_little" src=css/images/avatar.png ></div> <?php
            $_SESSION['id']='1';
       }
    else{
         ?> <div id="connectdiv" >
            
            <a id="connect" > Connectez-vous <img  src="css/images/arrow486.png"> </a>
            
            <form ACTION="accueil.php" METHOD="POST"> 
            <input name="login" class="connect" type="text" placeholder="Pseudo">
            <input name="pass" class="connect" type="password" placeholder="Mot de passe">
            <input name="subconnect" class="subconnect" type="submit" value="Ok" >
                  </form>
                <p STYLE="margin-top:-15px;"> Pas encore inscrit ? <a href="Inscription.php" style="color:black; text-decoration:none;border-bottom:1px dotted black ">Rejoignez-nous</a> </p>
          
                
        </div> <?php
        }
        }else{
        ?> <div id="connectdiv" >
            
            <a id="connect" > Connectez-vous <img  src="css/images/arrow486.png"> </a>
            
            <form ACTION="accueil.php" METHOD="POST"> 
            <input name="login" class="connect" type="text" placeholder="Pseudo">
            <input name="pass" class="connect" type="password" placeholder="Mot de passe">
            <input name="subconnect" class="subconnect" type="submit" value="Ok" >
                  </form>
                <p STYLE="margin-top:-17px;"> Pas encore inscrit ? <a href="Inscription.php" style="color:black; text-decoration:none;border-bottom:1px dotted black ">Rejoignez-nous</a> </p>
<p STYLE="margin-top:-20px;"><a href="oubliemdp.php" style="color:black; text-decoration:none;border-bottom:1px dotted black ">Mot de passe oublié ?</a> </p>
          
                
        </div> <?php }
?>




