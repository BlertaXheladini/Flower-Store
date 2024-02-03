<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Delete the specified product from the cart
    $productName = $_POST['product_name'];

    // Implement logic to delete the product from the cart
    // ...

    // Redirect back to the cart page
    header('Location: addCart.php');
    exit();
} else {
    // Handle unauthorized access or redirect back to the cart page
    header('Location: addCart.php');
    exit();
}
?>
