<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve customer information
    $customerName = $_POST['customer_name']; // Change 'customer_name' to the actual field name
    // Add more fields as needed (address, email, etc.)

    // Save order details to the database
    $servername = "your_database_server";
    $username = "your_database_username";
    $password = "your_database_password";
    $dbname = "your_database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Loop through the cart items and insert into the database
    foreach ($_SESSION['cartItems'] as $item) {
        $productName = $item['name'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $date = date("Y-m-d"); // Use the current date

        $sql = "INSERT INTO orders (user_id, date, product_name, quantity, price) 
                VALUES ('$customerName', '$date', '$productName', '$quantity', '$price')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();

    // Clear the cart after the order is submitted
    $_SESSION['cartCount'] = 0;
    $_SESSION['cartItems'] = array();

    // Redirect or display a success message
    header('Location: orderConfirmation.php');
    exit();
} else {
    // Handle unauthorized access or redirect back to the cart page
    header('Location: addCart.php');
    exit();
}
?>
