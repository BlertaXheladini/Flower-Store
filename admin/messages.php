<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #223222;
            color: #fff;
        }

        h2 {
            color: #cdbcac;
            margin-bottom: 20px;
        }

        .message-container {
            border: 1px solid #cdbcac;
            border-radius: 5px;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }

        .message {
            margin-bottom: 15px;
            color: #333;
        }

        .message p {
            margin: 5px 0;
        }

        .message strong {
            font-weight: bold;
            color: #cdbcac;
        }

        .message:last-child {
            margin-bottom: 0;
        }

        .dashboard-link {
            display: inline-block;
            background-color: #cdbcac;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .dashboard-link:hover {
            background-color: #987d67;
        }
    </style>
</head>
<body>
    <h2>Contact Messages</h2>

    <?php
    include '../connection.php';

    class ContactManager {
        private $conn;

        public function __construct($connection) {
            $this->conn = $connection;
        }

        public function getMessages() {
            $sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
            $result = $this->conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $messages = $result->fetch_all(MYSQLI_ASSOC);
                return $messages;
            } else {
                return [];
            }
        }

        public function displayMessages($messages) {
            if (!empty($messages)) {
                foreach ($messages as $message) {
                    $this->displayMessage($message);
                }
            } else {
                echo "<p>No messages available.</p>";
            }
        }

        private function displayMessage($message) {
            echo '<div class="message-container">';
            echo '<div class="message">';
            echo "<p><strong>Name:</strong> {$message['name']}</p>";
            echo "<p><strong>Email:</strong> {$message['email']}</p>";
            echo "<p><strong>Message:</strong> {$message['message']}</p>";
            echo "<p><strong>Submitted At:</strong> {$message['created_at']}</p>";
            echo '</div>';
            echo '</div>';
        }
    }

    $contactManager = new ContactManager($conn);
    $messages = $contactManager->getMessages();
    ?>

    <?php
    $contactManager->displayMessages($messages);
    ?>

    <a href="dashboard.php" class="dashboard-link">Go Back to Dashboard</a>
</body>
</html>
