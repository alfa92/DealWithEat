 <html>

	<head>
		<title> Deal With Eat </title>
		<!-- importation de la bibliothèque Font Awesome pour les polices vectorielles-->
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<header>
		
		<?php include('php/header.php'); ?>


	</header>
	<body>

		<div id="containertop">
		<p> Ici vous pouvez choisir les fruits et lègumes que vous souhaitez</br> parmis des offres de nos membres </p>
			<FORM id="triage">
        <SELECT name="nom" size="1">
            <OPTION> Prix croissant
            <OPTION> Prix décroissant
            <OPTION> Plus récent au moins récent
            <OPTION> Moins récent au plus récent
        </SELECT>
        <button type="button"> Trier</button>
    </FORM>
		</div>

		<div id="containerleft">
		
		</div>

		<div id="containerright">
			<div id="produitg">
			</div>
			<div id="produitd">
			</div>
			<div id="produitg">
			</div>
			<div id="produitd">
			</div>
			<div id="produitg">
			</div>
			<div id="produitd">
			</div>
			<div id="produitg">
			</div>
			<div id="produitd">
			</div>
		

		</div>
		

	</body>

		<?php include('php/pied_de_page.php') ?>




</html>