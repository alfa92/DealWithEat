<html>

<head>
    <meta charset="utf-8">
<title>Deal With Eat - Backoffice</title>
</head>
<header>
    <?php include('../../php/config.php'); ?>
</header>

<?php

$id=$_GET['id'];

    echo $id;

                    $sql2 =' DELETE FROM User WHERE US_idUser="'.$id.'"';                
                     if($sql2query=$bdd2->exec($sql2)==true)
                     {
                                echo 'Le membre a bien été suprimé !';
                                    }
                        else
                        { 
                            echo "Probleme 2";
                        }
                    
     ?>
<center><a href="../membreadmin.php">Retour </a></center>
</html>