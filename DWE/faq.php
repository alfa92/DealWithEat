<?php session_start() ;?>
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
        <?php include('php/header.php'); ?>
        <?php include('php/connexion.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
			
    
    </header>
    
    
    
    


    
        <body>
           <div id="techniques">
            <h1> Techniques </h1>
        </div>

            <div id="probleme">

            <table>
              <tr>
                        <th> Probleme </th>
                        <th> Reponse </th>
                        <th> Date </th>
                        
                        
                </tr>
   <tr>
       <td><a href="#"> Probleme numero 1 </a><br></td>
       <td><a href="#"> Reponse 1 </a><br></td>
       <td><a href="#"> Date 1 </a><br></td>
   </tr>

    <tr>
       <td><a href="#"> Probleme numero 2 </a><br></td>
       <td><a href="#"> Reponse 2 </a><br></td>
       <td><a href="#"> Date 2 </a><br></td>
   </tr>

    <tr>
       <td><a href="#"> Probleme numero 3 </a><br></td>
       <td><a href="#"> Reponse 3 </a><br></td>
       <td><a href="#"> Date 3 </a><br></td>
   </tr>
   
</table>

<div id="produits">
            <h1> Produits </h1>
        </div>
            
               
                </div>

 <div id="problemes">

            <table>
              <tr>
                        <th> Probleme </th>
                        <th> Reponse </th>
                        <th> Date </th>
                        
                        
                </tr>
   <tr>
       <td><a href="#"> Probleme numero 1 </a><br></td>
       <td><a href="#"> Reponse 1 </a><br></td>
       <td><a href="#"> Date 1 </a><br></td>
   </tr>

    <tr>
       <td><a href="#"> Probleme numero 2 </a><br></td>
       <td><a href="#"> Reponse 2 </a><br></td>
       <td><a href="#"> Date 2 </a><br></td>
   </tr>

    <tr>
       <td><a href="#"> Probleme numero 3 </a><br></td>
       <td><a href="#"> Reponse 3 </a><br></td>
       <td><a href="#"> Date 3 </a><br></td>
   </tr>
   
</table>
            
            
            
        </body>
    </div>   
    
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>