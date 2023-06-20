<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../admin/css/style.css" class="text/css">
  <title>View Message</title>
  <style>
    div.message-container {
    background-color: #f2f2f2;
    padding: 10px;
    margin-bottom: 10px;
  }

  div.message-container p {
    margin: 5px 0;
  }

  label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  textarea {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }

  button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button[type="submit"]:hover {
    background-color: #45a049;
  }
  </style>
</head>
<body>
  

<?php
// Retrieve the messages from the database
require_once "../connection/connect.php";
$conn = connectToDatabase();

$query = "SELECT * FROM message ORDER BY date_sent DESC";
$result = mysqli_query($conn, $query);

// Check if there are any messages
if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $messageId = $row['id'];
    $senderName = $row['sender_name'];
    $message = $row['message'];
    $dateSent = $row['date_sent'];
    $adminResponse = $row['admin_response'];

    // Display the message information
    echo "
      <div>
        <p><strong>From:</strong> $senderName</p>
        <p><strong>Date Sent:</strong> $dateSent</p>
        <p><strong>Message:</strong> $message</p>
        <p><strong>Admin Response:</strong> $adminResponse</p>
        <form method='POST' action='respond.php'>
          <input type='hidden' name='message_id' value='$messageId'>
          <label for='admin_response'>Admin Response:</label>
          <textarea id='admin_response' name='admin_response'></textarea>
          <button type='submit'>Send Response</button>
        </form>
      </div>
      <hr>
    ";
  }
} else {
  echo "No messages found.";
}

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>

