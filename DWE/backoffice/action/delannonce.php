    <title>Deal With Eat - Backoffice</title>
     <meta charset=UTF-8>
</head>
<header>
    <?php include('../../php/config.php'); ?>
</header>

<?php

$id=$_GET['id'];

    echo $id;

                    $sql2 ='DELETE FROM Annonce WHERE AN_idAnnonce="'.$id.'"';
                   $sql2query=$bdd2->exec($sql2);
                     if($sql2query==true)
                     {
                                echo 'L\'l\'annonce est supprimée  !';
                                    }
                        else
                        { 
                            echo "Probleme 2";
                        }
                    
     ?>
     <a href="../membreadmin.php"> Retour au backoffice </a>