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
        if(isset($_SESSION["USER"]))
        {
            echo "<p>Bonjour, " . $_SESSION["USER"] . "</p>";
            echo '<p><a href="catalogue.php">ACHETER</a></p>';
        }
        else
        {
            echo "Vous n'êtes pas connecté(e). Veuillez vous connecter pour pouvoir poursuivre votre visite.";
        }
        ?>   
        
        
    </body>
</html>


