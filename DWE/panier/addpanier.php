<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 30/03/15
 * Time: 16:22
 */

require '_header.php';
    if(isset($_GET['id'])){
        $product = $DB->query('SELECT Pr_idP FROM annonce WHERE Pr_idP=:id', array('id' => $_GET['id']));
        if(empty($product)){
            die ("Ce produit n'existe pas");
        }

        $panier->add($product[0]->Pr_idP);

        echo 'Le produit a été ajouté à votre panier <a href="javascript:history.back()"> Retourner sur le catalogue</a>';?>
    <p><a href="../panier.php"> Voir son panier </a></p>
<?php

    }else{
        echo("Vous n'avez pas séléctionner de produit à ajouter au panier");
    }

    ?>