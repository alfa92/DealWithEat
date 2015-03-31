<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 30/03/15
 * Time: 15:02
 */

require 'db.class.php';
$DB = new DB();
require 'panier.class.php';
$panier = new panier($DB);

?>