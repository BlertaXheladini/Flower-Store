<?php
include '../connection.php';
include 'query.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];


    $userNameQuery = "SELECT username FROM users WHERE id = $id";
    $userNameResult = $conn->query($userNameQuery);
    $userName = ($userNameResult->num_rows > 0) ? $userNameResult->fetch_assoc()['username'] : 'Unknown User';

    $stmt = $conn->prepare("SELECT * FROM users WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    $user = $result->fetch_assoc();
     
    logAdminAction('edit', $userName);

    $stmt->close();
} else {
    die("Error: User ID not provided.");
}

if (isset($_POST['update'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE ID = ?");
    $stmt->bind_param("sssi", $username, $email, $role, $id);
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #223222;
            color: #987d67;
        }

        h2 {
            color: #987d67;
        }

        form {
            margin: 20px 0;
            padding: 20px;
            background-color: #cdbcac;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-bottom: 40px;
        }

        input[type="submit"] {
            background-color: #223222;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #00661a;
        }

        button {
            background-color: #223222;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 10px;
            margin-right: 10px;
        }

        button:hover {
            background-color: #cdbcac;
        }
    </style>
</head>

<body>
    <h2>Edit User</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="updateId" value="<?php echo isset($_POST['updateId']) ? $_POST['updateId'] : $user['ID']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <label for="role">Role:</label>
        <input type="text" name="role" value="<?php echo $user['role']; ?>" required><br>
        <input type="submit" name="update" value="Update User">
    </form>

    <?php
    if (isset($_POST['update'])) {
        echo '<script>alert("User updated successfully!");</script>';
    }
    ?>
    <button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>