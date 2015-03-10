<?php $expire = 365*24*3600;
setcookie("pseudo",time()+$expire);session_start() ?>
<html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    
<div id="principal">
    <header>
        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
			
    
    </header>
    



<?php



if(isset($_POST['search'])){
        $mot=htmlspecialchars($_POST['search']);
        $mot=str_replace(' ','',$mot);
    
        $requete =( "SELECT DISTINCT * FROM membres WHERE membre_mail LIKE '%$mot%'  or membre_pseudo LIKE '%$mot%' or ville LIKE '%$mot%' ORDER BY membre_id DESC") or die (mysql_error()); // la requête, que vous devez maintenant comprendre ;)

            // envoi de la requête
        $resultat = mysqli_query($conn,$requete) or die ('Erreur '.$requete.' '.mysql_error());
            // resultat de la requete
        $ligne = $resultat->fetch_assoc();
       // on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après

if($ligne != NULL) // si le nombre de résultats est supérieur à 0, on continue
{
// maintenant, on va afficher les résultats et la page qui les donne ainsi que leur nombre, avec un peu de code HTML pour faciliter la tâche.
?>
<h3>Résultats de votre recherche.</h3>

<?
if($donnees = $ligne) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>
<a href="membre_info.php?id=<? echo $ligne['membre_id'];  ?>"><? echo $ligne['membre_pseudo']; $ligne['membre_pseudo']==$_COOKIE["pseudo"] ;?></a><br/>
    
<?
 
}// fin de la boucle
?><br/>
<br/>
<a href="accueil.php">Faire une nouvelle recherche</a></p>
<?
} // Fini d'afficher les résultats ! Maintenant, nous allons afficher l'éventuelle erreur en cas d'échec de recherche et le formulaire.
else
{ // de nouveau, un peu de HTML
?>
<h3>Pas de résultats</h3>
<p>Nous n'avons trouvé aucun résultat pour votre requête </p>
<?
}// Fini d'afficher l'erreur ^^

}  ?>
    
    
