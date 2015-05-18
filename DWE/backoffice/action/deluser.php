<title>Deal With Eat - Backoffice</title>
</head>
<header>
    <?php include('../../php/config.php'); ?>
</header>

<?php

$id=$_GET['id'];

    echo $id;


                    $sql1=' DELETE FROM Annonce WHERE US_idUserannonceur="'.$id.'"';
                    $sql2 =' DELETE FROM User WHERE US_idUser="'.$id.'"';
                    if($sql1query=$bdd2->exec($sql1)==true)
                    {
                     if($sql2query=$bdd2->exec($sql2)==true)
                     {
                                echo 'Le membre a bien été suprimé !';
                                    }
                        else
                        { 
                            echo "Probleme 2";
                        }
                    }else
                    { 
                        echo "Probleme 1";
                    }
     ?>