<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page
    header("Location: ../forms/login.php");
    exit();
}

// Initialize the cart array in the session if it's not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// HTML code for the cart icon
$cartIcon = '<a href="mycart.php" class="btn btn-primary">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge bg-secondary">' . count($_SESSION['cart']) . '</span>
             </a>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="" href="../style/fonts/all.min.css">
    <script src="../style/bootstrap/js/bootstrap.bundle.js"></script>
    <title>My Cart</title>
    <style>
        footer {
            background-color: #007bff;
            padding: 20px 0;
            text-align: center;
            color: white;
        }

        footer i {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <!-- Navigation menu goes here -->
    <nav class="navbar navbar-expand-lg text-bg-primary p-3">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Metuan Butcher System</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="color: white;">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="mycart.php">My Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./logout.php">Logout</a>
                    </li>
                </ul>
                <p class="navbar-text text-white ms-auto" style="justify-content: right; display: inline-flex">
                    Welcome, <?php echo $_SESSION['user']['email']; ?>
                </p>
            </div>
        </div>
    </nav>

    <!-- Cart items display goes here -->
    <div class="container py-4 my-4">
        <h1>My Cart</h1>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            // Fetch the product details for all the products in the cart
            include_once "../connection/connect.php";
            $conn = connectToDatabase();

            foreach ($_SESSION['cart'] as $order) {
                $productId = $order['product_id'];
                $amount = $order['amount'];
                $phoneNumber = $order['phone_number'];

                // Debug information
                echo "Product ID: " . $productId . "<br>";

                // Fetch the product details from the database based on the product ID
                $query = "SELECT * FROM products WHERE id = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "i", $productId);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $imagePath = $row['image'];

                    // Generate the HTML code for the cart item
                    echo '
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../images/' . $imagePath . '" class="img-fluid" alt="Product Image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">' . $productName . '</h5>
                                    <p class="card-text">Amount: ' . $amount . '</p>
                                    <p class="card-text">Phone Number: ' . $phoneNumber . '</p>
                                    <p class="card-text">Price: $' . $productPrice . '</p>
                                </div>
                            </div>
                        </div>
                    </div>';
                } else {
                    echo '<p>No product found for ID: ' . $productId . '</p>';
                }

                mysqli_stmt_close($stmt);
            }

            mysqli_close($conn);
        } else {
            echo '<p>No orders in the cart.</p>';
        }
        ?>
    </div>

    <!-- Checkout button goes here -->
    <div class="container">
        <a href="../stripe/payment-form-ui.php" class="btn btn-primary">Checkout</a>
    </div>

    <!-- Footer goes here -->

</body>

</html>
