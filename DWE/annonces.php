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
<table><tr><td style="vertical-align: top;">
   		 				
   		 				
  						<form id="tableauannonces" method="post" action="annonces.php" style="width: 100%;">
						   <p> <h3 id="h3annonces" >  Types  </h3> </p>
						    
						       <input type="radio" name="FruitLegume" value="Fruit" /> <label for="Fruit">Fruit</label><br/>
						       <input type="radio" name="FruitLegume"  value="Legume"/> <label for="Légume">Légume</label><br/>
						    <p> <h3 id="h3annonces">  Produits</h3>  </p>
						       
						    <input type="checkbox" value="Courgette" name="Produit" /> <label for="Courgette">Courgette</label> <br/>
							<input type="checkbox" value="Banane" name="Produit" /> <label for="Banane">Banane</label> <br/>
						    <input type="checkbox" value="Choux"  name="Produit"/> <label for="Choux">Choux</label> <br/>
						    <input type="checkbox" value="Fraise" name="Produit" /> <label for="Fraise">Fraise</label> <br/>
							<input type="checkbox" value="Cerise" name="Produit"/> <label for="Cerise">Cerise</label> <br/>
							<input type="checkbox" value="Mangue" name="Produit" /> <label for="Mangue">Mangue</label> <br/>
							<p> <h3 id="h3annonces">  Produits Biologiques </h3>  </p>
						    
						    <input type="radio" name="BioPeuImporte" value="Bio" /> <label for="Bio">Bio</label><br/>
						    <input type="radio" name="BioPeuImporte" value="PeuImporte" /> <label for="PeuImporte">Peu importe</label><br/> </br>
              <center><input type='submit' name='BioPeuImporte' value='Valider la recherche'  > </center>
						</form>

   		 
</td>
<td>
<section id="sectionAnnonces">
  					   		<aside id="asideannonces">
                        <form   method="post" action="annonces.php">
                           <p>
                              <label for="TrierPar">Trier par:</label> 
                                 <select name="TrierPar" id="TrierPar">
                                      <option value="vendeur">Vendeur</option>
                                      <option value="fruit">Fruit</option>
                                      <option value="legume">Légume</option>
                                      <option value="saison">Saison</option>
                                      <option value="ville">Ville</option>
                             
                                  </select>
                               <input type='submit' name='TrierPar' value='Trier'  > </br>	
                  </p>
  
                        </form>
</br>
   		 							</aside></br>
   		 				
   		 			
   		 		<article id="articleannonce1" >	
             		 			<div class="NomDescription"><p>
             		 				Nom: Mangue
             		 			 </br>
             		 				DESCRIPTION: Fruit exotique
             		 			</br> </div>
             		 			<img id="mangue" src="css/images/Mangue.jpg" > 
             		 		
             		 			
             		 			<strong>        </br> </br>  <p class="VenteEchange" >Prix: 2,3€/Kg          <div class="echange">ECHANGE contre:</div></p>   			 </strong>	
             		         <div class="Stock" > stock disponible  </div></p>   			 	
             		 		
                      </p>
 
   		 		</article>
 
        <article id="articleannonce2" >	
                    <div class="NomDescription">  <p>
           		 				Nom: Banane
           		 			 </br>
           		 				DESCRIPTION: Fruit jaune qui est bon est qui passe bien avec le nutella
           		 			</br>
                  </div>
           		 			
                    <img id="banane" src="css/images/banane.jpg" > 
           		 			
           		 			
           		 			<strong>       </br> </br>   <p class="VenteEchange"  >Prix: 1€/Kg     <div class="echange">ECHANGE contre:</div>   </p>   			 </strong>	
           		 		          <div class="Stock" > stock disponible  </div>  		
           		 			
                    	</p>
        </article>
	
   		 		<article id="articleannonce3" >
          	    <div class="NomDescription"> <p>
       		 				Nom: Fraise
       		 			 </br>
       		 				DESCRIPTION: Fruit rouge qui est super bon est qui passe bien avec le sucre
       		 			</br>
              </div>
       		 		<img id="fraise" src="css/images/fraise.jpg" > 
       		 		
       		 			<strong>       </br> </br>   <p class="VenteEchange" >Prix: 1,5€/Kg          <div class="echange">ECHANGE contre:</div></p>   			 </strong>	
       		 	     <div class="Stock" > stock disponible  </div> </p>   		
       		 		
              </p>
     
   		 		</article>
</section>
   		 	</td>
       </tr>
     </table>
		<footer> 

         <form   method="post" action="annonces.php">
                           <p>
                             
                                 <select name="PagesAnnonces" id="PagesAnnonces">
                                      <option value="Page1">Page 1</option>
                                      <option value="Page2">Page 2</option>
                                      <option value="Page3">Page 3</option>
                                      <option value="Page4">Page 4</option>
                                      <option value="Page5">Page 5</option>
                             
                                  </select>
                               
                  </p>
  
                        </form>

</br>


<?php include("php/pied_de_page.php"); ?> 
                      </footer>
	    </body>
</html>