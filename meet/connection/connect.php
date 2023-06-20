<?php
// Database connection
function connectToDatabase() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "meetbutcher";

    // Create a connection
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Connection successful
    return $conn;
}
?>
