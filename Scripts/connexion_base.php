<?php
    $driver = 'sqlsrv';
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique_Web';
    $user = 'ETD';
    $password = 'ETD';
    
    $pdodsn = "$driver:Server=$host;Database=$nomDb";
    
    $pdo = new PDO($pdodsn, $user, $password);
?>
