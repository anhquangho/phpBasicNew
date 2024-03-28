<?php
    include "connect.php";
    session_start();
    if(!isset($_SESSION['sessionLogin'])) {
        header('location: login.php');
    } 
    $id_get = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id= '$id_get'";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($query);

    //Edit;
    if( isset($_POST['btn'])) {
        $name = $_POST['name'];
        $image = $_FILES['fileupload']['name'] ? $_FILES['fileupload']['name'] : $row['image'];
        $image_tmp_name = $_FILES['fileupload']['tmp_name']; 
        $price = $_POST['price'];
        $warranty = $_POST['warranty'];
        $update = "UPDATE products SET name='$name', image = '$image', price = $price, warranty = '$warranty' WHERE id='$id_get'";
    
        mysqli_query($mysqli, $update);
        move_uploaded_file($image_tmp_name, 'img/' . $image);
        header('location: products.php');
    }

?>

<div class="container">
    <h1>Come on , Edit us!</h1>
    <h2><?php echo $row['name']; ?></h2>
  
    <form action="" id="join-us" method="post" enctype="multipart/form-data">
        <div class="fields">
            <span>
                <input placeholder="Name" type="text" name="name" value="<?php echo $row['name']; ?>"/>
            </span>
            <br />
            <span>
                <input placeholder="Image" type="file" name="fileupload" value="<?php echo $row["image"] ?>"/>
                <div><img src="img/<?php echo $row["image"] ?>" alt="<?php echo $row["name"] ?>" alt="" style="width: 150px; height: auto;"></div>
            </span>
            <br />
            <span>
                <input placeholder="Price" type="text" name="price" value="<?php echo $row['price']; ?>"/>
            </span>
            <br />
            <span>
                <input placeholder="Warranty" type="text" name="warranty" value="<?php echo $row['warranty']; ?>"/>
            </span>
        </div>
        <div>
            <button class="submit" name="btn">EDIT</button>
        </div>
    </form>
</div>

<style>
    /*fonts*/
    @import url(https://fonts.googleapis.com/css?family=PT+Sans:400,400italic);

    @import url(https://fonts.googleapis.com/css?family=Droid+Serif);

    html, body{
    background:#2F1E27;
    }

    body{
    counter-reset:section;
    text-align:center;
    }

    .container{
    position:relative;
    top:100px;
    }

    .container h1, .container span{
    font-family:"Pt Sans", helvetica, sans-serif;
    }

    .container h1{
    text-align:center;
    color:#fff;
    font-weight:100;
    font-size:2em; 
    margin-bottom:10px;
    }

    .container h2{
    font-family:"droid serif";
    font-style:italic;
    color:#d3b6ca; 
    text-align:center;
    font-size:1.2em;
    }

    .container form span:before {
    counter-increment:section;
    content:counter(section);
    border:2px solid #4c2639;
    width:40px;
    height:40px;
    color:#fff;
    display:inline-block;
    border-radius:50%;
    line-height:1.6em;
    font-size:1.5em;
    position:relative;
    left:-22px;
    top:-11px;
    background:#2F1E27;
    }

    form{
    margin-top:25px;
    display:inline-block;
    }

    .fields{
    border-left:2px solid #4c2639
    }

    .container span{
        margin-bottom:22px; 
        display:inline-block;
    }

    .container span:last-child{
    margin-bottom:-11px;
    }

    input{
    border:none;
    outline:none;
    display:inline-block;
    height:34px;
    vertical-align:middle;
    position:relative;
    bottom:14px;
    right:9px;
    border-radius:22px;
    width:220px;
    box-sizing:border-box;
    padding:0 18px; 
    }

    .submit{ 
    background:rgba(197,62,126,.33) ! important;
    color:#fff;
    position:relative;
    left:9px;
    top:25px; 
    width:100px;
    cursor:pointer;
    outline:none;
    border:none;
    border-radius:22px;
    padding:0 18px; 
    height:34px;
    }
</style>
