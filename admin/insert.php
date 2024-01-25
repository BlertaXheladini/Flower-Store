<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];

    // Handle image upload
    $image = $_FILES['image']['name'];
    $target_dir = "../pictures/"; // You should create this folder in your project
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert data into the database
    $sql = "INSERT INTO products (name, price, picture) VALUES ('$name', '$price', '$image')";
    $conn->query($sql);

   
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <h2>Add New Product</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required><br>

        <label for="price">Product Price:</label>
        <input type="number" name="price" step="0.01" required><br>

        <label for="image">Product Image:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" name="submit" value="Add Product">
    </form>
</body>

</html>
