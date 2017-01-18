<?php session_start(); ?>

<!DOCTYPE html>

<html>
    
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>MLGM</title>
    </head>

    <body>
        <?php 
        include 'navbar.php';
        
        $requete = "SELECT DISTINCT";
        ?>   
        <form method="post" action="catalogue.php">
            <input name="initiale" type="text" placeholder="Recherche..." />
            <input type="button" name="bouton_accepter" value="Rechercher" /> <br />
            <input type="radio" name="filtre" value="Par Compositeur" checked /> Par compositeur <br />
            <input type="radio" name="filtre" value="Par Oeuvre" /> Par oeuvre <br />
        </form>
    </body>
</html>


