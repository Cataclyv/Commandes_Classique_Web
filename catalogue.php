<?php 
session_start();
if(!isset($_SESSION["USER"])) {
    header("Location : erreur.php");
}
?>

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
            <input type="submit" name="bouton_accepter" value="Rechercher" /> <br />
            <input type="radio" name="filtre" value="compositeurs" checked /> Par compositeur <br />
            <input type="radio" name="filtre" value="oeuvres" /> Par oeuvre <br />
        </form>
        
        <?php
        
        $message = "<p>Commencez à chercher grâce à la barre de recherche !</p>\n";
        
        if(isset($_POST["initiale"])) {
            if(trim($_POST["initiale"]) != "") {
                $message = "<p>Résultats de la recherche" 
                        . " \"" . $_POST["initiale"] . "\""
                        . " (" . $_POST["filtre"] . ") :</p>\n";
                echo $message;
                
                include 'RECHERCHE.php';
            }
            else {
                echo $message;
            }
        }
        else {
            echo $message;
        }
        
        ?>
    </body>
</html>


