<?php
session_start();
include("connection.php");

class UserManager {
    private $conn;
    public function __construct($connection) {
        $this->conn = $connection;
    }
    public function loginUser($username, $password) {
        $username = $this->sanitizeInput($username);
        $password = $this->sanitizeInput($password);

        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPassword = $row["password"];

            if ($password === $storedPassword) {
                $_SESSION["username"] = $row["username"];

                $role = $this->getRoleByUsername($username);
                $_SESSION["role"] = $role;

                if ($role === "admin") {
                    header("Location: admin/dashboard.php");
                } else {
                    header("Location: home.php");
                }
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo '<p style="color: red;">User not found.</p>';
        }
    }


    private function getRoleByUsername($username) {
        $username = $this->sanitizeInput($username);

        $sql = "SELECT role FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row["role"];
        } else {
            return "user"; 
        }
    }

    private function sanitizeInput($data) {
        return mysqli_real_escape_string($this->conn, htmlspecialchars(trim($data)));
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userManager = new UserManager($conn);
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userManager->loginUser($username, $password);
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="signIn.css" />
    <script defer src="signin.js"></script>
    <title>SignIn</title>
</head>

<body>
    <div class="container">
        <div class="forma signin">
            <h1>sign in to flariss store</h1>
            <form method="post" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="inputi">
                    <input type="text" name="username" id="username" placeholder="Username">
                    <div class="error"></div>
                </div>
                <div class="inputi">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <div class="error"></div>
                </div>
                <div class="forgot-remember">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn">Sign In</button>
                <div class="register">
                    <p>Don't have an account?<a href="signup.php"> Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>