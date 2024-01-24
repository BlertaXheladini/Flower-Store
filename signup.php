<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('modeliStudenti.php');
require_once('insert.php');

if (isset($_POST['save'])) {
    $regj = new Studenti();
    $regj->setUsername($_POST['username']);
    $regj->setEmail($_POST['email']);
    $regj->setPassword($_POST['password']);
    $regj->setPassword2($_POST['password2']);
    $regj->insert();
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
            <form id="form" action="signup.php" method="POST">
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
                <button type="submit" class="btn" name="save">Sign Up</button>
                <div class="register">
                    <p>Already have an account?<a href="signin.php"> Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
