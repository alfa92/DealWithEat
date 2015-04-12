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
            
    <h1> Vendre</h1>
        <h2> Pour mettre en vente un produit veuillez remplir le formulaire ci-dessous</h2>
            
       

            
      <!-- FORMULAIRE HTML -->  


    <section>
      <fieldset>
        <form id="FormulaireVendre" method="post" action="vendre.php" enctype="multipart/form-data" name="form1">
          <p> Veuillez indiquer si vous vendez des fruits ou des légumes:</p><br />

          <input type="radio" name="TypeProduit" value="fruit" id="fruit" /> <label for="fruit">fruit</label><br />
          <input type="radio" name="TypeProduit" value="legume" id="legume" /> <label for="legume">légume</label><br /> <br/>

          <label for="fruit"> Quel fruit voulez-vous déposez ? </label> <br/> <!-- on choisit le fruit qu'on dépose -->
          <select name="fruit" id="fruit"> 
            <option value="pomme"> Pomme </option>
            <option value="poire"> Poire </option>
            <option value="fraise"> Fraise </option>
          </select> <br/>

          <label for="legume"> Quel legume voulez-vous déposez ? </label> <br/> <!-- on choisit le légume qu'on dépose -->
          <select name="legume" id="legume">
            <option value="brocolis"> Brocolis </option>
            <option value="artichaut"> Artichaut </option>
            <option value="radis"> radis </option>
          </select>  

          <p>Indiquez la quantité que vous vouhaitez en kg ou à la pièce </p> <br/> <!-- on choisit la quantité de fruit/légume qu'on dépose --> 
          <input type="radio" name="unite" value="kg" id="kg"/> <label for="kg"> kg </label> <br/>
          <input type="radio" name="unite" value="pièce" id="pièce"/> <label for="pièce"> pièce </label> <br/>
          <input type="number" name="quantite" /> <br/>

          <p> Indiquez le prix que vous souhaitez </p> <br/><!-- on choisit le prix de fruit/légume qu'on dépose -->
          <input name="prix" type="number"/> <br/>

          <label for="datecuellette"> Quel est la date de cueillette de votre produit: </label>
          <input type ="date" name="datecueillette"/> <br/>
          
          <label  for="description" > Description du produit </label> <br/> 
          <textarea name="description" rows="8" cols="45">
          </textarea> <br/>

          <label for ="echangeok"> Voulez-vous effectuer une vente et/ou un échange </label> <br/>
          <input type="radio" name="echangeok" value="Oui" id="echange" /> <label for="fruit">Echange</label><br />
          <input type="radio" name="echangeok" value="Non" id="vente" /> <label for="legume">Vente</label><br /> <br/>


          <label  for="descriptionechange" > Description de l'echange </label> <br/> 
          <textarea name="descriptionechange" rows="8" cols="45">
          </textarea> <br/>

          <label for ="payement"> Indiquez le versement que vous désirer </label> <br/>
          <input type="radio" name="payement" value="carte" id="carte" /> <label for="carte">Carte</label><br />
          <input type="radio" name="payement" value="cash" id="cash" /> <label for="cash">cash</label><br /> <br/>

          <label for ="typeenvoie"> De quelle façon voulez-vous vendre/échanger votre produit </label> <br/>
          <input type ="radio" name = "typeenvoie" value="main" id="main"/> <label for="mainpropre"> En main propre </label> <br/>
          <input type ="radio" name="typeenvoie" value="poste" id="poste"/> <label for ="parposte"> Par la poste </label> <br/>

          <label for ="prixcolis"> Indiquez le prix du colis </label> <br/>
          <input type="number" name="prixcolis" /> <br/>

          
          <input type="submit" value="Valider" name="bouton" />
        </form>
      </fieldset>
    </section>

    <!-- PHP pour le formulaire d'envoie à la BD -->

      <?php

        
        $req = $bdd2->prepare('INSERT INTO produit (PR_nom,PR_unite) VALUE (?,?)');
        $req1 = $bdd2->prepare('INSERT INTO propositionechange (PR_idP,PE_photos,PE_quantite) VALUE (?,?,?)');
        $req2 = $bdd2->prepare('INSERT INTO Annonce 
          (AN_idAnnonce, US_idUserannonceur, PR_idP, PE_idPropositionEchan, AN_quantite,AN_prix, AN_echangeok, AN_echangedescription, AN_moyentpayment,AN_moyenenvoie, AN_datepublication, AN_prixcolis, AN_description)
           VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if (isset($_POST['bouton'])){


        $req->execute(array($_POST['fruit'],$_POST['unite']));
        $req1->execute(array('1','Bonjour',$_POST['quantite']));
        $req2->execute(array(NULL,'1','1','1',$_POST['quantite'],$_POST['prix'],$_POST['echangeok'],
          $_POST['descriptionechange'],$_POST['payement'],$_POST['typeenvoie'],$_POST['datecueillette'],$_POST['prixcolis'],$_POST['description']));

        
      }
      ?> 

  </body>
         
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>