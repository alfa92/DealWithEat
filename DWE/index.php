
<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8">

    <title>Deal With Eat</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">

  </head>

  <body id="bodyindex">
  
<img id= "fondindex" src="css/images/fondindex.jpg" alt="fond page index" /> 

  <a href="accueil.php" style="color:black;"><img  id="logoindex" src="css/images/logodwe.png" alt="logo dwe"/>

<h1 id="titreindex">Deal With Eat</h1>
		 <p id="Slogan">Vendez, Achetez, Echangez </p></a>
</br>



        
    
<link href="js/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.vmap.js" type="text/javascript"></script>
    <script src="js/jquery.vmap.france.js" type="text/javascript"></script>
	<script src="js/jquery.vmap.colorsFrance.js" type="text/javascript"></script>
    
	<script type="text/javascript">
	$(document).ready(function() {
		$('#francemap').vectorMap({
		    map: 'france_fr',
			hoverOpacity: 0.4,
			backgroundColor: "#ffffff",
			borderColor: "#000000",
			showTooltip: true,
		    onRegionClick: function(element, code)
		    {
		       
                window.location="annonce.php?ville="+ code;
		    }
		});
	});
	</script>
  </head>
  <body>
    <div id="francemap" style="width: 600px; height: 500px;"></div>
  </body>
</html>