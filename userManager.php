<?php
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
                header("Location: home.php");
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }
    }

    private function sanitizeInput($data) {
        return mysqli_real_escape_string($this->conn, htmlspecialchars(trim($data)));
    }
}
?>