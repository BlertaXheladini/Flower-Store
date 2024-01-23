<?php
function insertion() {
    $sql = "INSERT INTO signup (username, email, password, password2) VALUES (?, ?, ?, ?)";
    $stm = $this->dbconn->prepare($sql);
    $stm->execute([$this->username, $this->email, $this->password, $this->password2]);
    echo "<script>
        alert('Data is inserted successfully'); 
        document.location='signin.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="signIn.css" />
    <script defer src="./signup.js"></script>
    <title>SignIn</title>
</head>
<body>
    <div class="container">
        <div class="forma signup">
            <h1>sign up to flariss store</h1>
            <form id="form" action="insert_data.php" method="POST">
                <div class="inputi">
                    <input type="text" name="username" placeholder="Username">
                    <div class="error"></div>
                </div>
                <div class="inputi">
                    <input type="text" name="email" placeholder="Email">
                    <div class="error"></div>
                </div>
                <div class="inputi">
                    <input type="password" name="password" placeholder="Password">
                    <div class="error"></div>
                </div>
                <div class="inputi">
                    <input type="password" name="password2" placeholder="Verify your password">
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
