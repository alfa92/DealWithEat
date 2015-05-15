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
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
    <?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
      
    
    </header>

    <body>
            
    <h1 id="VENDRE"> Vendre</h1>
        <h2>Pour mettre en vente un produit veuillez remplir le formulaire ci-dessous</h2>
            
       

            
      <!-- FORMULAIRE HTML -->  


    <section >
      <fieldset>
        <form id="FormulaireVendre" method="post" action="vendre.php"  name="form1">
          <strong> Veuillez indiquer si vous vendez des fruits ou des légumes:</strong><br />

          <input type="radio" name="TypeProduit" value="fruit" id="fruit" /> <label for="fruit">fruit</label><br />
          <input type="radio" name="TypeProduit" value="legume" id="legume" /> <label for="legume">légume</label><br /> <br/>

          <label for="fruit"> <strong>   Quel fruit voulez-vous déposez ?</strong>  </label> <br/> <!-- on choisit le fruit qu'on dépose -->
          <select name="fruit" id="fruit" class="inputvendre"> 
            <option value="pomme"> Pomme </option>
            <option value="poire"> Poire </option>
            <option value="fraise"> Fraise </option>
          </select> <br/><br/>

          <label for="legume"> <strong>  Quel legume voulez-vous déposez ? </strong></label> <br/> <!-- on choisit le légume qu'on dépose -->
          <select name="legume" id="legume" class="inputvendre">
            <option value="brocolis"> Brocolis </option>
            <option value="artichaut"> Artichaut </option>
            <option value="radis"> radis </option>
          </select>  <br/><br/>

          <strong>Indiquez la quantité que vous vouhaitez en kg ou à la pièce </strong> <br/> <!-- on choisit la quantité de fruit/légume qu'on dépose --> 
          <input type="radio" name="unite" value="kg" id="kg"/> <label for="kg"> kg </label> <br/>
          <input type="radio" name="unite" value="pièce" id="pièce"/> <label for="pièce"> pièce </label> <br/>
          <input type="number" name="quantite" class="inputvendre"/> <br/><br/>

          <strong> Indiquez le prix que vous souhaitez </strong> <br/><!-- on choisit le prix de fruit/légume qu'on dépose -->
          <input name="prix" type="number" class="inputvendre"/> <br/><br/>

          <label for="datecuellette">  <strong>Indiquez la date de cueillette de votre produit:</strong> </label><br/>
          <input type ="date" name="datecueillette" class="inputvendre" placeholder="Date de la cueillette"/> <br/><br/>
          
          <label  for="description" > <strong> Description du produit</strong> </label> <br/> 
          <textarea name="description" rows="8" cols="45" class="inputvendre" >
          </textarea> <br/><br/>

          <label for ="echangeok"> <strong>Voulez-vous effectuer une vente et/ou un échange</strong> </label> <br/>
          <input type="radio" name="echangeok" value="Oui" id="echange" /> <label for="fruit">Echange</label><br />
          <input type="radio" name="echangeok" value="Non" id="vente" /> <label for="legume">Vente</label><br /> <br/>


          <label  for="descriptionechange" > <strong>Description de l'echange</strong> </label> <br/> 
          <textarea class="inputvendre" name="descriptionechange" rows="8" cols="45" >
          </textarea> <br/><br/>

          <label for ="payement"> <strong> Indiquez le versement que vous désirer</strong>  </label> <br/>
          <input type="radio" name="payement" value="carte" id="carte" /> <label for="carte">Carte</label><br />
          <input type="radio" name="payement" value="cash" id="cash" /> <label for="cash">Cash</label><br /> <br/><br/>

          <label for ="typeenvoie"> <strong>De quelle façon voulez-vous vendre/échanger votre produit</strong> </label> <br/>
          <input type ="radio" name = "typeenvoie" value="main" id="main"/> <label for="mainpropre"> En main propre </label> <br/>
          <input type ="radio" name="typeenvoie" value="poste" id="poste"/> <label for ="parposte"> Par la poste </label> <br/><br/>

          <label for ="prixcolis"> <strong>Indiquez le prix du colis en euros </strong></label> <br/>
          <input type="number" name="prixcolis"  class="inputvendre"/> <br/> <br/>


<p> vous pouvez aussi insérer une image du produit </p>
          

</form>

<form id="FormulaireVendre" method="post" action="vendre.php" enctype="multipart/form-data" name="form1">

<input type="file" name="file">  </br> 
<input type="submit" value="insérer l'image"  name="submit">

</form>
      </fieldset>
    </section>












 

    <!-- PHP pour le formulaire d'envoie à la BD -->



    <?php
      if(isset($_POST['submit']))
        {
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
          $fichier=preg_replace('/(^.a-z0-9]+)/i','-', $fichier);
          move_uploaded_file($_FILES['file']['tmp_name'], "ImagesUploades/333-".$fichier);

        }else{
          echo $error;
        }
      
      }

    ?>






      <?php

        
        $req = $bdd2->prepare('INSERT INTO produit (PR_nom,PR_unite) VALUE (?,?)');
        $req1 = $bdd2->prepare('INSERT INTO propositionechange (PR_idP,PE_photos,PE_quantite) VALUE (?,?,?)');

        $sel1= $bdd2->prepare('SELECT MAX(PR_idP) FROM Produit ');
        $sel2= $bdd2-> prepare('SELECT MAX(PE_idPropositionEchan) FROM propositionechange ');

        $req2 = $bdd2->prepare('INSERT INTO Annonce 
          (AN_idAnnonce, US_idUserannonceur, PR_idP, PE_idPropositionEchan, AN_quantite,AN_prix, AN_echangeok, AN_echangedescription, AN_moyentpayment,AN_moyenenvoie, AN_datepublication, AN_prixcolis, AN_description)
           VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?)' );

        if (isset($_POST['bouton'])){

       


        $req->execute(array($_POST['fruit'],$_POST['unite']));
        $req1->execute(array($_POST['PR_idP'],'Bonjour',$_POST['quantite']));

         $sel1->execute();
        $sel2->execute();
        

        $req2->execute(array('','',$sel1->PR_idP,$sel2->PE_idPropositionEchan,$_POST['quantite'],$_POST['prix'],$_POST['echangeok'],
          $_POST['descriptionechange'],$_POST['payement'],$_POST['typeenvoie'],$_POST['datecueillette'],$_POST['prixcolis'],$_POST['description']));

        
      }
      ?> 

  </body>
         
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>