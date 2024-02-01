<?php
include '../connection.php';

if (isset($_POST["updateId"])) {
    $id = $_POST["updateId"];

    $stmt = $conn->prepare("SELECT * FROM products WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    $product = $result->fetch_assoc();

    $stmt->close();
} else {
    die("Error: Product ID not provided.");
}

if (isset($_POST['update'])) {


    $name = $_POST['name'];
    $price = $_POST['price'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_temp, "../productsimg/$image");
    } else {
        $result = $conn->query("SELECT picture FROM products WHERE ID = $id");
        $row = $result->fetch_assoc();
        $image = $row['picture'];
    }

    $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, picture = ? WHERE ID = ?");
    $stmt->bind_param("sssi", $name, $price, $image, $id);
    $stmt->execute();

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->close();

    echo '<script>alert("Product updated successfully!");</script>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
            background-color:	#00661a;
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
     <h2>Edit Product</h2>
     <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="updateId" value="<?php echo isset($_POST['updateId']) ? $_POST['updateId'] : $product['ID']; ?>">
    <label for="name">Product Name:</label>
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
    <label for="price">Product Price:</label>
    <input type="text" name="price" value="<?php echo $product['price']; ?>" required><br>
    <label for="image">Product Image:</label>
    <input type="file" name="image" accept="image/*">
    <input type="submit" name="update" value="Update Product">
</form>


    <?php
    if (isset($_POST['update'])) {
        echo '<script>alert("Product updated successfully!");</script>';
    }
    ?>
    <button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

