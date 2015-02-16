<?php

	$host="localhost";
	$root="root";
	$mdp="root";
	$db="dealwitheat";

	mysql_connect($host,$root,$mdp) or die("Connexion impossible");
	mysql_select_db($db) or die ("Base introuvable")


?>