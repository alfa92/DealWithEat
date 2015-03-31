<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 30/03/15
 * Time: 14:22
 */

    class panier{

        private $DB;

        public function __construct($DB){
            // var_dump($_SESSION); Pour voir ce que contient la variable $_SESSION
            if(!isset($_SESSION)){
                session_start();
            }
            if(!isset($_SESSION['panier'])){
                $_SESSION['panier'] = array();
            }
            $this->DB = $DB;


            if(isset($_GET['delPanier'])){
                $this->del($_GET['delPanier']);
            }
        }

        public function count(){
           return array_sum($_SESSION['panier']);


        }
        public function total(){
            $total= 0;
            $ids=array_keys($_SESSION['panier']);
            if(empty($ids)){
                $products=array();
            }else{
                $products=$this->DB->query('SELECT Pr_idProduits,Pr_Prix FROM Produits WHERE Pr_idProduits IN ('.implode(',',$ids).')');
            }
            foreach($products as $product){
                    $total += $product->Pr_Prix * $_SESSION['panier'][$product->Pr_idProduits];
            }
            return $total;
        }
        public function add($product_id){
            if(isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id]++;
            }else{
                $_SESSION['panier'][$product_id] = 1;
            }
        }

        public function del($product_id){
            unset($_SESSION['panier'][$product_id]);
        }

    }