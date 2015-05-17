<body>
	 <?php include('php/config.php') 


	if(isset($_SESSION['login'])){
	 	$nom = "SELECT  `nom` FROM `membres` WHERE membre_pseudo=".$login.""
	 	$prenom = "SELECT 'prenom' FROM `membres` WHERE membre_pseudo=".$login. ""
	 	$age =  "SELECT 'age' FROM `membres` WHERE membre_pseudo=".$login. ""
	 	$pseudo = "SELECT 'membre_pseudo' FROM `membres` WHERE membre_pseudo=".$login. ""
	 	$mdp = "SELECT 'membre_mdp' FROM `membres` WHERE membre_pseudo=".$login. ""
	 	$mail = "SELECT 'membre_mail' FROM `membres` WHERE membre_pseudo=".$login. ""
	 	$adresse = "SELECT 'adresse' FROM `membres` WHERE membre_pseudo=".$login. ""
	 	$ville = "SELECT 'ville' FROM `membres` WHERE membre_pseudo=".$login. ""
 	 	$pays = "SELECT 'pays' FROM `membres` WHERE membre_pseudo=".$login. ""
	}
 	 	mysqli_query($conn,$nom);
 	 	mysqli_query($conn,$prenom);
 	 	mysqli_query($conn,$age);
 	 	mysqli_query($conn,$pseudo);
 	 	mysqli_query($conn,$mdp);
 	 	mysqli_query($conn,$mail);
 	 	mysqli_query($conn,$adresse);
 	 	mysqli_query($conn,$ville);
 	 	mysqli_query($conn,$pays);


 	 	?>


</body>