<nav>
    <p>
        <a href="index.php">
            Menu
        </a>
    </p>
    <?php
    if (isset($_SESSION["USER"])) {
        echo '<p><a href="DECONNEXION.php">Se déconnecter</a></p>';
    } else {
        echo '<p><a href="authentification.php">Se connecter</a></p>';
    }
    ?>
</nav>
