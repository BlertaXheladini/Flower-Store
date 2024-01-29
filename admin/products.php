<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #223222;
            color: #987d67;
        }

        h2 {
            color: #987d67;
        }

        .product {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .delete-btn,
        .update-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 3px;
            background-color: #ff4444;
        }

        .update-btn {
            top: 40px;
            background-color: #4da6ff;
        }

        .add-btn {
            display: inline-block;
            background-color: #cdbcac;
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 3px;
            margin-bottom: 20px;
            text-decoration: none;
        }

        .category-btn {
            margin-right: 10px;
            margin-bottom: 15px;
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f3f3f3;
        }


       
        .bestseller-products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }


 
.category-btn[data-category="bestseller"]:hover {
    background-color: #eac388;
    color: #223222;
    border-color: #4caf50;
}


.category-btn[data-category="giftbox"]:hover {
    background-color: #eac388;
    color: #223222;
    border-color: #4caf50;
}

    .dashboard-btn {
        background-color: #223222;
        color: #fff;
        cursor: pointer;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        margin-top: 10px;
        margin-right: 10px;
    }

    button:hover {
        background-color: #cdbcac;
    }


    
@media (max-width: 768px) {
    .product {
        width: 100%; /* Full width on smaller screens */
    }

    .delete-btn,
    .update-btn {
        font-size: 12px;
        padding: 3px 6px;
    }

    .add-btn,
    .category-btn {
        font-size: 12px;
        padding: 5px 8px;
        margin-bottom: 10px;
    }
}


    </style>
</head>

<body>
    <h2>Product List</h2>
    <a href="insertproduct.php" class="add-btn">Add New Product</a>
    <div>
        <button class="category-btn active" onclick="filterProducts('bestseller')">Bestseller</button>
        <button class="category-btn" onclick="filterProducts('giftbox')">Gift Box</button>
       
    </div>

    <?php
    include '../connection.php';

    session_start();

    // Check if category filter is set
    $category = isset($_GET['category']) ? $_GET['category'] : 'bestseller';
    
    $sql = "SELECT * FROM products WHERE category='$category'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="bestseller-products">';
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<h3>{$row['name']}</h3>";
            echo "<p>Price: \${$row['price']}</p>";
            echo "<img src='../productsimg/{$row['picture']}' alt='{$row['name']}'>";

            // Delete Form
            echo "<form method='post' action='deleteproduct.php' style='display: inline;'>";
            echo "<input type='hidden' name='deleteId' value='{$row['ID']}'>";
            echo "<button type='submit' class='delete-btn'>Delete</button>";
            echo "</form>";

            // Update Form
            echo "<form method='get' action='update.php' style='display: inline;'>";
            echo "<input type='hidden' name='updateId' value='{$row['ID']}'>";
            echo "<button type='submit' class='update-btn'>Update</button>";
            echo "</form>";

            echo "</div>";
        }
        echo '</div>';
    } else {
        echo "<p>No products available for this category.</p>";
    }

    $conn->close();
    ?>

    <script>
        function filterProducts(category) {
            // Get all category buttons and remove the active class
            var categoryButtons = document.querySelectorAll('.category-btn');
            categoryButtons.forEach(function(button) {
                button.classList.remove('active');
            });

            // Add active class to the clicked category button
            document.querySelector(`.category-btn[data-category="${category}"]`).classList.add('active');

            // Reload the page with the selected category filter
            window.location.href = `product_list.php?category=${category}`;
        }
    </script>
       <a href="dashboard.php"><button>Go Back to Dashboard</button></a>
</body>

</html>
