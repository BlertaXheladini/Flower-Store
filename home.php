<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="flower.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="home.css" />
    <title>Flower Web Store</title>
    <script>
        function toggleMenu() {
            var navbarLinks = document.getElementById("navbarLinks");
            navbarLinks.classList.toggle("show");
        }
    </script>
</head>

<body>
    <header>
        <div class="container">
            <div class="navbar">
                <div class="icon" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </div>
                <ul id="navbarLinks">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="contact.php">Contacts</a></li>
                </ul>
                <nav>
                <?php
                    session_start();
                    if (isset($_SESSION['username'])) { 
                        echo '<input type="submit" value="Sign Out" onclick="window.location.href = \'signout.php\'" />';
                    } else {
                        echo '<input type="submit" value="Sign In" onclick="window.location.href = \'signin.php\'" />';
                    }
                    ?>
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
