<?php session_start();

$conn=mysqli_connect('localhost ', 'root ', 'root ','dealwitheat ');
$bdd1 = new PDO('mysql:host=localhost;dbname=dealwitheat;charset=utf8 ', 'root ', 'root ');

$conn1=mysqli_connect('localhost ', 'root ', 'root ','mydb ');
$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8 ', 'root ', 'root ');
mysqli_set_charset($conn1,"UTF8");

$conn2=mysqli_connect('localhost ', 'root ', 'root ','dwe ');
try{
		$bdd2 = new PDO('mysql:host=localhost;dbname=dwe;charset=utf8 ', 'root ', 'root ');
		$bdd2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
}

mysqli_set_charset($conn2,"UTF8");

?>