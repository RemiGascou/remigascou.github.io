<?php

    session_start();

    if(isset($_POST)) {

        $config = parse_ini_file("../includes/config.ini");

        include($config["include_path"] . "includes/connect_database.inc.php");

        $name = $_POST["name"];
        $password = $_POST["password"];

        $query = $db->prepare("SELECT * FROM users WHERE name = :name");
        $query->execute(array(":name" => $name));
        $data = $query->fetchAll()[0];
        $query->closeCursor();

        if($data["name"] == $name & $data["password"] == $password){
            echo("ok");
            $_SESSION['connected'] = true;
        }

        if($data["type"] == "2") {
            $_SESSION['admin'] = true;
        }

    }

    header("Location: " . $config['root_folder']);

?>