<?php
include '../connection.php';
include 'query.php';

if (isset($_POST["submit1"]) && isset($_POST["deleteId"])) {
    $deleteId = $_POST["deleteId"];

    $productNameQuery = "SELECT name FROM products WHERE id = $deleteId";
    $productNameResult = $conn->query($productNameQuery);
    $productName = ($productNameResult->num_rows > 0) ? $productNameResult->fetch_assoc()['name'] : 'Unknown Product';

    try {
   
        $conn->begin_transaction();

        $deleteSql = "DELETE FROM products WHERE id = $deleteId";
        $conn->query($deleteSql);
      
        logAdminAction('delete', $productName);

        $conn->commit();

        header("Location: products.php");
        exit();
    } catch (Exception $e) {
        $conn->rollback();

        echo "Error: " . $e->getMessage();
    }

    $conn->close();
}
?>
