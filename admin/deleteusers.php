<?php
include '../connection.php';
include 'query.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $userNameQuery = "SELECT username FROM users WHERE id = $id";
    $userNameResult = $conn->query($userNameQuery);
    $userName = ($userNameResult->num_rows > 0) ? $userNameResult->fetch_assoc()['username'] : 'Unknown User';

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    logAdminAction('delete', $userName );

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