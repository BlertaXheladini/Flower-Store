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
        .product img {
           max-height:320px;
           width: 250px;
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
        width: 100%;
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

    <?php

include '../connection.php';

class ProductManager {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function getProducts($category = 'bestseller') {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            return $products;
        } else {
            return [];
        }
    }

    public function displayProducts($products) {
        if (!empty($products)) {
            echo '<div class="bestseller-products">';
            foreach ($products as $product) {
                $this->displayProduct($product);
            }
            echo '</div>';
        } else {
            echo "<p>No products available for this category.</p>";
        }
    }

    private function displayProduct($product) {
        echo "<div class='product'>";
        echo "<h3>{$product['name']}</h3>";
        echo "<p>Price: \${$product['price']}</p>";
        echo "<img src='../productsimg/{$product['picture']}' alt='{$product['name']}'>";

    
        echo "<form method='post' action='deleteproduct.php?id={$product['ID']}' style='display: inline;'>";
        echo "<input type='hidden' name='deleteId' value='{$product['ID']}'>";
        echo "<button type='submit' name='submit1' class='delete-btn'>Delete</button>";
        echo "</form>";

      
        echo "<form method='post' action='editproducts.php' style='display: inline;'>";
        echo "<input type='hidden' name='updateId' value='{$product['ID']}'>";
        echo "<button type='submit' class='update-btn'>Update</button>";
        echo "</form>";

        echo "</div>";
    }
}



session_start();

$productManager = new ProductManager($conn);
$products = $productManager->getProducts();

$productManager->displayProducts($products);

$conn->close();

?>


    <script>
        function filterProducts(category) {
            var categoryButtons = document.querySelectorAll('.category-btn');
            categoryButtons.forEach(function(button) {
                button.classList.remove('active');
            });

            document.querySelector(`.category-btn[data-category="${category}"]`).classList.add('active');

            window.location.href = `products.php?category=${category}`;
        }
    </script>
       <a href="dashboard.php"><button>Go Back to Dashboard</button></a>
</body>

</html>
