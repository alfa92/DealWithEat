<?php session_start(); ?><html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>
    
<script type="text/javascript">
    function updateTextInput(val) {
      document.getElementById('textInput').value=val; 
    }
  </script>
<div id="principal">

    <header>

        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 

    </header>
<div id="produit_info">
<?php

			
			$q=$_GET['q'];



			$req='SELECT * FROM Annonce WHERE AN_idAnnonce="'.$q.'"';
			$res=$bdd2->query($req);
            $an=$res->fetch();

$nom=$bdd2->query('SELECT PR_nom FROM Produit WHERE PR_idP="'.$an['PR_idP'].'"');
        $req=$nom->fetch();

$pseudo=$bdd2->query('SELECT US_pseudo, US_idUser FROM User WHERE US_idUser="'.$an['US_idUserannonceur'].'"');
        $ps=$pseudo->fetch();

?>
        <h1> <?= $req['PR_nom']; ?> </h1>
    <h2> <a href="membre.php?a=<?= $an['US_idUserannonceur'] ?>"><?= $ps['US_pseudo'] ?></a> </h2>
    <?php if($an['AN_image']==NULL){ ?>
    <img id="image_article" src="imageproduit/<?php echo $an['PR_idP'] ?>.jpg" style="margin-left:500px;">
    <?php }else{ ?>
    <img id="image_article"src="<?= $an['AN_image']; ?>" style="margin-left:500px;">
    <?php } ?>
    <p> Prix : <?= $an['AN_prix']; ?>€ / <?= $an['AN_unite'] ?></p>
    
    <p> Description du produit : <?= $an['AN_description']; ?> </p>
    
    
    
    <p> Quantité disponible : <?=  $an['AN_quantite'] ?> <?= $an['AN_unite'] ?><?php if($an['AN_quantite']>1){ echo "s";} ?></p>
    
    
    <label for="quantite"> Quantité :</label>
    <form method="post" action="#">
  <input type="range" name="rangeInput" min="1" max="<?= $an['AN_quantite']  ?>" value="1" onchange="updateTextInput(this.value);">                                                       
    <input type="text" name="quantite" id="textInput" value="1" width="10" style="border:none;outline:none;">
        <input type="submit" name="n" value="Valider la quantité" >
    </form>
        <?php if(isset($_POST['n']))
{
    $var = $_POST['rangeInput'];
    echo "Vous avez choisi ".$var." ".$an['AN_unite']."s";
}
            ?> 
    <br />
    <?php if(isset($var)){ ?>
    <a id="panier"  href="panier/addpanier.php?id=<?= $q ?>&n=<?= $var ?>">
        <?php }else{ ?>
         <a id="panier"  href="panier/addpanier.php?id=<?= $q ?>">
        <?php } ?>
         <img id="div_ajout_panier" src="css/images/addpanier.png" width="40" height="40">  </a> </a><br>
        
</div>

    <br/>
</body>
    <?php include('php/pied_de_page.php'); ?>