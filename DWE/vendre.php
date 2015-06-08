<?php session_start() ?>
<html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        
    </head>

    <header>
        <?php include('php/config.php'); ?>
        <?php include('php/header.php'); ?>
    <?php 
    if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
      
    
    </header>
     <?php if(isset($_SESSION['id'])!='1'){
?>  

<p style="text-align:center;font-family:'Roboto' sans-serif; font-size:14px;"> Vous n'avez pas accés à cette page, pour accéder à cette page vous devez être <a href="Inscription.php" style="text-decoration:underline;">inscrit</a> et <a style="text-decoration:underline;" href="connectez_vous.php">vous connectez</a> à votre compte. <br>

<a style="text-decoration:underline;" href="accueil.php">Retour à l'accueil</a></p>
 <?php ;}else{

?>

    <body>
            
    <h1 id="VENDRE"> Vendre</h1>
        <h2>Pour mettre en vente un produit veuillez remplir le formulaire ci-dessous</h2>
            
       

            
      <!-- FORMULAIRE HTML -->  


    <section class="section_vendre">
        <h1 class="h1_vente"> VOTRE ANNONCE </h1>
        <form id="FormulaireVendre" method="post" action="vendre.php" enctype="multipart/form-data" name="form1">

            <label for="Produit"> Produit : </label>  <!-- on choisit le fruit qu'on dépose -->
            <select name="produit" id="produit">
                <option> Choisir </option>
<?php 
    $prods=$bdd2->query('SELECT DISTINCT* FROM produit ORDER BY PR_nom ASC');
    foreach ($prods as $prods):
?>
                <option  value="<?php echo $prods['PR_idP']; ?>"> <?php echo $prods['PR_nom']; ?> </option>
                    <?php endforeach; ?>
                <option> Autre </option>
            </select><br/>
           
        
          <label for="quantite">Quantité : </label> <!-- on choisit la quantité de fruit/légume qu'on dépose --> 
          <input type="number" name="quantite" />
          <input type="radio" name="unite" value="kg" id="kg"/> <label for="kg"> kg </label> 
          <input type="radio" name="unite" value="pièce" id="pièce"/> <label for="pièce"> pièce </label> <br/>

          <label> Prix : </label><!-- on choisit le prix de fruit/légume qu'on dépose -->
          <input name="prix" type="number" class="inputvendre"/> <br/>

         
          <label>Le produit est: </label><input type="radio" name="BioPeuImporte" value="1" /> <label for="Bio">Bio</label>
          <input type="radio" name="BioPeuImporte" value="0" /> <label for="PeuImporte">Peu importe</label><br/> 
          
          <div class="cueillette">
          <label for="datecueillette"> Date de cueillette : </label>
          <input type ="date" name="datecueillette"/><br/>
          </div>
          
          <label  for="description" > Description du produit : </label>
          <textarea name="description" rows="4" cols="45">
          </textarea> <br/>

        <h1 class="h1_vente"> ECHANGE </h1>
          <label class ="echangeok"for ="echangeok"> Type de transaction : </label>
          <input  type="checkbox" name="echangeok" value="Non" id="vente" /> <label for="legume">Vente</label>
          <input  type="checkbox" name="echangeok" value="Oui" id="echange" /> <label for="fruit">Echange</label><br />

          
          
          <label  for="descriptionechange" > Description de l'echange :</label> 
          <textarea class="inputvendre" name="descriptionechange" rows="8" cols="45" >
          </textarea> <br/><br/>
            
            <label for="departement"> Ou vous trouvez vous ?</label>
           <select required>
               <?php for($i=1;$i<97;$i++){ ?>
                <option name="departement" value="$i"> <?= $i; ?> </option>
               <?php } ?>
            </select> <br /><br />
            

          <label for ="payement"> Versement  désiré :  </label>
          <input type="radio" name="payement" value="carte" id="carte" /> <label for="carte">Carte</label>
          <input type="radio" name="payement" value="espece" id="cash" /> <label for="espece">Espèce</label><br /><br />

          <label for ="typeenvoie"> Echange : </label> 
          <input type ="radio" name = "typeenvoie" value="main" id="main"/> <label for="mainpropre"> En main propre </label> 
          <input type ="radio" name="typeenvoie" value="poste" id="poste"/> <label for ="parposte"> Par la poste </label> 

          <label for ="prixcolis"> Prix du colis : </label> 
          <input type="number" name="prixcolis"  class="inputvendre"/> <br/> <br/>             

    <label style="width:450px;"> Vous pouvez aussi insérer une image du produit : </label>
    <input type="file" name="file"> 
        <input type="submit" value="Envoyer"  name="bouton" />

        

</form>


    </section>

<?php 


if(isset($_POST['bouton'])){

          $fichier = $_FILES['file']['name'];
          $taille_maximale=2097512;
          $taille=filesize($_FILES['file']['tmp_name']);
          $extensions=array ('.png','.jpg','.jpeg','.PNG','.JPG','.JPEG');
          $extension=strrchr($fichier, '.');

        if(!in_array($extension, $extensions))
        {
          $error="<div class='alert'> Vous devez uploader un fichier de type png, jpg, jpeg </div>";
        }

        if($taille>$taille_maximale){
          $error="<div class='alert'>  Le fichier est trop volumineux </div>";
        }

        if(!isset($error))
        {
            
            $nomdufichier = "ImagesUploades/333-".$fichier;
          $fichier=preg_replace('/(^.a-z0-9]+)/i','-', $fichier);

          move_uploaded_file($_FILES['file']['tmp_name'], $nomdufichier );

        }else{
          echo $error;
        }

    
   // $selec=$bdd2->query('SELECT * FROM User WHERE US_pseudo="'.$_SESSION['login'].'"');
    //$ligne=$selec->fetch();
 

?>    
    
<?php 
    
   // $selec=$bdd2->query('SELECT * FROM User WHERE US_pseudo="'.$_SESSION['login'].'"');
    //$ligne=$selec->fetch();
 
    $req=$bdd2->prepare('INSERT INTO Annonce (US_idUserannonceur,PR_idP,PE_idPropositionEchan,AN_quantite,AN_prix,AN_echangeok,AN_echangedescription,AN_moyentpayment,AN_moyenenvoie,AN_datepublication,AN_prixcolis,AN_description,AN_idUser,AN_unite,AN_image,AN_type,AN_bio,AN_departement)
   VALUES (:US_idUserannonceur,:PR_idP,:PE_idPropositionEchan,:AN_quantite,:AN_prix,:AN_echangeok,:AN_echangedescription,:AN_moyentpayment,:AN_moyentenvoie,:AN_datepublication,:AN_prixcolis,:AN_description,:AN_idUser,:AN_unite,:AN_image,:AN_type,:AN_bio,:AN_departement)');
  $req->execute(array(
  "US_idUserannonceur"=>$_SESSION['id_perso'],
  "PR_idP"=>$_POST['produit'],
  "PE_idPropositionEchan"=>NULL,
  "AN_quantite"=>$_POST['quantite'],
  "AN_prix"=>$_POST['prix'],
  "AN_echangeok"=>$_POST['echangeok'],
  "AN_echangedescription"=>$_POST['descriptionechange'],
  "AN_moyentpayment"=>$_POST['payement'],
  "AN_moyentenvoie"=>$_POST['typeenvoie'],
  "AN_datepublication"=>$_POST['datecueillette'],
  "AN_prixcolis"=>$_POST['prixcolis'],
  "AN_description"=>$_POST['description'],
  "AN_idUser"=>$_SESSION['id_perso'],
  "AN_unite"=>$_POST['unite'],
      "AN_image"=>$nomdufichier,
"AN_type"=>$prods['PR_type'],
    "AN_bio"=>$_POST['BioPeuImporte'],
      "AN_departement"=>$_POST['departement']
       

));
}

?>



  </body>
         
   <?php include('php/pied_de_page.php');
    }?>
    
    
</html>