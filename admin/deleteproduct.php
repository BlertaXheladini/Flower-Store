<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteId"])) {
    $deleteId = $_POST["deleteId"];

    $deleteSql = "DELETE FROM products WHERE id = $deleteId";
    $conn->query($deleteSql);

    header("Location: products.php  ");
    exit();
}

$conn->close();
?>