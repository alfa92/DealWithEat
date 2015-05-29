<?php session_start(); ?><html>
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
<div id="produit_info">
<?php

			
			$a=$_GET['a'];

			$req='SELECT * FROM User WHERE US_idUser="'.$a.'"';
			$res=mysqli_query($conn2,$req);

            $prods=$bdd2->query('SELECT * FROM Annonce WHERE US_idUserannonceur="'.$a.'"');
            


	if($rows1=mysqli_fetch_array($res)){
		$pseudo=$rows1['US_pseudo']; $membre=$rows1['US_nom'];$mail=$rows1['US_mail'];$prenom=$rows1['US_prenom'];

			?>
    <div id="membre_presentation">
    <?php  if($rows1['US_image'] != null){ ?>
    <img height="auto" style="max-width:200px;max-height:200px" src="image_user/<?=$a ?>/<?= $rows1['US_image'] ?>" />
    <?php }else{ ?>
            <img height="auto" style="max-width:200px;max-height:200px" src="image_user/avatar.png" />
    <?php } ?>
                
    
    <h1><?= $pseudo ?></h1>
    <h2><?= $rows1['US_ville']?></h2><br/>
        
        <br />
        <h2> Dernières annonces</h2>
        <div style="max-width:23àpx;overflow-x:scroll;">
        <?php while($prod=$prods->fetch()){ 
         $produit=$bdd2->query('SELECT * FROM Produit WHERE PR_idP="'. $prod['PR_idP'].'"');
                $pr=$produit->fetch();
        ?>
        
            
            
            <div style="display:inline-block;vertical-align:top;margin-right:30px;">
                <?= $pr['PR_nom']; ?><br />
                Prix : <?= $prod['AN_prix'] ?> €/<?= $prod['AN_unite'] ?> <br />
                Quantité : <?= $prod['AN_quantite'] ?><?= $prod['AN_unite'] ?> <br />
                <img src="imageproduit/<?= $prod['PR_idP'] ?>.jpg" width="120px" />
                
                 </div>
                <?php } ?>
        
        </div>
        
        
        </div>
    
    <div id="vote_vendeur">
    <h4>Voter pour ce vendeur :</h4> 
    <?php   if(isset($_SESSION['id'])>0){ ?>
    
    
        
       

    
    <?php 
              
                $dejavote=$bdd2->query('SELECT * FROM note_user WHERE NU_idUser="'.$a.'" AND NU_idUsNote="'.$_SESSION['id_perso'].'" ');
                $dvresult = $dejavote -> fetch();
                $countdv=count($dvresult);
        
        if($countdv=0){
           ?> <p> Vous avez déjà donné votre avi sur ce vendeur </p>
    
    <?php 
        }else{  
            
            ?>
     <form method="POST">
    <table>
        <tr>
            <script type="text/javascript">
    function updateTextInput(val) {
      document.getElementById('textInput').value=val; 
    }
  </script>
    <td><label>Note :</label></td><td><input type="range" name="rangeInput" min="0" max="5"  onchange="updateTextInput(this.value);">                                                       
    <input type="text" id="textInput" value="1" width="10" style="border:none;"></td>
        <tr/>
        <tr>
   <td> <label style="vertical-align:top;">Commentaire</label></td><td><textarea name="commentaire"></textarea></td>
            </tr>
        </table>
    <center><input type="submit"  name="sub_note" value="Noter"/></center>
    </form> 
    <?php
            
                if(isset($_POST['sub_note'])){
                $requ=$bdd2->query('INSERT INTO note_user VALUES ("","'.$a.'","'.$_POST['rangeInput'].'","'.$_SESSION['id_perso'].'","'.$_POST['commentaire'].'")');   
                
            }
        }
            }else{
                
                echo "Pour voter pour un vendeur il faut etre inscrit et avoir eu au moins une transaction avec ce vendeur";
            }
                ?>
    
    <style>
        #vote_vendeur label{
            min-width:120px!important;
            font-size:12px;
        }
        #membre_presentation{
         display:inline-block;
            vertical-align:top;
            width:50%;
        }
        #vote_vendeur{
            display:inline-block;
            vertical-align:top;
            width:30%;
        }
        
    </style>
        
        
     
        
	<?php
}
	
?>
        <br />
           <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&language=fr">
</script>
        
        <form>
  <input type="text" id="adresse" style="outline:none;border:none;display:none;"value="<?= $rows1['US_adresse']?>"/>
  <input type="button"  value="Localiser sur Google Map" onclick="TrouverAdresse();"/>
</form>
<span style="display:none;" id="text_latlng"></span>
<div id="map-canvas" style="float:right;height:220px;width:100%"></div>
        
        
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
            </div>
    
</div>
    </body>
<?php include('php/pied_de_page.php');