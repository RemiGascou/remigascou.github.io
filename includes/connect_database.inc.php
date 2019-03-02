<?php
    try {
        $db = new PDO('mysql:host='.$config["path"].';port='.$config["port"].';dbname='.$config["database"], $config["user"], $config["password"]);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $exception) {
        die('Erreur : ' . $exception->getMessage());
    }
    $query = $db->query("SET NAMES UTF8");
    $query->closeCursor();
?>
