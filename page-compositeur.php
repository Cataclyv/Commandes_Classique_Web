<?php
session_start();
if (!isset($_SESSION["USER"])) {
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

        $Nom = $_POST["nom_compositeur"];
        $Prenom = "";
        if (isset($_POST["prenom_compositeur"])) {
            $Prenom = $_POST["prenom_compositeur"];
        }

        echo "<p>Oeuvres de \"" . $Nom . " "
        . $Prenom . "\" :</p>\n";
        ?>
        <table border="1" style="border-collapse:collapse;text-align:center;">
            <tr>
                <th>Titre</th>
                <th>Compositeur</th>
                <th>Année</th>
                <th>Opus</th>
            </tr>

            <?php
            include 'CONNEXION_BASE.php';

            $requete = "SELECT DISTINCT Titre_Oeuvre, Nom_Musicien, Année, Opus"
                    . " FROM Oeuvre JOIN Composer ON Oeuvre.Code_Oeuvre=Composer.Code_Oeuvre"
                    . " JOIN Musicien ON Composer.Code_Musicien=Musicien.Code_Musicien"
                    . " WHERE Nom_Musicien LIKE :nom AND Prénom_Musicien LIKE :prenom"
                    . " ORDER BY Titre_Oeuvre";
            $cmd = $pdo->prepare($requete);
            $cmd->execute(array('nom' => $Nom, 'prenom' => $Prenom));
            while ($row = $cmd->fetch()) {
                include 'LISTE_OEUVRES.php';
            }

            $pdo = null;
            ?>
        </table>
    </body>
</html>


