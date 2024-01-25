<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteId"])) {
    $deleteId = $_POST["deleteId"];
    
    // Perform the delete operation based on the product ID
    $deleteSql = "DELETE FROM products WHERE id = $deleteId";
    $conn->query($deleteSql);

    // Redirect back to the product list page after deletion
    header("Location: products.php  ");
    exit();
}

$conn->close();
?>
