<?php
// Function to insert the order into the database
function insertOrder($productId, $productName, $amount, $phoneNumber, $price) {
    // Include the database connection
    include_once "connect.php";

    // Prepare the SQL statement to insert the order
    $query = "INSERT INTO orders (product_id, product_name, amount, phone_number, price, order_date, processed) VALUES (?, ?, ?, ?, ?, NOW(), 0)";
    $statement = mysqli_prepare(connectToDatabase(), $query);

    // Bind the parameters to the statement
    mysqli_stmt_bind_param($statement, "isisd", $productId, $productName, $amount, $phoneNumber, $price);

    // Execute the statement
    mysqli_stmt_execute($statement);

    // Close the statement and database connection
    mysqli_stmt_close($statement);
    mysqli_close(connectToDatabase());
}
?>
