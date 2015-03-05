<?php include('php/config.php');
		
	$msg=false;
	$loginok=false;

	if (isset($_POST['login'])) {
	$login=$_POST['login'];
}
if (isset($_POST['pass'])) {
	$pass=$_POST['pass'];
}
	if(isset($_POST['subconnect'])){

			$reponse = mysqli_query($conn,"SELECT * FROM membres WHERE membre_pseudo='" .$login. "'") or die(mysql_error());
			if(mysqli_num_rows($reponse)===1)
			{
			    $donnees = mysqli_fetch_array($reponse);
			    if($donnees['membre_mdp']===$pass)
			    {
			        $_SESSION['login'] = $donnees['membre_pseudo'];
			       	mysqli_query($conn,"UPDATE `membres` SET `actif`='1' WHERE 'membre_pseudo'='".$login."'");
			        $msg=true;
			        $txt= 'Bienvenue '.$_SESSION['login'];
			    }
			    else
			    {
		        $msg=true;
		        $txt= 'Mauvais mot de passe';
		    }
		}
		else
		{
		    $msg=true;
		    $txt= 'Le pseudo n\'existe pas';
}		
}
	

?>
    
    <div id="connect">
        <form method="post" id="connection">
        
            <input id="login" name="login" type="text" placeholder="Pseudo" required >
		    <input id="password" name="pass" type="password" placeholder="Mot de passe" required >
	        <input id="connectsub" name="subconnect" type="submit" value='Ok'>
            	<p> <a href="inscription.php"> Pas encore inscrit ?<i class="fa fa-user-plus" ></i></a></p>
        </form>
    </div>

<?php if($msg){ ?>
<script>alert("<?php echo $txt; ?>")
 document.location.href="accueil.php" </script>		                
<?php }  ?>



