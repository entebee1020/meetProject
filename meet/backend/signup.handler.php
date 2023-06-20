<?php
require_once '../connection/connect.php';

// Check if the signup form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signupButton"])) {
    // Retrieve the values from the form
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmpassword"];

    // Perform basic form validation
    if (!empty($email) && !empty($password) && !empty($confirmPassword)) {
        if ($password === $confirmPassword) {
            $conn = connectToDatabase(); // Connect to the database

            // Sanitize the values
            $sanitizedEmail = mysqli_real_escape_string($conn, $email);

            // Check if the email already exists in the database
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $sanitizedEmail);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "Email already exists";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Prepare and execute the SQL statement to insert the data
                $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $sanitizedEmail, $hashedPassword);

                if ($stmt->execute()) {
                    header("location:../forms/login.php?status=Account have been created successfully");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
            }

            // Close the statement and the database connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Password and confirm password do not match";
        }
    } else {
        echo "Please fill in all the fields";
    }
}
?>
