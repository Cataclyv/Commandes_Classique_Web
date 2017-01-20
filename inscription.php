<!DOCTYPE html>

<?php
    session_start();
    session_unset();
?>

<html>
    
    <head>
        <meta charset="utf-8">
        <title>MLGM</title>
    </head>
    
    <body>
        <?php include 'navbar.php' ?>

        <form method="post" action="CREATION_COMPTE.php">
            <p>Login* : <input name="Login" type="text" placeholder="John" /></p>
            <p>Password* : <input name="Password" type="password" placeholder="Shepard" /></p>
            <p>Prénom : <input name="Prénom" type="text" placeholder="Jean" /></p>
            <p>Nom : <input name="Nom" type="text" placeholder="Déduis" /></p>
            <input name="Inscription" type="submit" value="S'inscrire" />
        </form>
        <p>(*) champs obligatoires</p>
    </body>
    
</html>