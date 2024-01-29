<?php
session_start();

if (empty($_SESSION['username'])) {
      header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="flower.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="home.css" />
    <script src="js/flower.js"></script>
    <title>Flower Web Store</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="navbar">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="contact.php">Contacts</a></li>
                </ul>
                <nav>
                    <input type="submit" value="Sign In" onclick="window.location.href = 'signin.php'" />
                    <input type="submit" value="Sign Out" onclick="window.location.href = 'signout.php'" />
                </nav>
            </div>
            <div class="row">
                <div class="title">
                    <h1>FLARISS</h1>
                    <p>Spring flower bouquet for you...</p>
                    <a href="products.php"> <button type="button">Shop now </button></a>
                </div>
            </div>
        </div>

    </header>





































</body>

</html>