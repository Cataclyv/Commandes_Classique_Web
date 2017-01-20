<?php

include 'CONNEXION_BASE.php';

$Login = trim($_POST['Login']);
$Password = trim($_POST['Password']);
$Nom = trim($_POST['Nom']);
$Prenom = trim($_POST['Prénom']);

$requete = "INSERT INTO Abonné(Nom_Abonné, Prénom_Abonné, Login, Password)"
        . " VALUES(:nom, :prenom, :login, :password);";
$cmd = $pdo->prepare($requete);

if ($Login != NULL && $Password == NULL) {
    if ($Nom == NULL) {
        $Nom = "";
    }
    if ($Prenom == NULL) {
        $Prenom = "";
    }

    $cmd->execute(array('nom' => $Nom,
        'prenom' => $Prenom,
        'login' => $Login,
        'password' => $Password));
}

$requete = "SELECT Login, Password, Prénom_Abonné, Nom_Abonné"
        . " FROM Abonné"
        . " WHERE Login LIKE :loginattendu AND Password LIKE :passwordattendu;";

$cmd = $pdo->prepare($requete);
$cmd->execute(array('loginattendu' => $Login,
    'passwordattendu' => $Password));

$url = "Location : inscription.php";

while($row = $cmd->fetch()) {
    if($row["Login"] == $Login && $row["Password"] == $Password) {
        $_SESSION["USER"] = trim($row["Login"]
                . " [" . $row["Prénom_Abonné"] . " " . $row["Nom_Abonné"] . "]");
        $url = "Location : index.php";
    }
}

$pdo = null;
header("Location : inscription.php");

?>
