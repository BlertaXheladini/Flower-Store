<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #223222;
            color: #fff;
        }

        h2 {
            color: #cdbcac;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #333;
        }

        th, td {
            padding: 10px;
            border: 1px solid #cdbcac;
            text-align: left;
        }

        th {
            background-color: #223222;
            color: #fff;
        }

        tr {
            background-color: #cdbcac;
        }

        tr:hover {
            background-color:  #987d67;
        }

        a {
            text-decoration: none;
            color: #4da6ff;
        }

        a:hover {
            color: #ff4444;
        }

        button {
            background-color: #cdbcac;
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
            background-color: #987d67;
        }

        .action-buttons {
            display: flex;
        }

        .action-buttons a {
            margin-right: 10px;
        }

    </style>
</head>

<body>
    <h2>User Management</h2>

    <?php
    include '../connection.php';

    session_start();

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Action</th></tr>';

        while ($row = $result->fetch_assoc()) {
            $userId = isset($row['ID']) ? $row['ID'] : 'N/A';
            $username = isset($row['username']) ? $row['username'] : 'N/A';
            $email = isset($row['email']) ? $row['email'] : 'N/A';
            $role = isset($row['role']) ? $row['role'] : 'N/A';

            echo "<tr>";
            echo "<td>{$userId}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$email}</td>";
            echo "<td>{$role}</td>";
            echo "<td class='action-buttons'><a href='editusers.php?id={$userId}'>Edit</a><a href='deleteusers.php?id={$userId}'>Delete</a></td>";
            echo "</tr>";
        }

        echo '</table>';
    } else {
        echo "<p>No users available.</p>";
    }

    $conn->close();
    ?>

    <div>
        <a href="dashboard.php"><button>Go Back to Dashboard</button></a>
    </div>
</body>

</html>