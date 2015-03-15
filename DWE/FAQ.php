<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
            
        
    </head>

                  <header>
                     <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
                 </header>

<body>
             


<section>

       <article id="TableauTechniques">
  

  <table>


        <caption > <strong id="TitreFaq"> Techniques</strong></caption>
   <tr>
       <td>Problème n°1</td>
       <td>Réponse n°1 </td>
       <td>Date n°1</td>
   </tr>
</br> </br> 

    <tr>
       <td>Problème n°2</td>
       <td>Réponse n°2 </td>
       <td>Date n°2</td>
   </tr>

  <tr>
       <td>Problème n°3</td>
       <td>Réponse n°3 </td>
       <td>Date n°3</td>
  </tr>

 <tr>
       <td>Problème n°4</td>
       <td>Réponse n°4 </td>
       <td>Date n°4</td>
   </tr>

 <tr>
       <td>Problème n°5</td>
       <td>Réponse n°5</td>
       <td>Date n°5</td>
   </tr>



   
</table>









  <table>


        <caption > <strong id="TitreFaq"> Produits</strong></caption>
   <tr>
       <td>Problème n°1</td>
       <td>Réponse n°1 </td>
       <td>Date n°1</td>
   </tr>

    <tr>
       <td>Problème n°2</td>
       <td>Réponse n°2 </td>
       <td>Date n°2</td>
   </tr>

 <tr>
       <td>Problème n°3</td>
       <td>Réponse n°3 </td>
       <td>Date n°3</td>
   </tr>

 <tr>
       <td>Problème n°4</td>
       <td>Réponse n°4 </td>
       <td>Date n°4</td>
   </tr>

 <tr>
       <td>Problème n°5</td>
       <td>Réponse n°5</td>
       <td>Date n°5</td>
   </tr>



   
</table>






       </article>  

</section>  



</body>















<?php include("php/pied_de_page.php"); ?>

</html>