<?php 

function seconnecter($connexion){
	if (isset($_SESSION['id']) && $_SESSION['id'] == '1') {
                include('nav_connect.php');
            }else{
                include('nav.php');
            }
    } 
  

function pasconecte ($pasconnecte){
	if (isset($msgconnexionfail)) {
                        echo $msgconnexionfail;
                    } ?></p>
    }




?>