<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'login';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->error) {
    echo "Connect failed!!!";
    die("Connect failed: " . $mysqli->error);
    exit();
}
