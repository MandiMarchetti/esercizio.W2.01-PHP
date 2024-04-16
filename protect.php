<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die("You are not allowed to access this page! Do your login clicking <p> <a href=\"index.php\"> here!</a></p> Or register yourself clicking <p> <a href=\"register.php\"> here!");
}
