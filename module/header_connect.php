<?php session_start();
include("connectionMySQL.php");
?>
<header>
    <div id="toptittle">
        <img id="logo" src="images/logoDWE.png">
        <img id="echangeD" src="images/echange.png">

        <h1 class="sitetitle"> Deal With Eat </h1>
        <p class="principe"> Venez vendre ou échanger vos fruits et légumes </p>
    </div>

    <div id="connect">
            <p> Bonjour <?php echo $_SESSION['login']; ?> </p>
            <img src="images/grapes1.png" style="width:90px;margin-right:80px;border:2px solid green;">
    </div>
    <div class="search">
        <form action="" class="formulaire">
            <input type="text" id="search" name="search" placeholder="Recherche rapide">
            <input type="submit" id="searchsu" name="OK" value="" /> 
        </form>
    </div> 
</header>