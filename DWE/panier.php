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
                <table id="panier_panier">
                    <center id="panier_titre">Votre Panier </center>
                        <hr/>
                    
                <tr>
                        <th> Produit </th>
                        <th> Quantité </th>
                        <th> Prix unité </th>
                        <th> Prix </th>
                        <th style="width:10px;"> Devise </th>
                </tr>        
                 <tr>
                       <td>Banane</td>
                       <td> 2kg</td>
                       <td> 12€/kg </td>
                        <td> 24 </td>
                     <td style="width:10px;"> € </td>
                   </tr>
                   <tr>
                       <td>Banane</td>
                       <td> 2kg</td>
                       <td> 12€/kg </td>
                        <td> 24 </td>
                       <td style="width:10px;"> € </td>
                   </tr>
                    <tr >
                    <td style="border:none;" colspan="4"> </td>
                    </tr>
                    <tr>
                    <td colspan="3"> Prix total</td>
                    <td> 48  </td>
                        <td style="width:10px;"> € </td>
                </tr>
</table>
            </body>


</html>
        
    