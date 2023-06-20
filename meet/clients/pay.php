<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="" href="../style/fonts/all.min.css">
    <script src="../style/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Payment</title>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand text-white" href="#">Metuan Butcher System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Payment Page</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><i class="fab fa-paypal"></i> PayPal</h2>
                        <p class="card-text">Click the button below to pay with PayPal:</p>
                        <form action="paypal_payment_process.php" method="POST">
                            <!-- Add your PayPal payment form fields here -->
                            <button type="submit" class="btn btn-primary">Pay with PayPal</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><i class="fab fa-cc-visa"></i> Visa</h2>
                        <p class="card-text">Enter your credit card details below to pay with Visa:</p>
                        <form action="visa_payment_process.php" method="POST">
                            <!-- Add your Visa payment form fields here -->
                            <button type="submit" class="btn btn-primary">Pay with Visa</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><i class="fas fa-phone"></i> Pay by Phone</h2>
                        <p class="card-text">Make a payment by phone:</p>
                        <p class="card-text"><i class="fas fa-phone"></i> Phone: 0747 379 621: Mpesa</p>
                        <p class="card-text"><i class="fas fa-phone"></i> Phone: 0783 567 500: Airtel Money</p>
                        <p class="card-text"><i class="fas fa-phone"></i> Phone: 0737 816 428: T-Pesa</p>
                        <p class="card-text"><i class="fas fa-phone"></i> Phone: 0621 157 492: Halopesa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
</body>
</html>
