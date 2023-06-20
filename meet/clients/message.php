<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="" href="../style/fonts/all.min.css">
    <link rel="stylesheet" href="../main css/style.css" class="text/css">
    <script src="../style/bootstrap/js/bootstrap.bundle.js" ></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Send Message</title>
</head>
<body>

<!-- start menubar here-->
<nav class="navbar navbar-expand-lg text-bg-primary p-3">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Metuan Butcher</a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" style="color: white;">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../forms/login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>





<h2>Send a Message to the Admin</h2>
  <form method="POST" action="./message.php">
    <div>
      <label for="sender_name">Your Name:</label>
      <input type="text" id="sender_name" name="sendername" required>
    </div>
    <div>
      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>
    </div>
    <button type="submit" name="submit">Send Message</button>
  </form>


  <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  // Retrieve form data
  $senderName = $_POST["sendername"];
  $message = $_POST["message"];

  // Validate form data (e.g., check for required fields)

  // Insert the message into the database
  require_once "../connection/connect.php";
  $conn = connectToDatabase();

  $query = "INSERT INTO message (sender_name, message, date_sent) VALUES ('$senderName', '$message', NOW())";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // Success message
    echo '<script type="text/javascript">
            alert("Message sent successfully! Please visit your account for the response.");
            window.location.href = "message.php"; // Replace with the actual URL of your account page
          </script>';
  } else {
    echo "Failed to send message.";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>


</body>
</html>