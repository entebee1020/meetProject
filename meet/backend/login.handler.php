<?php
require_once '../connection/connect.php';

// Start the session
session_start();

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["loginButton"])) {
    // Retrieve the values from the form
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Perform basic form validation
    if (!empty($email) && !empty($password)) {
        $conn = connectToDatabase(); // Connect to the database
        
        // Sanitize the values
        $sanitizedEmail = mysqli_real_escape_string($conn, $email);
        
        // Prepare and execute the SQL statement to fetch the hashed password, email, and role
        $stmt = $conn->prepare("SELECT password, email, roles FROM users WHERE email = ?");
        $stmt->bind_param("s", $sanitizedEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row) {
            $hashedPassword = $row['password'];
            $email = $row['email'];
            $role = $row['roles'];
            
            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                // Store the user's information in the session
                $_SESSION['user'] = [
                    'email' => $email,
                    'role' => $role,
                ];
                
                // Redirect to the appropriate dashboard based on the user's role
                if ($role == 'admin') {
                    header("Location: ../admin/admin.php");
                } else {
                    header("Location: ../clients/index.php?status=Welcome to your page");
                }
                exit();
            } else {
                echo "Invalid email or password";
            }
        } else {
            echo "Invalid email or password";
        }
        
        // Close the statement and the database connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Please fill in all the fields";
    }
}
?>
