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
        include 'CONNEXION_BASE.php';

        $Oeuvre = $_POST["nom_oeuvre"];

        echo "<p>Albums contenant \"" . $Oeuvre . "\" :</p>\n";
        ?>

        <table border="1" style="border-collapse:collapse;text-align:center;">
            <tr>
                <th>Acheter</th>
                <th>Titre</th>
                <th>Année</th>
                <th>Genre</th>
                <th>Editeur</th>
            </tr>

            <?php
            $requete = "SELECT DISTINCT Titre_Album, Année_Album, Libellé_Abrégé, Nom_Editeur"
                    . " FROM Album JOIN Genre ON Album.Code_Genre=Genre.Code_Genre"
                    . " JOIN Editeur ON Album.Code_Editeur=Editeur.Code_Editeur"
                    . " ORDER BY Titre_Album";
            $cmd = $pdo->prepare($requete);
            $cmd->execute(array('oeuvre' => $Oeuvre));
            while ($row = $cmd->fetch()) {
                $Album = $row["Titre_Album"];
                $Annee = $row[utf8_decode("Année_Album")];
                $Genre = $row[utf8_decode("Libellé_Abrégé")];
                $Editeur = $row["Nom_Editeur"];
                echo "\t<tr>\n"
                . "\t\t<td>"
                . "<form method=\"post\" action=\"page-oeuvre.php\"> "
                . "<input type=\"hidden\" name=\"nom_oeuvre\" value=\"" . $Album . "\" />"
                . "<input type=\"submit\" value=\"Ajouter au panier\" />"
                . "</form></td>\n"
                . "\t\t<td>" . $Album . "</td>"
                . "\t\t<td>" . $Annee . "</td>"
                . "\t\t<td>" . $Genre . "</td>\n"
                . "\t\t<td>" . $Editeur . "</td>\n"
                . "\t</tr>\n";
            }
            /*
            $rs = $pdo->query('SELECT * FROM Album');
            for ($i = 0; $i < $rs->columnCount(); $i++) {
                $col = $rs->getColumnMeta($i);
                $columns[] = $col['name'] . ">>>" . $col['native_type'];
            }
            print_r($columns);
            $rs = $pdo->query('SELECT * FROM Genre');
            for ($i = 0; $i < $rs->columnCount(); $i++) {
                $col = $rs->getColumnMeta($i);
                $columns[] = $col['name'] . ">>>" . $col['native_type'];
            }
            print_r($columns);
            $rs = $pdo->query('SELECT * FROM Editeur');
            for ($i = 0; $i < $rs->columnCount(); $i++) {
                $col = $rs->getColumnMeta($i);
                $columns[] = $col['name'] . ">>>" . $col['native_type'];
            }
            print_r($columns);
*/
            $pdo = null;
            ?>  

    </body>
</html>


