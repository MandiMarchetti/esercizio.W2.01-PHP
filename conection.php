<?php

$user = 'root';
$password = '';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->error) {
    die("Error detected trying to connect to the Database" . $mysqli->error);
}
