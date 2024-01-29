<?php
session_start();
if (!isset($_SESSION["user"])) {
    // Redirect to the login page only if not already on the login page
    if (!strpos($_SERVER['REQUEST_URI'], 'login')) {
        header("Location: login");
        exit(); // Make sure to exit after a header redirection
    }
}

require_once '../app/init.php';

$app = new App;