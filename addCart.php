<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addCart.css" type="text/css">
    <title>Add to Cart</title>

</head>
<body>

<div class="product-container">
    <h2>Product Details</h2>
    <p>Product Name: <span id="productName">Sample Product</span></p>
    <p>Price: $<span id="productPrice">10.00</span></p>

    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" value="1" min="1">

    <button onclick="addToCart()">Add to Cart</button>

    <div class="total-price">
        Total Price: $<span id="totalPrice">10.00</span>
    </div>
</div>

<script>
    function addToCart() {
        var quantity = document.getElementById('quantity').value;
        var price = document.getElementById('productPrice').innerText;
        var totalPrice = parseFloat(price) * parseInt(quantity);

        document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
     
    }
</script>

</body>
</html>
