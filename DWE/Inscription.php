<?php session_start() ?>
<html>
    <head>
        <meta charset=UTF-8>
       <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    
<div id="principal">
    <header>
        
        <?php include('php/config.php'); ?>
        <?php include('php/header.php'); ?>
        <?php include('php/connexion.php'); ?>
		<?php include('nav.php'); ?> 	
			
    
    </header>
    
    
<body>
		<div class="rgstr">
			<form method="post">
				<div class="rgstr-main">
				<h3> Inscription </h3>

<?php 
								$_SESSION['login'] = NULL ;
								                // On vérifie que les trois input 'login','pass' et 'pass' deux sont remplis et si ils sont remplis
								                // on associe une variable au mot rentré dans l'input
								if (isset($_POST['login'])) {
									$login=$_POST['login'];
								}
								if (isset($_POST['pass'])) {
								    $pass = md5($_POST['pass']); // Le md5 signifie que l'on crypte le mot de passe (il existe d'aute méthode de cryptage comme le sha1
								}
								if (isset($_POST['pass2'])) {
									$pass2=$_POST['pass2'];
								}
								if (isset($_POST['mail'])) {
									$mail=$_POST['mail'];
								}


								                // On vérifie que l'utilisateur a envoyé le formulaire
									if(isset($_POST['submit']))
                                    {
								// Si il l'a fait on vérifie que les 4 input principaux sont remplis
										if(isset($_POST['login']) && !empty($_POST['login'])
											&& isset($_POST['pass']) && !empty($_POST['pass'])
											&& isset($_POST['pass2']) && !empty($_POST['pass2'])
											&& isset($_POST['mail']) && !empty($_POST['mail'])){

								        }else{
								            // Sinon on affiche le message
								            echo 'Veuillez remplir les champs obligatoires s\'il vous plait';
											?><?php
										}
                                        
                                        
                                                    // On vérifie alors que les deux mots de passes sont les mêmes.
                                       $query = mysqli_query($conn2,"SELECT US_pseudo FROM User WHERE US_pseudo = '$login'");
                                                if(mysqli_num_rows($query) == 0){
                                                             $query1 = mysqli_query($conn2,"SELECT US_mail FROM User WHERE US_mail = '$mail'");
                                                if(mysqli_num_rows($query1) == 0){
                                                    if($_POST['pass'] == $_POST['pass2'])
                                                    {   
                                                                 $sql = "INSERT INTO User VALUES ('','".$_POST['nom']."','".$_POST['prenom']."',
                                                                    '".$_POST['pays']."','".$_POST['ville']."','".$_POST['adresse']."',
                                                                    '','".$login."','" . $mail . "','".$pass."','".$_POST['age']."','','','')";


											                 if ($conn2->query($sql) == TRUE) 
                                                             {
								                                            // Si ça marche on affiche le résultat
								                                        ?><p style="text-align:center;"> Votre compte a été créé avec succés !</p><?php 
								                            } else 
                                                             {
                                                                        // Sinon on affiche une erreur
                                                            echo "Error: " . $sql . "<br>" . $conn2->error;
								                            }
										          }else
                                                    {   
                                                    // Si les mots de passe ne sont pas les mêmes on affiche un message
                                                                echo "Les mot des passes ne sont pas les mêmes ! ";
										              }		
                                        }else{
                                        ?><p style="text-align:center;">Un compte associé à ce mail existe déjà !</p><?php 
                                        }
                                                }else{
                                                     ?><p style="text-align:center;">  Le pseudo existe déjà ! </p><?php 
                                                }
									}
?>

								<input type="text" name='login' placeholder="Pseudo" required/>
								<input type="password" style="width:30%;" name='pass' placeholder="Mot de passe"  required/>
								<input type="password" name='pass2' placeholder="Retapez votre mot de passe" required/></br>
								<input type="mail" name='mail' class="email" placeholder="Enter Email"  required/></br>
							
							<div id="rgstr-plus">
								<a href="#rgstr-plus">
								<i class="fa fa-plus fa-2x" > </i>Inscription complète</a>   
							<ul>
								<input type="text" name='nom' placeholder="Nom"  /></br>
								<input type="text" style="width:30%;" name='prenom' placeholder="Prenom"/><br>
								<input type="text"  name='adresse' class="email" placeholder="Adresse"/><br>
								<input type="text" name='pays' class="pass2" placeholder="Pays"/></br>
								<input type="text" name='ville' class="pass2" placeholder="Ville"/></br>
								<label for='date'> Date de naissance (AAAA-MM-JJ) </label>
								<input type="date" name='age' class="pass2" placeholder="Date de naissance"/> </br>
							</ul>
                
            		</div>
            			<input type="checkbox" name="reglement" required/>
            			<label for="reglement"> J'ai lu et j'accepte les <a href="conditions.php"><i> Conditions d'utilisation </i></a></label>
            			<br>
						<input class="r-submit" name='submit' style="cursor:pointer;" type="submit"  value="S'inscrire"/>
					</div>
				</form>
      		</div>
		</div>
	</div>
</body>

		<?php include('php/pied_de_page.php'); ?>

</html>