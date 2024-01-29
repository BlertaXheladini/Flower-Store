<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];

    // Handle image upload
    $image = $_FILES['image']['name'];
    $target_dir = "../productsimg/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO products (name, price, picture) VALUES ('$name', '$price', '$image')";
    $conn->query($sql);

    echo '<script>alert("Product added successfully!");</script>';
} 

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #223222;
            color: #987d67;
        }

        h2 {
            color: #987d67;
        }

        form {
            margin: 20px 0;
            padding: 20px;
            background-color: #cdbcac;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-bottom: 40px;
        }

        input[type="submit"] {
            background-color: #223222;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color:#cdbcac;
        }
    button {
        background-color: #223222;
        color: #fff;
        cursor: pointer;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        margin-top: 10px;
        margin-right: 10px;
    }

    button:hover {
        background-color: #cdbcac;
    }


    </style>
</head>

<body>
    <h2>Add New Product</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required>

        <label for="price">Product Price:</label>
        <input type="number" name="price" step="0.01" required>

        <label for="image">Product Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <input type="submit" name="submit" value="Add Product">
    </form>

<div>
    <a href="dashboard.php"><button>Go Back to Dashboard</button></a>
    <a href="products.php"><button>Go Back to Products</button></a>
</div>

</body>

</html>
