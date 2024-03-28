<?php
    $localhost = "localhost";
    $user = "root";
    $password = "";
    $database = "mydatabase";

    $mysqli = new mysqli($localhost, $user, $password, $database);
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
?>