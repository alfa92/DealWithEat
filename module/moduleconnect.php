    <?php 
    session_start();
    include("connectionMySQL.php");
    if(isset($_POST['connect']))
    { 
        if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) 
            && isset($_POST['password']) && !empty($_POST['password']))

        {

            $user=mysql_escape_string($_POST['pseudo']);
            $mdp=mysql_escape_string(md5($_POST['password']));

            $req1=mysql_query('SELECT * FROM membres WHERE membre_pseudo="'. $user . '"');
            $info_membre=mysql_fetch_array($req1);



            if(!isset($info_membre['pseudo']))
            {
                if($password==$info_membre['password'])
                {
                //mdp bon
                    
                    $sucess1= " Vous êtes connécté à votre compte ."; 
                    $_SESSION['pseudo']=$user ;   
                }
                else{

                    //mdp erroné
                    $erreur1 = "Le mot de passe est incorrect";

                }
            }
            else{
                $erreur1 = "Le pseudo n'existe pas";
            }
        }
        else{
            $erreur1 = "Tous les champs sont obligatoires";
        }   
    }   

    ?>


    <div id="connect">
        <p> Connecte toi </p>
        <form  action="accueil.php" method="post" id="register">
            <div>
                <label for="pseudo">Pseudo </label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo"> 
            </div>
            <div class="password">
                <input type="password" id="password" name="password" placeholder="Mot de passe"> 
            </div>
            <input type="submit" id="connectsu" name="connect" value="Se connecter" /> </br>
            <a href="inscription.html" > Pas encore inscrit ?</a>
        </form>

    </div>

    <?php 

    if(isset($erreur1))
    {
        echo $erreur1;
    }

    ?>
    <?php 

    if(isset($sucess1))
    {
        echo $sucess1;
    }

    ?>