<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = $_POST['customer_name']; 
    $servername = "your_database_server";
    $username = "your_database_username";
    $password = "your_database_password";
    $dbname = "your_database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    foreach ($_SESSION['cartItems'] as $item) {
        $productName = $item['name'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $date = date("Y-m-d"); 

        $sql = "INSERT INTO orders (user_id, date, product_name, quantity, price) 
                VALUES ('$customerName', '$date', '$productName', '$quantity', '$price')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();

    $_SESSION['cartCount'] = 0;
    $_SESSION['cartItems'] = array();

    header('Location: orderConfirmation.php');
    exit();
} else {

    header('Location: addCart.php');
    exit();
}
?>
