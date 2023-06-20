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
<?php


require_once __DIR__ . '/config.php';
$currencies = Config::getCurrency();
$country = Config::getAllCountry();

?>
<h1>Stripe payment integration via custom form</h1>
<div class="phppot-container">
    <div id="payment-box"
        data-consumer-key="<?php echo Config::STRIPE_PUBLISHIABLE_KEY; ?>"
        data-create-order-url="<?php echo Config::CREATE_STRIPE_ORDER;?>"
        data-return-url="<?php echo Config::THANKYOU_URL;?>">
        <div class="row">
            <div class="label">
                Name <span class="error-msg" id="name-error"></span>
            </div>
            <input type="text" name="customer_name" class="input-box"
                id="customer_name">
        </div>
        <div class="row">
            <div class="label">
                Email <span class="error-msg" id="email-error"></span>
            </div>
            <input type="text" name="email" class="input-box" id="email">
        </div>
        <div class="row">
            <div class="label">
                Address <span class="error-msg" id="address-error"></span>
            </div>
            <input type="text" name="address" class="input-box"
                id="address">
        </div>
        <div class="row">
            <div class="label">
                Country <span class="error-msg" id="country-error"></span>
            </div>
            <input list="country-list" name="country" class="input-box"
                id="country">
            <datalist id="country-list">
                <?php foreach ($country as $key => $val) { ?>
             <option value="<?php echo $key;?>"><?php echo $val;?></option>
                <?php }?>
                    </datalist>
        </div>
        <div class="row">
            <div class="label">
                Postal code <span class="error-msg" id="postal-error"></span>
            </div>
            <input type="text" name="postal_code" class="input-box"
                id="postal_code">
        </div>
        <div class="row">
            <div class="label">
                Description <span class="error-msg" id="notes-error"></span>
            </div>
            <input type="text" name="notes" class="input-box" id="notes">
        </div>
        <div class="row">
            <div class="label">
                Amount <span class="error-msg" id="price-error"></span>
            </div>
            <input type="text" name="price" class="input-box" id="price">
        </div>
        <div class="row">
            <div class="label">
                Currency <span class="error-msg" id="currency-error"></span>
            </div>
            <input list="currency-list" name="currency"
                class="input-box" id="currency">
            <datalist id="currency-list">
            <?php foreach ($currencies as $key => $val) { ?>
             <option value="<?php echo $key;?>"><?php echo $val;?></option>
                <?php }?>
                    </datalist>

        </div>
        <div class="row">
            <div id="card-element">
                <!--Stripe.js injects the Card Element-->
            </div>
        </div>
        <div class="row">
            <button class="btnAction" id="btn-payment"
                onclick="confirmOrder(event);">
                <div class="spinner hidden" id="spinner"></div>
                <span id="button-text">Send Payment</span>
            </button>
            <p id="card-error" role="alert"></p>
        </div>

    </div>
        <?php
        if (! empty($_GET["action"]) && $_GET["action"] == "success") {
            ?><div class="success">Thank you for the payment.</div>
    <?php
        }
        ?>

<script src="https://js.stripe.com/v3/"></script>
    <script src="./assets/js/card.js"></script>