   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<div id="container">
			<!-- LOGO ET TITRE -->
			<a href="accueil.php">
					<img id="logo" src="css/images/logo.png">
					<p id="titre">DEAL WITH EAT</p>
					<h3 id="soustitre"> Achetez, Vendez , Echangez </h3> </a>
			<!-- MENU DE NAVIGATION -->
			<nav id="menu_container">
				<ul id="menu">

					<li><a href="accueil.php"><i class="fa fa-home fa-2x" > </i> </a></li>
					<li><a href="actualite.php"><i class="fa fa-rss" > <p> Actualité </p></i> </a></li>
					<li><a href="annonces.php"><i class="fa fa-shopping-cart" ><p> Les annonces</p> </i> </a></li>
					<li><a href="inscription.php"><i class="fa fa-user-plus" > <p>Inscription </p></i> </a></li>
					<li><a href="faq.php"><i class="fa fa-question-circle" > <p>FAQ </p></i> </a></li>
				</ul>
			</nav>
		</div>
			<!-- BARRE DE RECHERCHE-->

			<div id="searchbar">
				<input id="search" type="text" placeholder="Recherche rapide">
				<input id="searchsub" type="submit" value='Rechercher'>
				<input id="searchresp" type="checkbox" value=''>
			</div>

			<!-- CONNECTION -->


			<div id="connect">
			<form method="post" id="connection">
				<input id="login" name="login" type="text" placeholder="Pseudo" required >
				<input id="password" name="pass" type="password" placeholder="Mot de passe" required >
				<input id="connectsub" name="subconnect" type="submit" value='Ok'>
				<p> <a href="inscription.php"> Pas encore inscrit ?<i class="fa fa-user-plus" ></i></a></p>
			</form>
			</div>
			<img id="panier" src="css/images/bag.png">

			
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

		if(isset($_POST['subconnect']))
		{


			if(isset($_POST['login']) && !empty($_POST['login'])
				&& isset($_POST['password']) && !empty($_POST['password']))
			{



			}else{
				$sql ='UPDATE membres SET actif="1" WHERE login="Alfa59"';
				echo "Vous êtes connectés ";
				

			}
		}
?>










