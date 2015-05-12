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

            <label for="Produit"> Quel produit voulez-vous déposez ? </label> <br/> <!-- on choisit le fruit qu'on dépose -->
            <select name="produit" id="produit">
                <option> Choisir </option>
<?php 
    $prod=$bdd2->query('SELECT DISTINCT* FROM Produit ORDER BY PR_nom ASC');
    foreach ($prod as $prods):
?>
                <option  value="<?php $prods->PR_idP; ?>"> <?php echo $prods['PR_nom']; ?> </option>
                    <?php endforeach; ?>
                <option> Autre </option>
            </select><br/>
            <i> Si le poduit n'est pas dans la liste merci d'indiquer son nom :</i> <input type="text" placeholder="Autre" />
           
        
          <p>Indiquez la quantité que vous vouhaitez en kg ou à la pièce </p> <!-- on choisit la quantité de fruit/légume qu'on dépose --> 
          <input type="radio" name="unite" value="kg" id="kg"/> <label for="kg"> kg </label> 
          <input type="radio" name="unite" value="pièce" id="pièce"/> <label for="pièce"> pièce </label> <br/>
          <input type="number" name="quantite" /> 

          <p> Indiquez le prix que vous souhaitez </p><!-- on choisit le prix de fruit/légume qu'on dépose -->
          <input name="prix" type="number"/><br/>

          <label for="datecuellette"> Quel est la date de cueillette de votre produit: </label>
          <input type ="date" name="datecueillette"/><br/>
          
          <label  for="description" > Description du produit </label><br/>
          <textarea name="description" rows="4" cols="45">
          </textarea> <br/>

          <label class ="echangeok"for ="echangeok"> Voulez-vous effectuer une vente et/ou un échange </label> <br/>
          <input type="radio" name="echangeok" value="Oui" id="echange" /> <label for="fruit">Echange</label><br />
          <input type="radio" name="echangeok" value="Non" id="vente" /> <label for="legume">Vente</label><br /> <br/>


          <label  for="descriptionechange" > Description de l'echange </label> <br/> 
          <textarea name="descriptionechange" rows="4" cols="45">
          </textarea> <br/>

          <div class="versement">
          <label for ="payement"> Indiquez le versement que vous désirer </label> <br/>

          <input type="checkbox" name="payement" value="carte" id="carte" /> <label for="carte">Carte</label><br />
          <input type="checkbox" name="payement" value="especes" id="espece" /> <label for="especes">Espèces</label><br /> <br/>
          </div>

          <div class="type_envoie"
          <label for ="typeenvoie"> De quelle façon voulez-vous vendre/échanger votre produit </label> <br/>

          <input type ="radio" name = "typeenvoie" value="main" id="main"/> <label for="mainpropre"> En main propre </label> 
          <input type ="radio" name="typeenvoie" value="poste" id="poste"/> <label for ="parposte"> Par la poste </label> <br />

          <div class="colis"
          <label for ="prixcolis"> Indiquez le prix du colis </label> <br/>
          <input type="number" name="prixcolis" /> 
          </div><br/>
          
          <input type="submit" value="Valider" name="bouton"/>
        </form>
      </fieldset>
    </section>



  </body>
         
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>