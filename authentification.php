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
        ?>   
        <form method="post" action="TRAITEMENT_AUTH.php">
            <p>Login : <input name="Login" type="text" placeholder="Leeroy" /></p>
            <p>Password : <input name="Password" type="password" placeholder="Jenkins" /></p>
            <input name="Connexion" type="submit" value="Se connecter" />
        </form>
    </body>
</html>


