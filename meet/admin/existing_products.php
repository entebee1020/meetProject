<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../admin/css/style.css" class="text/css">
  <title>Existing Products</title>
</head>
<body>
  
<div class="container">
    <h2>Existing Products</h2>
  
    <?php
    //established a database connection
    require_once "../connection/connect.php";
  
    // Retrieve the existing products from the database
    $query = "SELECT * FROM products";
    $result = mysqli_query(connectToDatabase(), $query);
  
    // Check if there are any products
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['id'];
        $productName = $row['name'];
        $productPrice = $row['price'];
        $productDescription = $row['description'];
  
        // Display the product information
        echo '
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">' . $productName . '</h5>
            <p class="card-text">Price: ' . $productPrice . '</p>
            <p class="card-text">Description: ' . $productDescription . '</p>
            <a href="../backend/delete_product.php?id=' . $productId . '" class="btn btn-danger">Delete</a>
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
  
  </div>
  </body>
</html>
