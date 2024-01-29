<?php
include '../connection.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stmt->close();
    } else {
        die("Error: User not found.");
    }
} else {
    die("Error: User ID not provided.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];

    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $username, $email, $id);
    $stmt->execute();

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->close();

    echo '<script>alert("User updated successfully!");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your head content -->
</head>

<body>
    <h2>Edit User</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

        <input type="submit" name="update" value="Update User">
    </form>

    <div>
        <a href="users.php"><button>Go Back to Users</button></a>
    </div>
</body>

</html>
