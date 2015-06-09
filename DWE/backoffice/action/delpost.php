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


                    $sql2 ='DELETE FROM forumr WHERE FR_idForumr="'.$id.'"';
                   $sql2query=$bdd2->exec($sql2);
                     if($sql2query==true)
                     {
                                echo 'Le post est supprimé  !';
                                    }
                        else
                        { 
                            echo "Probleme 2";
                        }

                    
     ?>
<center><a href="../adminforum.php">Retour </a></center>
</html>