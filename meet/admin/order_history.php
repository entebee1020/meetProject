<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../admin/css/style.css" class="text/css">
  <title>Order History</title>
</head>
<body>
  
</body>
</html>
<div class="container">
    <h2>Order History</h2>
    <?php
    // Retrieve the order history from the database
    include_once "../connection/connect.php";
  
    // Prepare and execute the SQL statement to fetch orders
    $query = "SELECT * FROM orders";
    $result = mysqli_query(connectToDatabase(), $query);
  
    // Check if there are any orders returnedfrom the query
    if (mysqli_num_rows($result) > 0) {
      echo '<table class="table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Phone Number</th>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Amount</th>
                  <th>Price</th>
                  <th>Order Date</th>
                  <th>Processed</th>
                  <th>Category</th>
                </tr>
              </thead>
              <tbody>';
  
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $row['order_id'] . '</td>
                <td>' . $row['phone_number'] . '</td>
                <td>' . $row['product_id'] . '</td>
                <td>' . $row['product_name'] . '</td>
                <td>' . $row['amount'] . '</td>
                <td>' . $row['price'] . '</td>
                <td>' . $row['order_date'] . '</td>
                <td>' . $row['processed'] . '</td>
                
              </tr>';
      }
  
      echo '</tbody></table>';
    } else {
      echo 'No orders found.';
    }
  
    // Close the database connection
    mysqli_close(connectToDatabase());
    ?>
  </div>