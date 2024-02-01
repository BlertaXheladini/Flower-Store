<?php
include '../connection.php';
include 'query.php';

if (isset($_POST["submit1"]) && isset($_POST["deleteId"])) {
    $deleteId = $_POST["deleteId"];

    $productNameQuery = "SELECT name FROM products WHERE id = $deleteId";
    $productNameResult = $conn->query($productNameQuery);
    $productName = ($productNameResult->num_rows > 0) ? $productNameResult->fetch_assoc()['name'] : 'Unknown Product';

    try {
        // Start a transaction
        $conn->begin_transaction();

        // Delete the product
        $deleteSql = "DELETE FROM products WHERE id = $deleteId";
        $conn->query($deleteSql);
//!this one
        // Log the admin action after successful deletion
        logAdminAction('delete', $productName);

        // Commit the transaction
        $conn->commit();

        header("Location: products.php");
        exit();
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();

        echo "Error: " . $e->getMessage();
    }

    $conn->close();
}
?>
