<?php session_start(); ?>


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
        
        <?php if(isset($_SESSION['id'])!='1'){
?>  

<p style="text-align:center;font-family:'Roboto' sans-serif; font-size:14px;"> Vous n'avez pas accés à cette page, pour accéder à cette page vous devez être <a href="Inscription.php" style="text-decoration:underline;">inscrit</a> et <a style="text-decoration:underline;" href="connectez_vous.php">vous connectez</a> à votre compte. <br>

<a style="text-decoration:underline;" href="accueil.php">Retour à l'accueil</a></p>
 <?php ;}else{

?>
      <?php 
              
              $requete = "SELECT * FROM User WHERE US_pseudo='".$_SESSION['login']."'";
            $resultat =$bdd2->query($requete);
            $ligne = $resultat->fetch();

$id=$ligne['US_idUser']
    
              ?>
    
    </header>
    <body><br>
        <div id="account_top">
        <fieldset class="title_account">
            <legend>Bienvenue sur votre compte <?php 
              if (isset ($ligne['US_prenom'])){echo $ligne['US_prenom'];}
              if (isset ($ligne['US_nom'])){echo ' '.$ligne['US_nom'];}
            ?></legend>
            <i id="no_me">Si vous n'ètes pas <?php 
              if (isset ($ligne['US_pseudo'])){echo $ligne['US_pseudo'];}
            ?> veuillez <a href="logout.php">vous déconnectez</a>. 
        </i></fieldset>
            
            <form id="avatar_upload" action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file" required/> 
            <input type="submit" value="Insérer photo" name="subit">
            </form>

            <?php
$dossier = "image_user/".$ligne['US_idUser'];
if(is_dir($dossier)){
   
} else{
   mkdir($dossier);
}
              if(isset($_POST['subit'])){
                $nomfichier=rand()."-".$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'],"image_user/".$ligne['US_idUser']."/".$nomfichier);
                $q='UPDATE User SET US_image = "'.$nomfichier.'" WHERE US_pseudo="'.$_SESSION['login'].'"';
                $query=$bdd2->query($q);

              }


            ?>
            <?php 
            $filename = "image_user/".$ligne['US_idUser']."/".$ligne['US_image'];
                if($ligne['US_image'] == "" or !file_exists($filename)){
                      $avatar="<img width='120px' src='image_user/avatar.png' />"; 
                }else{
                      $avatar="<img width='120px' src='image_user/".$ligne['US_idUser']."/".$ligne['US_image']."' />"; 
                }
            ?>
            <div id="avatar_moyen" >
                <?= $avatar ?>
            </div>
        <div id="navcontainercompte"> 
      <!-- Nav -->
        <!--nav id="navcompte">
          <ul>
            <li ><a href="moncompte.php">Profil</a></li>
                        <li><a href="actualites.php"> Paramètres </a></li>
            <li><a href="#"> Mes annonces </a></li>
            <li><a href="logout.php"> Déconnexion </a></li>
          </ul>
        </nav-->
        </div>


    <div id="infocompte" style="margin-top:50px;margin-left:23%;">
        <ul>
             <li> Pseudo : <?php echo $ligne['US_pseudo']; ?></li>
            <li> <?php if (isset ($ligne['US_nom'])){echo $ligne['US_nom'];} ?></li>
            <li><?php echo $ligne['US_prenom']; ?></li>
       
            <li><?php echo $ligne['US_datenaissance']; ?></li>
            <li> Mail : <?php echo $ligne['US_mail']; ?></li>
            <li> Adresse : <?php echo $ligne['US_adresse']; ?></li>
            <li> Ville : <?php echo $ligne['US_ville']; ?></li>
            <li> Pays : <?php echo $ligne['US_pays']; ?></li>
        </ul>
    </div>    
               <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&language=fr">
</script>
        
        <form>
  <input type="text" id="adresse" style="outline:none;border:none;display:none;"value="<?= $ligne['US_adresse']?>"/>
 <center> <input type="button"  value="Localiser sur Google Map" onclick="TrouverAdresse();"/>
</form>
<span style="display:none;" id="text_latlng"></span>
<div id="map-canvas" style="height:220px;width:80%"></div></center>
        
        
    <script type="text/javascript">
var geocoder;
var map;
// initialisation de la carte Google Map de départ
function initialiserCarte() {
  geocoder = new google.maps.Geocoder();
  // Ici j'ai mis la latitude et longitude du vieux Port de Marseille pour centrer la carte de départ
  var latlng = new google.maps.LatLng(48.8566140,2.3522219);
  var mapOptions = {
    zoom      : 12,
    center    : latlng,
    mapTypeId : google.maps.MapTypeId.ROADMAP
  }
  // map-canvas est le conteneur HTML de la carte Google Map
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}
 
function TrouverAdresse() {
  // Récupération de l'adresse tapée dans le formulaire
  var adresse = document.getElementById('adresse').value;
  geocoder.geocode( { 'address': adresse}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      // Récupération des coordonnées GPS du lieu tapé dans le formulaire
      var strposition = results[0].geometry.location+"";
      strposition=strposition.replace('(', '');
      strposition=strposition.replace(')', '');
      // Affichage des coordonnées dans le <span>
      document.getElementById('text_latlng').innerHTML='Coordonnées : '+strposition;
      // Création du marqueur du lieu (épingle)
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      alert('Adresse introuvable: ' + status);
    }
  });
}
// Lancement de la construction de la carte google map
google.maps.event.addDomListener(window, 'load', initialiserCarte);
</script>
            <a href="moncompte_modif.php"><p style="margin-left:60%;margin-top:50px;"> Modifier mes données </p></a>
            
        <div id="annoncescompte">
        <h4> Vos annonces </h4>
          
          <div class="annonce"><?php

            $req= 'SELECT * FROM Annonce WHERE US_idUserannonceur="'.$id.'"';
            $res= mysqli_query($conn2,$req); 

            while ($rows=mysqli_fetch_array($res)) {
           $nom=$bdd2->query('SELECT PR_nom FROM Produit WHERE PR_idP="'.$rows['PR_idP'].'"');
                $rows1=$nom->fetch();
         
?>
<img id="image_article_compte" style="width:40px;" src="imageproduit/<?php echo $rows['PR_idP'] ?>.jpg">
<?php
          echo $rows1['PR_nom'].'<br>';
         echo $rows['AN_prix'].'€ <br>';
         echo "Quantité restante : ".$rows['AN_quantite']."kg";
         ?> <hr> <?php
}
 ?>   
 </div>
        </div>
      
    </body>
    </div>
       <?php include('php/pied_de_page.php'); ?>
</html>

<?php } ?>



