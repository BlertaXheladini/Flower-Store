<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newQuantity = $_POST['quantity'];
    header('Location: addCart.php');
    exit();
} else {
    header('Location: addCart.php');
    exit();
}
?>
