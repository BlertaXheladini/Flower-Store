<?php
include '../connection.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->close();

    echo '<script>alert("User deleted successfully!");</script>';
    echo '<script>window.open("users.php");</script>';
} else {
    die("Error: User ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete users</title>
</head>

<body>
  
</body>

</html>