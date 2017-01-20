<?php

session_start();

include 'CONNEXION_BASE.php';

$Login = $_POST["Login"];
$Password = $_POST["Password"];

$requete = "SELECT DISTINCT Login, Password, Nom_Abonné, Prénom_Abonné"
        . " FROM Abonné"
        . " WHERE Login LIKE '" . $Login . "' and Password LIKE '" . $Password . "';";
$cmd = $pdo->prepare($requete);
$cmd->execute();

$url = "Location : authentification.php";

while ($row = $cmd->fetch()) {
    if ($row["Login"] == $Login && $row["Password"] == $Password) {
        $_SESSION["USER"] = trim($row["Login"]
                . " [" . $row["Prénom_Abonné"] . " " . $row["Nom_Abonné"] . "]");
        $url = "Location : index.php";
    } 
}

$pdo=null;
header($url);

?>
