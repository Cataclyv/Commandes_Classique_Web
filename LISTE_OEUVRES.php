<?php

$Titre = $row["Titre_Oeuvre"];
$Compositeur = "<i>inconnu</i>";
if (isset($row["Nom_Musicien"])) {
    $Compositeur = $row["Nom_Musicien"];
}
$Annee = $row[utf8_decode("Année")];
if ($Annee == "0") {
    $Annee = "<i>inconnue</i>";
}
$Opus = $row["Opus"];

echo "\t<tr>\n"
 . "\t\t<td>"
 . "<form name=\"formt\" method=\"post\" action=\"page-oeuvre.php\"> "
 . "<input type=\"hidden\" name=\"nom_oeuvre\" value=\"" . $Titre . "\" />"
 . "<input type=\"submit\" value=\"" . $Titre . "\" />"
 . "</form></td>\n"
 . "\t\t<td>" . $Compositeur . "</td>"
 . "\t\t<td>" . $Annee . "</td>\n"
 . "\t\t<td>" . $Opus . "</td>\n"
 . "\t</tr>\n";
?>