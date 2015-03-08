   <?php include('php/config.php') ?>
   <?php include('php/connexion.php') ?>

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
				<?php if($loginok==false){ ?>
					<li><a href="accueil.php"><i class="fa fa-home fa-2x" > </i> </a></li>
					<li><a href="actualite.php"><i class="fa fa-rss" > <p> Actualité </p></i> </a></li>
					<li><a href="annonces.php"><i class="fa fa-shopping-cart" ><p> Les annonces</p> </i> </a></li>
					<li><a href="inscription.php"><i class="fa fa-user-plus" > <p>Inscription </p></i> </a></li>
					<li><a href="faq.php"><i class="fa fa-question-circle" > <p>FAQ </p></i> </a></li>
				<?php }else{ ?>
				<li><a href="accueil.php"><i class="fa fa-home fa-2x" > </i> </a></li>
					<li><a href="actualite.php"><i class="fa fa-rss" > <p> Actualité </p></i> </a></li>
					<li><a href="annonces.php"><i class="fa fa-shopping-cart" ><p> Les annonces</p> </i> </a></li>
					<li><a href="mon_compte_main.php"><i class="fa fa-user-plus" > <p>Mon compte </p></i> </a></li>
					<li><a href="faq.php"><i class="fa fa-question-circle" > <p>FAQ </p></i> </a></li>
					<li><a href="logout.php"> <i class="fa fa-question-circle" > <p>Deconnexion</p></i> </a></li>
					<?php } ?>
				</ul>
			</nav>
		</div>
			<!-- BARRE DE RECHERCHE -->

			<div id="searchbar">
				<input id="search" type="text" placeholder="Recherche rapide">
				<input id="searchsub" type="submit" value='Rechercher'>
				<input id="searchresp" type="checkbox" value=''>
			</div> 

			
			

			











