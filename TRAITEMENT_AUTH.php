<?php

session_start();

include 'CONNEXION_BASE.php';

$Login = $_POST["Login"];
$Password = $_POST["Password"];

$requete = "SELECT DISTINCT Nom_Abonné"
        . " FROM Abonné"
        . " WHERE Login LIKE '" . $Login . "' and Password LIKE '" . $Password . "';";
$cmd = $pdo->prepare($requete);
$cmd->execute();
$row = $cmd->fetch();
if ($row != FALSE) {
    $_SESSION["USER"] = $row["Nom_Abonné"];
    $pdo = null;
    header("Location : index.php");
} else {
    unset($_SESSION["USER"]);
    $pdo = null;
    header("Location : authentification.php");
    echo $cmd;
}
?>
