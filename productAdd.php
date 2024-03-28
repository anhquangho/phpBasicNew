<?php

    include "connect.php";

    session_start();
    if(!isset($_SESSION['sessionLogin'])) {
        header('location: login.php');
    }
    if(isset($_POST['btn'])) {
        $name = $_POST['name'];
        $image = $_FILES['fileupload']['name'];
        $image_tmp_name = $_FILES['fileupload']['tmp_name']; 
        $price = $_POST['price'];
        $warranty = $_POST['warranty'];
        $sql = "INSERT INTO products (id, name, image, price, warranty)
        VALUES ('', '$name', '$image', $price, '$warranty')";
        mysqli_query($mysqli, $sql);
        move_uploaded_file($image_tmp_name, 'img/' . $image);
        header('location: products.php');
    }

?>


<div class="container">
    <a href="logout.php"><button>LOGOUT</button></a>

    <a href="products.php"><h2><[XXXX]</h2></a>

    <form action="productAdd.php" method="post" class="form" id="form1" enctype="multipart/form-data">
        <h2 class="form__title">NEW IMAGE</h2>
        <input type="text" placeholder="Name" name="name" class="input" />
        <input type="file" placeholder="Image" name="fileupload" class="input" />
        <input type="text" placeholder="Price" name="price" class="input" />
        <input type="text" placeholder="Warranty" name="warranty" class="input" />
        <button class="btn" name="btn">Send</button>
    </form>
</div>


<style>
    .container {
        background-color: #008997;
    }
    .form {
        background-color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 3rem;
        height: 100%;
        text-align: center;
    }
    .input {
        background-color: #fff;
        border: none;
        padding: 0.9rem 0.9rem;
        margin: 0.5rem 0;
        width: 100%;
    }
    .btn {
        background-color: var(--blue);
        background-image: linear-gradient(90deg, var(--blue) 0%, var(--lightblue) 74%);
        border-radius: 20px;
        border: 1px solid var(--blue);
        color: var(--white);
        cursor: pointer;
        font-size: 0.8rem;
        font-weight: bold;
        letter-spacing: 0.1rem;
        padding: 0.9rem 4rem;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }
</style>