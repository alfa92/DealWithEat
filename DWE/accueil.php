<?php session_start() ?>
<html>
    <head>
        <link rel="icon" type="image/png" href="css/images/logoDWE.png" />
        <meta charset=UTF-8>
        <meta name="description" content="Deal With Eat est un site d'échange et de vente de fruits et légumes entre particuliers. Une personne à coté de chez vous échange peut être votre fruit préféré.">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
       
        

        <title>Deal With Eat</title>
        
    </head>
    <header>

    <!-- Inclusion des page communes aux pages -->

        <?php include('php/config.php'); ?>
        <?php include('php/connexion.php'); ?>
        <?php include('php/header.php'); ?>
        <?php if (isset($_SESSION['id']) && $_SESSION['id'] == '1') {
                include('nav_connect.php');
            }else{
                include('nav.php');
            } ?>
    </header>
    <body>
      <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '855939194479022',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

        <div id="msgconnexion">
            <p style="text-align:center;font-family:'Roboto', sans-serif ; font-size:30px; color:Green;">
                <?php if (isset($msgconnexion)){
                        echo $msgconnexion;
                    } ?></p>

            <p style="text-align:center;font-family:'Roboto', sans-serif ; font-size:30px; color:red;">
                <?php if (isset($msgconnexionfail)) {
                        echo $msgconnexionfail;
                    } ?></p>
        </div>

        <div id="presentation">
                    <h1> Le principe </h1>
                <p>

                    Deal With Eat est un site d'échange et de vente de fruits et légumes frais entre particuliers. 
                    Les produits présents sur le site viennent tous de potager de particuliers ou de fermes. 
                    <br>
                    Sur ce site vous pouvez échanger et acheter vos produits. Lors d'un échange il faudra proposer un échange équitable, ainsi chacun pourra consommer les produits d'autres particuliers.
                    <br>
                    <br>
                    A l’heure de l’hyper consommation, de l’agriculture industriel, des OGM, tarissement des nappes phréatiques et du réchauffement climatique, cessons de vouloir et agissons. Deal With Eat est un outil permettant de connaitre précisément l’origine de nos aliments et offre le plaisir de manger des fruits et légumes locaux. Nous désirons tous un monde plus propre, une meilleur hygiène alimentaire, à nous d’agir maintenant à notre niveau.
                </p>
                    <img id="principe" src="css/images/vegetable.jpg">
        </div>
<hr/>
                <img id="ccmimg" src="css/images/carrots.jpg">
        <div id="ccm">
              
                    <h1> Comment ça marche ? </h1>
                <p>
                    Notre site offre trois modes de navigation. Le premier est le mode "non inscrit" ce mode permet à
                    l'utilisateur de voir le site sans action de sa part. Le deuxième "inscrit lite" est une inscription
                    rapide qui permet à l'utilisateur d'acheter des produits sur notre site et d'intéragir avec les
                    autres utilisateurs via la FAQ ou la page d'actualité. Enfin vient "l'inscrit complet", ce dernier a
                    les mêmes droits que "l'inscrit lite" mais il peut vendre et échanger des produits.
                    Pour vous inscrire c'est très simple, il suffit de vous rendre sur la <a href="Inscription.php"> page d'inscription</a>.
                </p>
        </div>
        
         </div>
        </section>
    <section id="user">
        <div id="user_presentation">
        <h1> Inscrivez-vous </h1>
        <p> Vous pouvez vous inscrire sur notre site pour accéder à plus de fonctionnalités. </p>
            </div>
    <div class="user">
        <img class="imguser" src="css/images/membre_lite.png" />
        <h2>Inscription lite</h2>
        <p> L'inscription lite, ou inscription rapide est une inscription dans laquelle seul un mail, un pseudo et un mot de passe vous sont demandés. Cette incription vous donne la place de membre lite. Un membre lite peut accéder au site internet dans son intégralité mais ne peux ni acheter, ni echanger, ni vendre des produits. Il pourrat ajouter des produits dans son panier mais pour finaliser sa commande il lui sera demander de finaliser son inscription.</p>
    </div>
    <div class="user">
        <img class="imguser" src="css/images/membre_plus.png" />
        <h2>Inscription complète</h2>
        <p> L'inscription complète vous demande plus d'information comme votre adresse, votre nom etc... Lorsque vous obtenez le grade de membre complet vous pouvez alors vendre, acheter et echanger comme bon vous semble. De plus vous pourrez poster des commentaires sur les profils des autres membres. </p>
    </div>
        </section>
    </div>
        <center> <div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div></center>
    </body>
         
            <?php include('php/pied_de_page.php'); ?>
        
</html>

