<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        .product {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ff4444;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 3px;
        }
        .update-btn {
            position: absolute;
            top: 40px;
            right: 10px;
            background-color:#4da6ff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <h2>Product List</h2>
<h1><a href="insert.php"> Shtoni</a></h1>
    <?php
    include '../connection.php';
    
    session_start();

    if (empty($_SESSION['username'])) {
          header("Location: signin.php");
}


   
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<h3>{$row['name']}</h3>";
            echo "<p>Price: \${$row['price']}</p>";
            echo "<img src='../pictures/{$row['picture']}' alt='{$row['name']}'>";
    
            // Delete Form
            echo "<form method='post' action='deleteproduct.php' style='display: inline;'>";
            echo "<input type='hidden' name='deleteId' value='{$row['ID']}'>";
            echo "<button type='submit' class='delete-btn'>Delete</button>";
            echo "</form>";
    
            // Update Form
   
echo "<form method='get' action='update.php' style='display: inline;'>";
echo "<input type='hidden' name='updateId' value='{$row['ID']}'>";
echo "<button type='submit' class='update-btn'>Update</button>";
echo "</form>";

    
            echo "</div>";
        }

    
    } else {
        echo "<p>No products available.</p>";
    }

    $conn->close();
    ?>
</body>

</html>
