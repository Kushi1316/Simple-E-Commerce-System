<?php
if (!defined('ALLOWED_ACCESS')) {
    die('Direct access not permitted');
}

$host = $database_settings["host"];
$port = $database_settings["port"];
$database = $database_settings["database"];
$username = $database_settings["username"];
$password = $database_settings["password"];
$dsn = "mysql:host=$host;port=$port;dbname=$database";

$database_object = new PDO($dsn, $username, $password);

