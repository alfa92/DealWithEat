<?php session_start(); ?>
<html>
    <head>
        <meta charset=UTF-8>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <title>Deal With Eat</title>
        <style>

        .fosujet{
            border-bottom: 2px dashed grey;

        }

        .foavatar{
            display: inline-block;
            vertical-align: top;
            margin-left:100px;
            width:150px;
            min-height:120px;
            text-align: center;

        }
        .foavatar img{
            width:120px;
        }

        .focontenu{
            display: inline-block;
            vertical-align: top;
            min-height: 160px;
            border:1px solid black;
            width:60%;
            padding:5px;
        }

        .fodroite{
            width:12%;
            display: inline-block;
            vertical-align: top;
            min-height: 160px;
            border:1px solid black;
            padding:5px;
        }

        .fosub{
            width: 120px;
            display: block;
            text-align: right;
            height:20px;
            right:0;
            margin-left: auto;
            margin-right: 10%;
            border-bottom:1px dashed grey;

        }

        .foavatar1{
            display: inline-block;
            vertical-align: top;
            margin-left:100px;
            width:150px;
            min-height:120px;
            text-align: center;
            border-top:1px solid black;

        }
        .foavatar1 img{
            width:120px;
        }

        .focontenu1{
            display: inline-block;
            vertical-align: top;
            min-height: 160px;
            border-left:1px solid black; border-bottom:1px solid black; border-right:1px solid black;
       
            width:60%;
            padding:5px;
        }

        .fodroite1{
            width:12%;
            display: inline-block;
            vertical-align: top;
            min-height: 160px;
             border-left:1px solid black; border-bottom:1px solid black; border-right:1px solid black;
            padding:5px;
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

    <body>
<?php 

    $a=$_GET['a'];
    $article=$bdd2->query('SELECT * FROM forumq WHERE ID_forum="'.$a.'"');
    

 while ($articles = $article->fetch()) 
{

     $first=$bdd2->query('SELECT * FROM User WHERE US_pseudo="'.$articles['q_pseudo'].'"');
    $firstp=$first->fetch();
$date=$articles['Date'];
$bdate=date_create($date);

    ?>
   
        <h1 class="fosujet"> Sujet : <?php echo $articles['q_sujet'] ;?> </h1>
        <div class="foavatar"><?php 
           
             $filename = "image_user/".$firstp['US_idUser']."/".$firstp['US_image'];
                if($firstp['US_image'] == "" or !file_exists($filename)){
                      $avatar="<img src='image_user/avatar.png' />"; 
                }else{
                      $avatar="<img src='image_user/".$firstp['US_idUser']."/".$firstp['US_image']."' />"; 
                }
            ?>
                <?= $avatar ?>
                <?php echo $articles['q_pseudo'] ;?>  </div>
        <div class="focontenu"><?php echo nl2br($articles['q_contenu']) ;?>  </div>
        <section class="fodroite"><div class="date"><?php echo date_format($bdate,'d M Y'); ;?></div><hr /> </section>
   

 <?php } 
 $article->closeCursor();?>
    <?php 

    $reponse=$bdd2->query('SELECT * FROM forumr WHERE FR_Sujet="'.$a.'"');
    $reponses = $reponse->fetch();
    

    
    
while ($reponses = $reponse->fetch())
    
{
    $us=$reponses['US_idUser'];
    $usr=$bdd2->query('SELECT US_idUser,US_pseudo,US_admin,US_image FROM User WHERE US_pseudo="'.$us.'"');
    $usrep = $usr->fetch();
    $ddate=$reponses['FR_date'];
    $dddate=date_create($ddate);

    ?>
   
        
        <div class="foavatar1">
            <?php 
           
             $filename = "image_user/".$usrep['US_idUser']."/".$usrep['US_image'];
                if($usrep['US_image'] == "" or !file_exists($filename)){
                      $avatar="<img src='image_user/avatar.png' />"; 
                }else{
                      $avatar="<img src='image_user/".$usrep['US_idUser']."/".$usrep['US_image']."' />"; 
                }
            ?>
                <?= $avatar ?>

        <br/><?php echo $usrep['US_pseudo'] ;?> <br/> <?php if($usrep['US_admin']=='1'){ ?><i style="color:red"> Admin </i> <?php } ?> </div>
        <div class="focontenu1"><?php echo nl2br($reponses['FR_reponse']) ;?>  </div>
        <section class="fodroite1"><div class="date"><?php echo date_format($dddate,'d M Y'); ;?></div><hr /><div class="aide">Cette réponse vous a t'elle aidée ? <br /><form method ="post" > <input type="submit" name="like" value="Like" /> <?= $reponses['FR_like']; ?></form></section>
            <?php if(isset($_POST['like'])){
                $like=$bdd2->query("UPDATE forumr SET FR_like= FR_like + 1 WHERE FR_idForumr = '".$reponses['FR_idForumr']."'"  );
 ?>
          
<?php
            } ?>
            <?php
    } 
 $article->closeCursor();?>
<br/>
<h3> Répondre au sujet </h3>

<?php if($_SESSION['id']>0){?>
    <form method="post">
    <center><label>Aide l'auteur du post en répondant à sa question ...</label><br />
    <textarea name="reponsesujet" rows="6" cols="60" /> </textarea><br />
    <input type="submit" name="repsub" value="Répondre"></center>
    
    </form>
<?php }else{?> <h2> Vous n'ètes pas connecter vous ne pouvez donc pas répondre au sujet ci-dessus
, connectez-vous </h2>
    <?php }

    $today=date("Y-m-d");
if(isset($_POST['repsub'])){
    $sql='INSERT INTO forumr VALUES ("","'.$_SESSION['login'].'","'.$today.'","'.$_POST['reponsesujet'].'", "'.$a.'","")';
        
        $req=$bdd2->query($sql);
     ?>
           <script>
                function redirection(page)
  {window.location=page;}
setTimeout('redirection("#")');
            </script> 
<?php
}
        ?>



    
    </body>
 <?php include('php/pied_de_page.php'); ?>
    </html>