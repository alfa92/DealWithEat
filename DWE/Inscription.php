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

if (isset($_POST['login'])) {
	$login=$_POST['login'];
}
if (isset($_POST['pass'])) {
	$pass=md5($_POST['pass']);
}
if (isset($_POST['pass2'])) {
	$pass2=$_POST['pass2'];
}
if (isset($_POST['mail'])) {
	$mail=mysqli_real_escape_string($conn,$_POST['mail']);
}


	

	if(isset($_POST['submit'])){

		if(isset($_POST['login']) && !empty($_POST['login'])
			&& isset($_POST['pass']) && !empty($_POST['pass'])
			&& isset($_POST['pass2']) && !empty($_POST['pass2'])
			&& isset($_POST['mail']) && !empty($_POST['mail'])){

			


			}else{
			?><?php
			}
		if($_POST['pass'] == $_POST['pass2']){
			$sql = "INSERT INTO membres VALUES ('', '".$login."', '".$pass."' , '" . $mail . "' ,' 0 ','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['age']."','".$_POST['adresse']."','".$_POST['ville']."','".$_POST['pays']."')";
			if ($conn->query($sql) === TRUE) {
    ?><p style="text-align:center;"> Votre compte a été créé avec succés !</p><?php 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

					
			

		}else{

			echo "Les mot des passes ne sont pas les mêmes ! ";
		}
			
		
			
	}



?>
					<input type="text" name='login' placeholder="Pseudo" required />
					<input type="password" style="width:30%;" name='pass' placeholder="Mot de passe"  required />
					<input type="password" name='pass2' placeholder="Retapez votre mot de passe" required /></br>
                	<input type="text" name='mail' class="email" placeholder="Enter Email"  required /></br>
            
            
            
            <div class="rgstr-plus">
                <a><i class="fa fa-plus fa-2x" > </i>Inscription complète</a>   
                <ul>
                <input type="text" name='nom' placeholder="Nom"  />
					<input type="text" style="width:30%;" name='prenom' placeholder="Prenom"   /><br>
                    
                <input type="text"  name='adresse' class="email" placeholder="Adresse"   /><br>
                
                	<input type="text" name='pays' class="pass2" placeholder="Pays"   />
                    <input type="text" name='ville' class="pass2" placeholder="Ville"   /></br>
                    <label for='date'>Date de naissance (AAAA-MM-JJ) </label><input type="text" name='age' class="pass2" placeholder="Date de naissance"   /> 
                
                
                </ul>
                
            </div>

    
					<input class="r-submit" name='submit' style="cursor:pointer;" type="submit"  value="S'inscrire"/>
					</div>
				</form>
      
				</div>
		</div>
	</div>

	</body>
<?php include('php/pied_de_page.php'); ?>
</html>