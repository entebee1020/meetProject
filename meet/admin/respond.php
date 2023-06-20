<!DOCTYPE html>
<html>
<head>
  <title>Admin Response</title>
  <style>
    /* CSS styles */
    body {
      font-family: Arial, sans-serif;
    }

    .form-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f0f0f0;
      border-radius: 5px;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-container label {
      display: block;
      margin-bottom: 10px;
    }

    .form-container input[type="text"],
    .form-container textarea {
      width: 100%;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    .form-container textarea {
      height: 120px;
    }

    .form-container button {
      display: block;
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-container button:hover {
      background-color: #45a049;
    }
    .navbar{
      background-color: cyan;
      padding: 10px;
      text-align: center;
      margin-bottom: 100px;
    }
  </style>
</head>
<body>

<div class="navbar">
    <h3>Metuan Online Butcher System</h3>
  </div>

  <div class="form-container">
    <h2>Admin Response</h2>
    <form method="POST" action="">
      <label for="message_id">Message ID:</label>
      <input type="text" id="message_id" name="message_id" required>

      <label for="admin_response">Admin Response:</label>
      <textarea id="admin_response" name="admin_response" required></textarea>

      <button type="submit">Send Response</button>
    </form>
  </div>
</body>
</html>


<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $messageId = $_POST['message_id'];
  $adminResponse = $_POST['admin_response'];

  // Update the admin response in the database
  include_once "../connection/connect.php";
  $conn = connectToDatabase();

  $query = "UPDATE message SET admin_response = '$adminResponse' WHERE id = $messageId";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "Response sent successfully!";
  } else {
    echo "Failed to send response.";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
