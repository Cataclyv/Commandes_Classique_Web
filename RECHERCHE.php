<?php
include 'CONNEXION_BASE.php';

if (isset($_POST["initiale"])) {
    $initiale = $_POST["initiale"];
    $filtre = $_POST["filtre"];

    if ($filtre == "compositeurs") {
        $requete = "SELECT DISTINCT Nom_Musicien, Prénom_Musicien, Année_Naissance, Année_Mort, Photo, Musicien.Code_Musicien"
                . " FROM Musicien JOIN Composer ON Musicien.Code_Musicien=Composer.Code_Musicien"
                . " WHERE Nom_Musicien LIKE :initiale ORDER BY Nom_Musicien, Prénom_Musicien";
    } else {
        $requete = "SELECT DISTINCT Titre_Oeuvre, Nom_Musicien, Année, Opus"
                . " FROM Oeuvre JOIN Composer ON Oeuvre.Code_Oeuvre=Composer.Code_Oeuvre"
                . " JOIN Musicien ON Composer.Code_Musicien=Musicien.Code_Musicien"
                . " WHERE Titre_Oeuvre LIKE :initiale ORDER BY Titre_Oeuvre";
    }
    $cmd = $pdo->prepare($requete);
    $cmd->execute(array('initiale' => $initiale . "%"));
    ?>

    <table border="1" style="border-collapse:collapse;text-align:center;">

        <?php
        if ($filtre == "compositeurs") {
            echo "<tr>"
            . "\t<th>Portrait</th>\n"
            . "\t<th>Nom</th>\n"
            . "\t<th>Année de naissance</th>\n"
            . "\t<th>Année de mort</th>\n"
            . "</tr>\n";
        } else {
            echo "<tr>"
            . "\t<th>Titre</th>\n"
            . "\t<th>Compositeur</th>\n"
            . "\t<th>Année</th>\n"
            . "\t<th>Opus</th>\n"
            . "</tr>\n";
        }

        while ($row = $cmd->fetch()) {
            if ($filtre == "compositeurs") {
                echo "\t<tr>"
                . "\t\t<td><img src=\"IMAGE.php?Code=" . $row['Code_Musicien'] . "\" /></td>"
                . "\t\t<td><form method=\"post\" action=\"page-compositeur.php\"> "
                . "<input type=\"hidden\" name=\"nom_compositeur\" value=\"" . $row["Nom_Musicien"] . "\" />"
                . "<input type=\"hidden\" name=\"prenom_compositeur\" value=\"" . $row[utf8_decode('Prénom_Musicien')] . "\" />"
                . "<input type=\"submit\" value=\"" . $row["Nom_Musicien"]
                . " " . $row[utf8_decode('Prénom_Musicien')] . "\" /> </form></td>\n"
                . "\t\t<td>" . $row[utf8_decode("Année_Naissance")] . "</td>"
                . "\t\t<td>" . $row[utf8_decode("Année_Mort")] . "</td>"
                . "\t</tr>\n";
            } else {
                include 'LISTE_OEUVRES.php';
            }
        }
    }

    $pdo = null;
    ?>
</table>
