<nav>
    <p>
        <a href="index.php">
            MLG Mozart
        </a>
    </p>
    <?php
    if (isset($_SESSION["USER"])) {
        echo "<p>Bonjour, " . $_SESSION["USER"] . "</p>";
        echo '<p><a href="DECONNEXION.php">Se déconnecter</a></p>';
    } else {
        echo '<p><a href="authentification.php">Se connecter</a></p>';
        echo '<p><a href="inscription.php">Créer un compte</a></p>';
    }
    ?>
    <p><a href="a_propos.php">À propos</a></p>
</nav>
