<?php

session_start();

$config = parse_ini_file("../includes/config.ini");

$_SESSION["connected"] = false;
$_SESSION['admin'] = false;

header("Location: " . $config['root_folder']);

?>