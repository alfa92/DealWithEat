<?php
    class panier{

        private $DB;

        public function __construct($DB){
            if(!isset($_SESSION)){
                session_start();
            }else{
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
                $products=$this->DB->query('SELECT AN_idAnnonce,AN_prix FROM Annonce WHERE AN_idAnnonce IN ('.implode(',',$ids).')');
            }
            foreach($products as $product){
                    $total += $product->AN_prix * $_SESSION['panier'][$product->AN_idAnnonce];
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