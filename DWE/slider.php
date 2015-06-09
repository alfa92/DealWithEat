	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

	<style>
	    #galerie{
	       /* background:url('css/images/fond_slider.jpg') no-repeat; 
	        background-size:100%;*/
	        height:200px;
	        margin-left:auto;
	        margin-right:auto;
	        position:relative;
	        overflow:hidden;
	        outline:none;
	        
	    }
	    
	    .suivant{
	        cursor:pointer;
	        top:0;
	        width:auto;
	        position:absolute;
	        right:10px;;
	        height:70px;
	        width:70px;
	        margin-top:60px;
	        background-image:url('css/images/sliderG.png');    
	        background-size:70px 70px;
	        z-index:2
	        
	    }
	    .suivant:hover{
	        background-image:url('css/images/sliderD.png');    
	        transform: rotate(180deg);
	    }
	     .prec{
	          cursor:pointer;
	         width:auto;
	         position:absolute;
	         left:10px;
	         top:0;
	        height:70px;
	        width:70px;
	         margin-top:60px;
	        background-image:url('css/images/sliderG.png') ;    
	        background-size:70px 70px;
	        transform: rotate(180deg);
	         z-index:2
	    }
	    .prec:hover{
	     background-image:url('css/images/sliderD.png');  
	    }
	    #slide{
	        margin-left:auto;
	        margin-right:auto;
	        width:90%;
	        height:200px;
	        overflow:hidden;
	        
	    }
	    .slider{
	        padding-left:100px;
	        position:relative;
	        width:5000px;
	        height:140px;
	    }
	    #contenu{
	        width:350px;
	        height:130px;
	        margin-top:5px;
	        display:inline-block;
	        vertical-align:top;
	        margin-left:10px;
	    }
	    
	    #contenu img{
	        position:absolute;
	        top:0;
	       min-height:120px;
	        max-height:180px;
	        width:auto;
	        margin-top:30px;
	        opacity:0.4;
	        border-radius:40px;
	        outline:none;      
	    }
	    #contenu img:hover{
	           opacity:1;
	    }

	</style>


	<div id="galerie">
	    <div id="slide">
	    <div class="slider">
	        <?php
	            
	            $sql = "SELECT * FROM Annonce ORDER BY AN_idAnnonce DESC LIMIT 5";
	            $requet=$bdd2->query($sql);
	while($results=$requet->fetch()){
	        $nom=$bdd2->query('SELECT PR_nom FROM Produit WHERE PR_idP="'.$results['PR_idP'].'"');
	        $req=$nom->fetch();
	        $pseudo=$bdd2->query('SELECT US_pseudo FROM User WHERE US_idUser="'.$results['US_idUserannonceur'].'"')->fetch();
	        ?>
	        <a href="produit.php?q=<?= $results['AN_idAnnonce']; ?>">
	            <div id="contenu">
	                <div style="z-index:2;position:absolute;">
	                        <?php if($results['AN_image']==NULL){ ?>
	    <img src="imageproduit/<?php echo $results['PR_idP'] ?>.jpg" width="100px" height="40px">
	    <?php }else{ ?>
	    <img src="<?= $results['AN_image']; ?>" width="100px" height="40px">
	    <?php } ?>
	                </div>
	                <div style="z-index:100;position:absolute;">
	                <h1 > <?= $req['PR_nom'] ?> </h1>
	                <i> Quantité : <?php echo $results['AN_quantite']." ".$results['AN_unite']; ?>s</i><br />  
	                <i> Prix : <?php echo $results['AN_prix']."€/".$results['AN_unite']; ?>  </i><br />
	                <i> Mis en ligne par <?= $pseudo['US_pseudo']; ?> le <?= $results['AN_datepublication']; ?></i>
	                    
	                    </div>
	               
	              
	            </div>
	        </a>
	        <?php } ?>
	        
	        
	         </div>
	    </div>
	    <div class="suivant"></div>
	    <div class="prec"></div>
	</div>


	<script type="text/javascript">
	$(document).ready(function(){
	    s = new slider("#galerie");
	});

	var slider = function(id){
	        var self=this;
	        this.div = $(id);
	        this.slider=this.div.find('.slider');
	        this.largeurCache=this.div.width();
	        //alert($largeur); pour voir de combien on decalle vers la droite
	        this.largeur=0;
	        this.div.find('a').each(function(){
	            self.largeur += $(this).width();
	            self.largeur+= parseInt($(this).css("padding-left"));
	            self.largeur+= parseInt($(this).css("padding-right"));
	            self.largeur+= parseInt($(this).css("margin-left"));
	            self.largeur+= parseInt($(this).css("margin-right"));
	        });
	    
	        this.prec=this.div.find(".prec");
	        this.suiv=this.div.find(".suivant");
	        this.saut= this.largeurCache/3;
	        this.nbEtape= Math.ceil(this.largeur/this.saut - this.largeurCache/this.saut -1);
	        this.courant=0;
	    
	        this.suiv.click(function(){
	            if(self.courant<=self.nbEtape ){
	            self.courant++;
	            self.slider.animate({
	                left:-self.courant*self.saut
	            },500);
	                
	            }
	  
	        });
	    
	     this.prec.click(function(){
	            if(self.courant>0){
	            self.courant--;
	            self.slider.animate({
	                left:-self.courant*self.saut
	            },500);
	                
	            }
	    
	        });
	    
	    }



	</script>