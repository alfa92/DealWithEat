<html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        <style>
        #probleme{
          min-height: 29%;
        }
        #probleme td, #probleme th{
          text-align: center;
          font-family: 'Roboto',sans-serif;
          font-size: 15px;
          
        }
        #probleme td{
          height: 50px;
    vertical-align: middle;
        }
        #probleme .sujet{
          min-width: 200px;
        }
        #probleme .autre{
          width:120px;
        }
        .forum h3{
            text-align: right;
            margin-right: 10%;
            margin-left: 30%;
            border-bottom: 2px dashed grey;
            width: 60%;
        }
        .forum .a{
          width: 200px;
          height:50px;
          margin-left: 10%;
          margin-bottom: -30px;
          background: grey;
          border-radius: 20px;
          box-shadow: 2px 2px 2px black;

        }
        .forum .a p{
          text-align: center;
          padding-top: 12px;

        }
        </style>
    </head>
    
<div id="principal">
    <header>
        <?php include('php/config.php'); ?>
        <?php include('php/header.php'); ?>
        <?php include('php/connexion.php'); ?>
		<?php if(isset($_SESSION['id']) && $_SESSION['id']=='1'){include('nav_connect.php');}else{include('nav.php');} ?> 
			
    
    </header>
    
        <body class="forum">
        <h3> Forum </h3>
        <a href="questionforum.php"> <div class="a"><p>Poster un article </p></div></a>

        <?php
          $article=$bdd2->query('SELECT * FROM forumq');
          


    ?>
          
            <div id="probleme">
            <table id="tableforum">
              <tr>
                        <th> Sujet </th>
                        <th> Auteur </th>
                        <th class="autre"> Nombre de réponse </th>
                        <th> Date </th>
             </tr>
               <?php while ($articles = $article->fetch())
{ 
  $date=date_create($articles['Date']);
  $bdate=date_format($date,'d/m/Y');
$reponse=$bdd2->query('SELECT COUNT(*) FROM forumr WHERE FR_Sujet = '.$articles['ID_forum'].'');
$rep=$reponse->fetchColumn();

  ?>
   <tr>
       <td class="Sujet" ><a href="article.php?a=<?php echo $articles['ID_forum']; ?>"> <?php echo $articles['q_sujet'] ;?> </a><br></td>
       <td class="autre" ><a href="article.php?a=<?php echo $articles['ID_forum']; ?>"> <?php echo $articles['q_pseudo'] ;?>  </a><br></td>
       <td class="autre" ><a href="article.php?a=<?php echo $articles['ID_forum']; ?>"> <?php echo $rep; ;?>  </a><br></td>
       <td class="autre" ><a href="article.php?a=<?php echo $articles['ID_forum']; ?>"> <?php echo  $bdate;?>  </a><br></td>
   </tr>

 <?php } 
 $article->closeCursor();?>
   
</table>


   
</table>
            
            
            
        </body>
    </div>   
    
   <?php include('php/pied_de_page.php'); ?>
    
    
</html>