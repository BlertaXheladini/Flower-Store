<?php
include("connection.php");

class UserManager {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function registerUser($username, $email, $password) {
        $username = $this->sanitizeInput($username);
        $email = $this->sanitizeInput($email);
        $password = $this->sanitizeInput($password);

        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ? )";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "Registration successful!";
            header("Location: signin.php");
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
    $userManager = new UserManager($conn);

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    $userManager->registerUser($username, $email, $password);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="signIn.css" />
    <script defer src="signup.js"></script>
    <title>SignIn</title>
</head>

<body>

    <div class="container">
        <div class="forma signup">
            <h1>sign up to flariss store</h1>
            <form id="form" action="signup.php" method="POST">
                <div class="inputi">
                    <input type="text" name="username" id="username" placeholder="Username">
                    <div class="error"></div>
                </div>
                <div class="inputi">
                    <input type="text" name="email" id="email" placeholder="Email">
                    <div class="error"></div>
                </div>
                <div class="inputi">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <div class="error"></div>
                </div>
                <div class="inputi">
                    <input type="password" name="password2" id="password2" placeholder="Verify your password">
                    <div class="error"></div>
                </div>
                <div class="terms">
                    <label>
                        <input type="checkbox" id="terms" name="terms" required>
                        <a href="#"> I agree to the terms & conditions</a>
                    </label>
                    <div class="error"></div>
                </div>
                <button type="submit" class="btn" name="save">Sign Up</button>
                <div class="register">
                    <p>Already have an account?<a href="signin.php"> Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

