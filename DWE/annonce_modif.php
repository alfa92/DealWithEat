<?php session_start(); 
include('php/config.php');?>


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
        
        <?php 
        if(isset($_GET['id'])){
$id=$_GET['id'];
echo $id;
}
        if(isset($_SESSION['id'])=='1'){
?> 
	
	<body>
		<section class="section_vendre">
        <h1 class="h1_vente"> VOTRE ANNONCE </h1>
        <form id="FormulaireVendre" method="post" action="annonce_modif.php?id=<?= $id ?>" enctype="multipart/form-data" name="form1">

                 
          <label for="quantite">Quantité : </label> <!-- on choisit la quantité de fruit/légume qu'on dépose --> 
          <input type="number" name="nvquantite" />
          <input type="radio" name="nvunite" value="kg" id="kg"/> <label for="kg"> kg </label> 
          <input type="radio" name="nvunite" value="pièce" id="pièce"/> <label for="pièce"> pièce </label> <br/>

          <label> Prix : </label><!-- on choisit le prix de fruit/légume qu'on dépose -->
          <input name="nvprix" type="number" class="inputvendre"/> <br/><br/>

          <div class="cueillette">
          <label for="datecueillette"> Date de cueillette : </label>
          <input type ="date" name="nvdatecueillette"/><br/>
          </div>
          
          <label  for="description" > Description du produit : </label>
          <textarea name="nvdescription" rows="4" cols="45">
          </textarea> <br/>

        <h1 class="h1_vente"> ECHANGE </h1>
          <label class ="echangeok"for ="echangeok"> Type de transaction : </label>
          <input  type="checkbox" name="nvechangeok" value="Non" id="vente" /> <label for="legume">Vente</label>
          <input  type="checkbox" name="nvechangeok" value="Oui" id="echange" /> <label for="fruit">Echange</label><br />

          
          
          <label  for="descriptionechange" > Description de l'echange :</label> 
          <textarea class="inputvendre" name="nvdescriptionechange" rows="8" cols="45" >
          </textarea> <br/><br/>

          <label for ="payement"> Versement  désirer :  </label>
          <input type="radio" name="nvpayement" value="carte" id="carte" /> <label for="carte">Carte</label>
          <input type="radio" name="nvpayement" value="espece" id="cash" /> <label for="espece">Espèce</label><br /><br />

          <label for ="typeenvoie"> Echange : </label> 
          <input type ="radio" name = "nvtypeenvoie" value="main" id="main"/> <label for="mainpropre"> En main propre </label> 
          <input type ="radio" name="nvtypeenvoie" value="poste" id="poste"/> <label for ="parposte"> Par la poste </label> 

          <label for ="prixcolis"> Prix du colis : </label> 
          <input type="number" name="nvprixcolis"  class="inputvendre"/> <br/> <br/>             

    <label style="width:450px;"> Vous pouvez aussi insérer une image du produit : </label>
    <input type="file" name="file"> 

        <input id="modif_sub" type="submit" name="bouton" onclick="return confirm('Êtes vous sur de vouloir effectuer ces changements')" value="Envoyer les modifications">

<?php
}
?>
<?php
if(isset($_POST['rafraichir'])){
$req=$bdd2->prepare('UPDATE Annonce SET quantite=:"'.$_POST[nvquantite].'",prix=:"'.$_POST[nvprix].'",echangeok=:"'.$_POST[nvechangeok].'",descriptionechange=:"'.$_POST[nvdescriptionechange].'", payement=:"'.$_POST[nvpayement].'",typeenvoie=:"'.$_POST[nvtypeenvoie].'",datecueillette=:"'.$_POST[nvdatecueillette].'",prixcolis=:"'.$_POST[nvprixcolis].'",description=:"'.$_POST[nvdescription].'" WHERE AN_idAnnonce=:AN_idAnnonce');
$req->execute(array(

  'nvquantite'=>$_POST['nvquantite'],
  'nvunite'=>$_POST['nvunite'],
  'nvprix'=>$_POST['nvprix'],
  'nvechangeok'=>$_POST['nvechangeok'],
  'nvdescriptionechange'=>$_POST['nvdescriptionechange'],
  'nvpayement'=>$_POST['nvpayement'],
  'nvtypeenvoie'=>$_POST['nvtypeenvoie'],
  'nvdatecueillette'=>$_POST['nvdatecueillette'],
  'nvprixcolis'=>$_POST['nvprixcolis'],
  'nvdescription'=>$_POST['nvdescription'],
  'idAnnonce'=>$_GET['id']
  ));

echo "<script type='text/javascript'>document.location.replace('moncompte.php');</script>";
  

}
	
	?>

	</body>


	</html>