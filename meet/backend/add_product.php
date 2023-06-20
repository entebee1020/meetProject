<?php
// Establishing database connection
require_once "../connection/connect.php";

if (isset($_POST["submit"])) {
  // Retrieve the submitted form data
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $originalFilename = $_FILES['picture']['name'];
  $categories = ['utumbo', 'kongoro', 'stake', 'maini'];

  // Generate a unique filename
  $timestamp = time(); // Get current timestamp
  $filename = $timestamp.'_'.$originalFilename;

  // Move uploaded picture to a directory with the unique filename
  $targetDir = "../images/";
  $targetFile = $targetDir."".basename($filename);
  move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile);

  // Convert the categories array into a string
  $categoryOptions = implode(",", $categories);

  // Insert the new product into the database
  $query = "INSERT INTO products (name, price, description, image, category) VALUES ('$name', '$price', '$description', '$filename', '$categoryOptions')";
  $result = mysqli_query(connectToDatabase(), $query);

  // Check if the insertion was successful
  if ($result) {
    echo "Product added successfully";
  } else {
    echo "Error: " . mysqli_error(connectToDatabase());
  }

  // Close the database connection
  mysqli_close(connectToDatabase());
}
?>
