<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>

<body>
    <h2>Update Product</h2>

    <?php
    include '../connection.php';

    // Fetch the product details based on the ID passed through the URL
    if (isset($_GET['updateId'])) {
        $updateId = $_GET['updateId'];
        $sql = "SELECT * FROM products WHERE id = $updateId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>

<form method="post" action="update.php?updateId=<?php echo $row['id']; ?>">
    <!-- Input fields for updating product details -->
    <label for="updatedName">Name:</label>
    <input type="text" name="updatedName" value="<?php echo $row['name']; ?>" required><br>
    <label for="updatedPrice">Price:</label>
    <input type="text" name="updatedPrice" value="<?php echo $row['price']; ?>" required><br>
    <!-- Input field for updating the picture -->
    <label for="updatedPicture">Picture URL:</label>
    <input type="text" name="updatedPicture" value="<?php echo $row['picture']; ?>" required><br>
    <!-- Submit button to update the product -->
    <button type="submit" name="update">Update Product</button>
</form>


    <?php
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Invalid request. Please provide an update ID.";
    }

    $conn->close();
    ?>
</body>

</html>
