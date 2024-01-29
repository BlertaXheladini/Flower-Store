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
} else {
    die("Error: User ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your head content -->
</head>

<body>
    <div>
        <a href="users.php"><button>Go Back to Users</button></a>
    </div>
</body>

</html>
