<?php 

    session_start();

    if(isset($_SESSION['sessionLogin'])) {
        unset($_SESSION['sessionLogin']);
    }

    header('location: login.php'); 

?>