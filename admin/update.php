
<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateId"])) {
    $updateId = $_POST["updateId"];

    // Fetch the product details based on the ID
    $sql = "SELECT * FROM products WHERE ID = $updateId";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Display the update form with the existing data
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Product</title>
        </head>

        <body>
            <h2>Update Product</h2>

            <form method="post" action="update.php">
                <!-- Hidden input to send the updateId to the server -->
                <input type="hidden" name="updateId" value="<?php echo $row['ID']; ?>">

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
        </body>

        </html>
<?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid request. Please provide an update ID.";
}

$conn->close();
?>
