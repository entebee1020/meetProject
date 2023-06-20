<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inventory Control</title>
    <link rel="stylesheet" href="../admin/css/style.css" class="">
</head>
<body>
<div class="navbar">
    <h3>Metuan Online Butcher System</h3>
    <a href="../admin/admin.php" class="back-button">Back</a>
  </div>
  <h1 class="">Meat Management Inventory Control</h1>

<?php
// Establishing database connection
require_once "../connection/connect.php";

// Fetch products from the database
$query = "SELECT * FROM products";
$result = mysqli_query(connectToDatabase(), $query);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $productId = $row['id'];
    $productName = $row['name'];
    $productPrice = $row['price'];
    $imagePath = $row['image'];

    // Generate HTML code for displaying the product information
    echo '
    <div class="product-container">
      <div class="product-image">
        <img src="../images/' . $imagePath . '" alt="Product Image">
      </div>
      <div class="product-details">
        <h3>' . $productName . '</h3>
        <p>Price: ' . $productPrice . '</p>
      </div>
    </div>
    ';
  }
} else {
  echo "No products found.";
}

// Close the database connection
mysqli_close(connectToDatabase());
?>

<!-- Footer goes here -->
<footer class="footer">
      <div class="">
        <div class="row">
          <div class="col-12 text-center">
            <p>&copy; <?php echo date('Y'); ?> Metuan Online Butcher System. </p>
            <p>Designed by Noel Evod Lyamuya</p>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>

