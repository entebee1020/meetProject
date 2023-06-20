<?php
require_once 'connect.php';

// Connect to the database
$conn = connectToDatabase();

// Check if the connection was successful
if ($conn) {
    echo "Connected to the database successfully!";
    
    // Perform additional database operations here
    
    // Close the database connection
    $conn->close();
} else {
    echo "Failed to connect to the database!";
}
?>
