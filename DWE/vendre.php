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
            <label> Si autre : </label> <input type="text"  /> </br>
           
        
          <label for="quantite">Quantité : </label> <!-- on choisit la quantité de fruit/légume qu'on dépose --> 
          <input type="number" name="quantite" />
          <input type="radio" name="unite" value="kg" id="kg"/> <label for="kg"> kg </label> 
          <input type="radio" name="unite" value="pièce" id="pièce"/> <label for="pièce"> pièce </label> <br/>
          

          <label for="prix"> Prix : </label><!-- on choisit le prix de fruit/légume qu'on dépose -->
          <input name="prix" type="number"/> <br/>

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
          

          <label  for="descriptionechange" > Description de l'echange : </label> 
          <textarea name="descriptionechange" rows="4" cols="45" placeholder="Précisez les produits désirés">
          </textarea> <br/>

        <h1 class="h1_vente"> PAIEMENT </h1>
          <div class="versement">
          <label for ="payement"> Versement désiré : </label>

          <input type="checkbox" name="payement" value="carte" id="carte" /> <label for="carte">Carte</label>
          <input type="checkbox" name="payement" value="especes" id="espece" /> <label for="especes">Espèces</label><br />
          </div>

          <div class="type_envoie">
          <label for ="typeenvoie"> Type d'envoie : </label>

          <input type ="radio" name = "typeenvoie" value="main" id="main"/> <label for="mainpropre"> En main propre </label> 
          <input type ="radio" name="typeenvoie" value="poste" id="poste"/> <label for ="parposte"> Par la poste </label> <br />
            </div>

          <div class="colis"
          <label for ="prixcolis"> Prix du colis : </label>
          <input type="number" name="prixcolis" /> 
          </div><br/>
          
          <input class="submit" type="submit" value="Valider" name="bouton"/>
        </form>
      
    </section>

<?php 

if(isset($_POST['bouton'])){
    
    $selec=$bdd2->query('SELECT User.US_idUser, Annonce.US_idUserannonceur FROM User INNER JOIN Annonce ON User.US_idUser = Annonce.US_idUserannonceur');

 
    if($article=$bdd2->exec('INSERT INTO Annonce  VALUES ("","'.$_SESSION['id'].'","'.$_POST['produit'].'",NULL,"'.$_POST['quantite'].'","'.$_POST['prix'].'","'.$_POST['echangeok'].'","'.$_POST['descriptionechange'].'","'.$_POST['payement'].'","'.$_POST['typeenvoie'].'","'.$_POST['datecueillette'].'","'.$_POST['prixcolis'].'","'.$_POST['description'].'","'.$_SESSION['id'].'")')==TRUE){

    echo "bravo !";
    }else{ echo "no";}
}

?>

  </body>
         
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>