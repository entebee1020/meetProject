<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page
    header("Location: ../forms/login.php");
    exit();
}

// Check if the form is submitted for adding the order to the cart
if (isset($_POST['checkout'])) {
    // Get the selected order details
    $productId = $_POST['product_id'];
    $amount = $_POST['amount'];
    $phoneNumber = $_POST['phone_number'];

    // Store the selected order in the session
    $_SESSION['cart'][] = [
        'product_id' => $productId,
        'amount' => $amount,
        'phone_number' => $phoneNumber
    ];

    // Redirect to the mycart.php page
    header("Location: mycart.php");
    exit();
}

// Retrieve the logged-in user's name from the session
$loggedInUserName = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style/fonts/all.min.css">
    <script src="../style/bootstrap/js/bootstrap.bundle.js"></script>

    <title>Metuan Butcher System</title>
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

<!-- Navbar content goes here -->

<nav class="navbar navbar-expand-lg text-bg-primary p-3">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Metuan Butcher System</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="color: white;">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="../clients/mycart.php">mycart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../clients/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./message.php">Message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./logout.php">logout</a>
                </li>
            </ul>
            <p class="navbar-text text-white ms-auto" style=" justify-content: right; display: inline-flex">Welcome, <?php echo $loggedInUserName; ?></p>
        </div>
    </div>
</nav>

<!-- Body content goes here -->

<div class="container py-4 my-4">
    <div class="row justify-content-between">
        <?php
        // Establish a database connection
        include_once "../connection/connect.php";

        // Function to insert data into the orders table
        function insertOrder($productId, $productName, $amount, $phoneNumber, $productPrice)
        {
            $conn = connectToDatabase();

            $query = "INSERT INTO orders (order_id, phone_number, product_id, product_name, amount, price, order_date, processed) 
                      VALUES (?, ?, ?, ?, ?, ?, NOW(), '0')";

            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sisid", $phoneNumber, $productId, $productName, $amount, $productPrice);

            if (mysqli_stmt_execute($stmt)) {
                return 'success';
            } else {
                return 'Error placing the order: ' . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }

        // Fetch products from the database
        $query = "SELECT * FROM products";
        $result = mysqli_query(connectToDatabase(), $query);

        if (mysqli_num_rows($result) > 0) {
            // Iterate over the product records
            while ($row = mysqli_fetch_assoc($result)) {
                $productId = $row['id'];
                $productName = $row['name'];
                $productPrice = $row['price'];
                $categoryOptions = explode(",", $row['category']); // Convert the comma-separated string back to an array
                $productDescription = $row['description'];
                $imagePath = $row['image'];
                // Remove numbers from the image filename
                $imageFilename = preg_replace('/\d+/', '', $row['image']);
                // Generate the HTML code for each product
                echo '
                <div class="col-md-4">
                    <div class="card">
                        <img src="../images/'.$imagePath. '" class="card-img-top" alt="...">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" name="product_name"><b>' . $productName . '</b></li>
                            <li class="list-group-item">Tsh ' . $productPrice . '/=</li>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" id="category" name="category">';
                foreach ($categoryOptions as $category) {
                    echo "<option value='$category'>$category</option>";
                }
                echo '
                                </select>
                            </div>
                            <li class="list-group-item">
                                <form method="POST" action="../clients/mycart.php">
                                    <input type="hidden" name="product_id" value="' . $productId . '">
                                    <div class="form-group">
                                        <label for="amount">Enter Amount (kg):</label>
                                        <input type="number" name="amount" class="form-control" id="amount" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Enter size (in kilograms):</label>
                                        <input type="number" name="phone_number" class="form-control" id="phone_number" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="AddToCart">Add To Cart</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>';
            }
        } else {
            // No products found
            echo '<p>No products available.</p>';
        }

        // Check if the form is submitted and process the order
        if (isset($_POST['AddToCart'])) {
            $productId = $_POST['product_id'];
            $amount = $_POST['amount'];
            $phoneNumber = $_POST['phone_number'];
            $price = $productPrice * $amount;

            // Call the insertOrder function to insert the order into the database
            $result = insertOrder($productId, $productName, $amount, $phoneNumber, $price);

            if ($result === 'success') {
                header("Location: ../clients/mycart.php?status=order added successfully");
                exit();
            } else {
                echo $result; // Display the error message
            }
        }

        // Close the database connection
        mysqli_close(connectToDatabase());
        ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-linkedin-in"></i>
                    <i class="fab fa-instagram"></i>
                </p>
                <p><i class="fas fa-copyright"></i>
                    Metuan Butcher System. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
