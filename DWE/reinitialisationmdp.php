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
        <?php include('php/header.php'); ?>
        <?php include('nav.php'); ?>

</header>
<body>
    <?php 

    $b=$_GET['b'];
    $reinitialisation=$bdd2->query('SELECT * FROM User WHERE US_idUser="'.$b.'"');
    
                        


    ?>

    <form method="post">
<table id="account_data2">
   <td>Mot de passe</td>
      
    <td> <input type="password" name="pass" placeholder="Nouveau mot de passe"/> </td>
    <td> <input type="password" name="pass2" placeholder="Retaper mon nouveau mot de passe"/> </td>
</table>

 <input id="modif_sub2" type="submit" name="rafraichir" onclick="return confirm('Êtes vous sur de vouloir effectuer ces changements')" value="Envoyer les modifications">
 </form> 

 <?php      


if(isset($_POST['pass']) && isset($_POST['pass2']) && $_POST['pass']!=NULL && $_POST['pass2']!=NULL && $_POST['pass']==$_POST['pass2'] ){
    
    
    $prefixe="m0td3p4ss3dEbut";
                        $suffixe="mOtdEpAssEf1N";
                        $pass = md5($prefixe.$_POST['pass'].$suffixe); 
    
            $req = 'UPDATE User SET US_mdp="'.$pass.'" WHERE US_idUser="'.$b.'"';
             $result = mysqli_query($conn2,$req) or die ('Erreur '.$req.''.mysql_error());
             }else{
                $msg="Les deux mots de passes ne sont pas les mêmes";
             }
       
        
       ?>



    </body>


        




       </div>

