<?php 
  session_start();
  if(!isset($_SESSION['sessionLogin'])) {
      header('location: login.php');
  }

    include "connect.php";
    $sql = "SELECT * FROM products";
    $result = mysqli_query($mysqli, $sql);

    if(isset($_POST['btnSearch'])) {
        $content = $_POST['search'];
        $seachSql = "SELECT * FROM products WHERE name LIKE '%$content%'";
        $result = mysqli_query($mysqli, $seachSql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Page</title>
</head>
<body>

<div class="container">
    <a href="logout.php"><button>LOGOUT</button></a>

    <div class="table-wrapper">
        <a href="productAdd.php"><h2>ADD Champion</h2></a>
        <div>
            <form method="post">
                <input type="text" name="search">
                <button type="submit" name="btnSearch">SEARCH</button>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Warranty</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><img src="img/<?php echo $row["image"] ?>" alt="<?php echo $row["name"] ?>"></td>
                        <td><?php echo $row["price"] ?></td>
                        <td><?php echo $row["warranty"] ?></td>
                        <td>
                            <span><a href="editProduct.php?id=<?php echo $row["id"] ?>">| EDIT|</a></span>
                        </td>
                        <td>
                            <span><a href="deleteProduct.php?id=<?php echo $row["id"] ?>">| X |</a></span>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

    <style>
        url("https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap");

        :root {
        --white: #fff;
        --darkblue: #1b4965;
        --lightblue: #edf2f4;
        }

        * {
        padding: 0;
        margin: 0;
        }

        body {
        margin: 50px 0 150px;
        font-family: "Noto Sans", sans-serif;
        }

        .container {
        max-width: 1000px;
        padding: 0 15px;
        margin: 0 auto;
        }

        h1 {
        font-size: 1.5em;
        }

        /* TABLE STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .table-wrapper {
        overflow-x: auto;
        }

        .table-wrapper::-webkit-scrollbar {
        height: 8px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
        background: var(--darkblue);
        border-radius: 40px;
        }

        .table-wrapper::::-webkit-scrollbar-track {
        background: var(--white);
        border-radius: 40px;
        }

        .table-wrapper table {
        margin: 50px 0 20px;
        border-collapse: collapse;
        text-align: center;
        }

        .table-wrapper table th,
        .table-wrapper table td {
        padding: 10px;
        min-width: 75px;
        }

        .table-wrapper table th {
        color: var(--white);
        background: var(--darkblue);
        }

        .table-wrapper table td {
            height: 100%;
            border: 1px solid #000;
        }

        .table-wrapper table td img{
            width: 100px;
            height: auto;
            border: 1px solid #000;
        }

        .table-wrapper table tbody tr:nth-of-type(even) > * {
        background: var(--lightblue);
        }

        .table-wrapper table td:first-child {
        /* display: grid; */
        grid-template-columns: 25px 1fr;
        grid-gap: 10px;
        text-align: left;
        }

        .table-credits {
        font-size: 12px;
        margin-top: 10px;
        }

        /* FOOTER STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .page-footer {
        position: fixed;
        right: 0;
        bottom: 50px;
        display: flex;
        align-items: center;
        padding: 5px;
        z-index: 1;
        background: var(--white);
        }

        .page-footer a {
        display: flex;
        margin-left: 4px;
        }
    </style>
</body>
</html>