
<html>

	<head>
		<meta charset="UTF-8">
		<title> Deal With Eat </title>
		<!-- importation de la bibliothèque Font Awesome pour les polices vectorielles-->
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<header>
		
		<?php include('php/header.php'); ?>
		

	</header>
	<body>

	<p style='text-align:center;'></p>


		<div class="rgstr">


		<div class="containerrgstr">
			<div class="rgstr-top">
			<form method="post">
				<div class="rgstr-main">
				<h3 style="font-family:moon;font-size:50px;"> Inscription </h3>
				<?php 
	
	$serv='localhost';
	$userdb='root';
	$mdpdb='root';
	$db='dealwitheat';

	$conn=mysqli_connect($serv,$userdb,$mdpdb,$db) or die("Une erreur est apparu pendant la connection");

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
			
			}
		if($_POST['pass'] == $_POST['pass2']){
			$sql = "INSERT INTO membres VALUES ('', '".$login."', '".$pass."' , '" . $mail . "' ,' 0 ')";
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
					
					<input class="r-submit" name='submit' style="cursor:pointer;" type="submit"  value="S'inscrire"/>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	</body>
	<footer>
		
	</footer>



</html>