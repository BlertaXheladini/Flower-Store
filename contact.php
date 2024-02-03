<?php
session_start();
include("connection.php");

class Messages {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function contactUs($name, $number, $email, $message) {
        $name = $this->sanitizeInput($name);
        $number = $this->sanitizeInput($number);
        $email = $this->sanitizeInput($email);
        $message = $this->sanitizeInput($message);

        $sql = "INSERT INTO messages (name, number, email, message) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            die("Error: " . $this->conn->error);
        }

        $stmt->bind_param("siss", $name, $number, $email, $message);

        if ($stmt->execute()) {
            echo "Message sent successfully, thank you for your review";
            header("Location: contact.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    private function sanitizeInput($data) {
        return mysqli_real_escape_string($this->conn, htmlspecialchars(trim($data)));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {
    if (!isset($_SESSION['username'])) {
        echo "You need to be signed in to send a message.";
        exit();
    }

    $message = new Messages($conn);

    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $messageContent = $_POST["message"];

    $message->contactUs($name, $number, $email, $messageContent);
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="contact.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="contact.js"></script>
    <title>Contact Us</title>
</head>

<body>
    <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>We love hearing from our customers! Whether you have a question about our stunning bouquets, need assistance with an order, or just want to say hello, we're here for you.</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <h2>reach us</h2>
                <div class="box">
                    <div class="icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>Haxhi Zeka 2000 <br> Prizren <br> Kosovo</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>+383 43 721 007 <br> +383 49 264 030</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>flariss@hotmail.com</p>
                    </div>
                </div>
            </div>

            <div class="contactForm">
                <form id="form" action="contact.php" method="post">
                    <h2>leave a message</h2>
                    <div class="input">
                        <input type="text" name="name" id="name" placeholder="Name">
                        <div class="error"></div>
                    </div>
                    <div class="input">
                        <input type="text" name="number" id="number" placeholder="Phone Number">
                        <div class="error"></div>
                    </div>
                    <div class="input">
                        <input type="text" name="email" id="email" placeholder="E-mail">
                        <div class="error"></div>
                    </div>
                    <div class="input">
                        <textarea name="message" placeholder="Message" name="message" id="message" ></textarea>
                        <div class="error"></div>
                    </div>
                    <button type="submit" class="btn" name="save">Send message</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>

</html>
