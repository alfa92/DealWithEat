<?php


$conn2=mysqli_connect('localhost', 'root', 'root','dwe');
mysqli_set_charset($conn2,"UTF8");

try{
		$bdd2 = new PDO('mysql:host=localhost;dbname=dwe;charset=utf8', 'root', 'root');
		$bdd2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
}

?>