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
            
        <!-- PHP -->
         <?php
      function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
        {
          //Test1: fichier correctement uploadé
          if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
          //Test2: taille limite
          if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
          //Test3: extension
          $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
          if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
          //Déplacement
          return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
        }
 
          //EXEMPLES
          $upload1 = upload('icone','imageUploades/monicone1',15360, array('png','gif','jpg','jpeg') );
          $upload2 = upload('mon_fichier','imageUploades/file112',1048576, FALSE );
 
            if ($upload1) "Upload de l'icone réussi!<br />";
            if ($upload2) "Upload du fichier réussi!<br />";
    ?>

            
      <!-- FORMULAIRE HTML -->  


    <section>
      <fieldset>
        <form id="FormulaireVendre" method="post" action="annonce.php" enctype="multipart/form-data" name="form1">
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
          <input type="number" /> <br/>

          <p> Indiquez le prix que vous souhaitez </p> <br/><!-- on choisit le prix de fruit/légume qu'on dépose -->
          <input type="number"/> <br/>
          
          <label  for="description" > Description du produit </label> <br/> 
          <textarea name="description" rows="8" cols="45">
          </textarea> <br/>

          <label for="file">Ajouter une photo :</label>
          <input type="file" name="fichier" id="fichier" />
          <input type="submit" name="submit" value="Insérer le fichier" />

          <input type="submit" value="Valider" name="bouton" />
        </form>
      </fieldset>
    </section>

    <!-- PHP pour le formulaire d'envoie à la BD -->

      <?php
        $req = $bdd2->prepare('INSERT INTO produit (PR_nom,PR_unite,) VALUE (?,?)');
        if (isset($_POST['bouton'])){


        $req->execute(array($_POST['fruit'],$_POST['unite']));

        header ('Location: annonce.php');}
      ?>         

  </body>
         
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>