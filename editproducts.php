<?php
include 'connection.php';

$id = $_GET["id"];
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<h2>Edit Product</h2>
<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <label for="name">Product Name:</label>
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
    <label for="price">Product Price:</label>
    <input type="text" name="price" value="<?php echo $product['price']; ?>" required><br>
    <input type="submit" name="update" value="Update Product">
</form>
