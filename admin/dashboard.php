<?php

include '../connection.php';

session_start();

if (!isset($_SESSION["role"])) {
    header("Location: ../signin.php");
    exit();
}

 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #223222;; 
            color: #987d67; 
        }

        nav {
            background-color: #cdbcac; 
            width: 200px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            overflow-x: hidden;
            padding-top: 20px;
        }

        nav a {
            text-decoration: none;
            color: #333; 
            display: block;
            padding: 10px 15px;
        }

        nav a:hover {
            background-color: #987d67; 
        }

        nav a:last-child {
            margin-top: auto; 
        
        }

        main {
            margin-left: 200px; 
            padding: 20px;
        }

     
        @media only screen and (max-width: 768px) {
            nav {
                width: 100%;
                height: auto;
                position: static;
            }

            main {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <nav>
        <a href="../home.php">Home</a>
        <a href="../about.php">About</a>
        <a href="../products.php">Catalog</a>
        <a href="products.php">Products</a>
        <a href="users.php">Users</a>
        <a href="messages.php">Messages</a>
        <a href="../signout.php">Sign Out</a>
    </nav>

    <main>
        <h1>Welccome to Admin panel !</h1>
     
    </main>
</body>

</html>
