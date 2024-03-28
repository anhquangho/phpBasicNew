<?php
    include "connect.php";

    session_start();
    if(!isset($_SESSION['sessionLogin'])) {
        header('location: login.php');
    } else {

    }
?>

<a href="logout.php"><button>LOGOUT</button></a>