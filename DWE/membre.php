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

    </header>
<div id="produit_info">
<?php

			
			$a=$_GET['a'];

			$req=$bdd2->query('SELECT * FROM User WHERE US_idUser="'.$a.'"');
			$res=$req->fetch();

            $prods=$bdd2->query('SELECT * FROM Annonce WHERE US_idUserannonceur="'.$a.'"');
            

?>
    <div id="membre_presentation">
    <?php  if($res['US_image'] != null){ ?>
    <img height="auto" style="max-width:200px;max-height:200px" src="image_user/<?=$a ?>/<?= $res['US_image'] ?>" />
    <?php }else{ ?>
            <img height="auto" style="max-width:200px;max-height:200px" src="image_user/avatar.png" />
    <?php } ?>
                
    
    <h1><?= $res['US_pseudo'] ?></h1>
    <h2><?= $res['US_ville']?></h2><br/>
    </div>  
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

        	<?php
}
	
?>
        </div>
        
        
        </div>
    
    <div id="vote_vendeur">
        <?php  
            $nombrevote = $bdd2->query('SELECT COUNT(NU_note) FROM note_user WHERE NU_idUser="'.$a.'"');
            $nbvote=$nombrevote->fetchColumn();
        
         $note=$bdd2->query('SELECT sum(NU_note) as somme FROM note_user WHERE NU_idUser="'.$a.'"');
                    while($noteshow=$note->fetch()){
                        
                    $easy=$noteshow['somme'];
                    }
        ?>
    <h4>Voter pour ce vendeur :</h4> 
        <?php if(isset($easy)){ ?>
    <p>Note moyenne : <?= $easy/$nbvote ?>/5</p>
        <?php }
        if(isset($_SESSION['id'])>0){ 
    
                $dejavote=$bdd2->query('SELECT * FROM note_user  WHERE NU_idUser = "'.$a.'" && NU_idUsNote ="'.$_SESSION['id_perso'].'"');
                $dvresult = $dejavote -> fetch();
        
        if($_SESSION['id_perso'] == $a)
        {
           ?> <p> Vous ne pouvez pas voter pour vous ! </p>
    
    <?php 
            
        }
                elseif($dvresult['NU_idUsNote']==$_SESSION['id_perso'])
                {
             ?> <p> Vous avez déja voté pour ce vendeur. </p>
    
    <?php 
        
        }
                else
                {  
            
            ?>
        <?php 
                   
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
            position:absolute;
            top:0;
            right:0;
            width:30%;
            margin-top:250px;
            margin-right:200px;
            
        }
        
    </style>
        
    </div> 
     
        

        
            </div>
    </div>
</div>
    </body>
<?php include('php/pied_de_page.php');