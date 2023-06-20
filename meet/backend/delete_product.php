 <?php
// established a database connection
require_once "../connection/connect.php";

// Check if the product ID is provided
if (isset($_GET['id'])) {
  $productId = $_GET['id'];

  // Delete the product from the database
  $query = "DELETE FROM products WHERE id = '$productId'";
  $result = mysqli_query(connectToDatabase(), $query);

  // Check if the deletion was successful
  if ($result) {
    echo "Product deleted successfully!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else {
  echo "Invalid product ID.";
}

// Close the database connection
mysqli_close(connectToDatabase());
?>
