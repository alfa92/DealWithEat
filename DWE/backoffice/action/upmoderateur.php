
<title>Deal With Eat - Backoffice</title>
 <meta charset=UTF-8>
</head>
<header>
    <?php include('../../php/config.php'); ?>
</header>

<?php

$id=$_GET['id'];
$query=$bdd2->query('SELECT US_moderateur FROM User WHERE US_idUser="'.$id.'"');
$ligne=$query->fetch();
   if($ligne['US_moderateur']=='0'){

                    $sql2 ='UPDATE User SET US_moderateur="1" WHERE US_idUser ="'.$id.'"';
                   $sql2query=$bdd2->exec($sql2);
                     if($sql2query==true)
                     {
                                echo '<center><p id="byebye_user">Le membre est maintenant un modérateur  !</p></center>';
                                    }
                        else
                        { 
                            echo '<center><p id="byebye_user">Probleme 2</p></center>';
                        }

				}else{
					 $sql2 ='UPDATE User SET US_moderateur="0" WHERE US_idUser ="'.$id.'"';
                   $sql2query=$bdd2->exec($sql2);
                     if($sql2query==true)
                     {
                                echo '<center><p id="byebye_user">Le membre n\'est plus un modérateur  !</p></center>';
                                    }
                        else
                        { 
                            echo '<center><p id="byebye_user">Probleme 2</p></center>';
                        }

                    }

                    ?>

                    <a href="../membreadmin.php"> Retour au backoffice </a>
