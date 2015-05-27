<title>Deal With Eat - Backoffice</title>
 <meta charset=UTF-8>
</head>
<header>
    <?php include('../../php/config.php'); ?>
    <link rel="stylesheet" type="text/css" href="../backoffice.css" media="screen"/>
</header>
<img id = 'logo_byebye' src="../../css/images/logoDWE.png">

<?php

$id=$_GET['id'];

   

                    $sql2 =' DELETE FROM User WHERE US_idUser="'.$id.'"';                
                     if($sql2query=$bdd2->exec($sql2)==true)
                     {
                                echo '<center><p id="byebye_user">Le membre a bien été suprimé !</p></center>';
                                    }
                        else
                        { 
                            echo '<center><p id="byebye_user">Erreur, le memrbe n\'a pas été suprimé</p></center>';
                        }
                    

     ?>
     <a href="../membreadmin.php"> Retour au backoffice </a>