<?php
    include "connect.php";

    $id_delete = $_GET['id'];

    echo $id_delete;

    $sql = "DELETE FROM products WHERE id = '$id_delete'";

    mysqli_query($mysqli, $sql);

    header('location: products.php')
?>