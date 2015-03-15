<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title> Deal With Eat </title>

        
        
        
    </head>
     <header>
                          <?php include("php/header.php"); ?>
                          <?php include("php/connect.php"); ?>
                 </header>
   		 <body>

                 


<?php include("nav.php"); ?>
<table><tr><td style="vertical-align: top;">
 
   		 	<nav>


   		 				


   		 				

  						<form id="tableauannonces" method="post" action="inscription.php" style="width: 100%;">

          						   <p> <h3 id="h3annonces">  Types  </h3> </p>

                						    

                						       <input type="radio" name="FruitLegume" value="Fruit" /> <label for="Fruit">Fruit</label><br/>

                						       <input type="radio" name="FruitLegume"  value="Legume"/> <label for="Légume">Légume</label><br/>

          						    <p> <h3  id="h3annonces">  Produits</h3>  </p>

          						       
                    						    <input type="checkbox" value="Courgette" name="Produit" /> <label for="Courgette">Courgette</label> <br/>
                    							<input type="checkbox" value="Banane" name="Produit" /> <label for="Banane">Banane</label> <br/>
                    						    <input type="checkbox" value="Choux"  name="Produit"/> <label for="Choux">Choux</label> <br/>
                    						    <input type="checkbox" value="Fraise" name="Produit" /> <label for="Fraise">Fraise</label> <br/>
                    							<input type="checkbox" value="Cerise" name="Produit"/> <label for="Cerise">Cerise</label> <br/>
                    							<input type="checkbox" value="Mangue" name="Produit" /> <label for="Mangue">Mangue</label> <br/>

          							<p> <h3  id="h3annonces">  Produits Biologiques </h3>  </p>

                  						    

                  						    <input type="radio" name="BioPeuImporte" value="Bio" /> <label for="Bio">Bio</label><br/>
                  						    <input type="radio" name="BioPeuImporte" value="PeuImporte" /> <label for="PeuImporte">Peu importe</label><br/> </br>


                        <center><input type='submit' name='BioPeuImporte' value='Valider la recherche'  > </center>

						</form>



			</nav>	

   		 
</td>
<td>









<section>


  					   		<aside>

                        <form method="post" action="inscription.php">

                           <p>

                              <label for="TrierPar">Trier par:</label> 

                                 <select name="TrierPar" id="TrierPar">

                                      <option value="vendeur">vendeur</option>

                                      <option value="fruit">fruit</option>

                                      <option value="legume">légume</option>

                                      <option value="saison">saison</option>

                                      <option value="ville">ville</option>

                             



                                  </select>


                  </p>
                             <input type='submit' name='TrierPar' value='Trier'  > </br>
                        </form>
</br>
   		 							</aside></br>
   		 				


   		 				

   		 		<article id="articleannonces">	



             		 			<p>

             		 				Nom: Mangue
             		 			 </br>
             		 				DESCRIPTION: Fruit exotique

             		 			</br>
             		 			<center><img id="banane" src="Mangue.jpg" width="50" height="50"> </center>
             		 			</br>
             		 			
             		 			<strong>         <p style="text-align:center">Prix: 2,3€/Kg</p>   			 </strong>	
             		 			<strong>	         <p style="text-align:center">ECHANGE: contre ....</p>   			 </strong>	
             		 				<p>stock disponible</p>
                      </p>
 




   		 		</article>

 


        <article id="articleannonces">	
                      <p>

           		 				Nom: Banane
           		 			 </br>
           		 				DESCRIPTION: Fruit jaune qui est bon est qui passe bien avec le nutella

           		 			</br>
           		 			<center><img id="banane" src="banane.jpg" width="50" height="50"> </center>
           		 			</br>
           		 			
           		 			<strong>         <p style="text-align:center">Prix: 1€/Kg</p>   			 </strong>	
           		 			<strong>	         <p style="text-align:center">ECHANGE: contre ...</p>   			 </strong>	
           		 			<p>stock disponible</p>
                    	</p>
        </article>
	



   		 		<article>
          	     <p>

       		 				Nom: Fraise
       		 			 </br>
       		 				DESCRIPTION: Fruit rouge qui est super bon est qui passe bien avec le sucre

       		 			</br>
       		 			<center><img id="banane" src="fraise.jpg" width="50" height="50"> </center>
       		 		
       		 			<strong>         <p style="text-align:center">Prix: 1,5€/Kg</p>   			 </strong>	
       		 			<strong>	         <p style="text-align:center">ECHANGE: contre ...</p>   			 </strong>	
       		 			<p>stock disponible</p>
              </p>
     




   		 		</article>







</section>





   		 	</td>
       </tr>
     </table>










		<footer> <?php include("php/pied_de_page.php"); ?> </footer>

	    </body>
</html>