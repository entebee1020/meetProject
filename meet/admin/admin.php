<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* Adjust the sidebar width and color as desired */
    .sidebar {
      width: 250px;
      background-color: #f8f9fa;
      padding: 20px;
      float: left;
      margin-top: 20px;
    }
    
    /* Adjust the button styles as desired */
    .sidebar-btn {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }
    
    .sidebar-btn i {
      margin-right: 10px;
    }
    .navbar{
      background-color: cyan;
      padding: 10px;
      text-align: center;
    }
    .footer{
      background-color: cyan;
      color: black;
      font-weight: bold;
      padding: 20px;
    }
    .p{
      text-decoration: underline;
    }
    /* Added CSS for sticky footer */
    html, body {
      height: 100%;
    }
    .container {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }
    .content {
      flex: 1 0 auto;
    }
  </style>
  <title>ADMIN DASHBOARD</title>
  <script>
    function displayLogoutMessage() {
      alert("Admin is successfully logged out. Welcome again to Metuan Butcher System.");
      window.location.href = '../forms/login.php';
    }
  </script>
</head>
<body>
  <div class="navbar">
    <h3>Metuan Online Butcher System</h3>
  </div>

  <div class="container">
    <div class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="sidebar">
            <div class="sidebar-btn">
              <i class="fas fa-tachometer-alt"></i>
              <button type="button" class="btn btn-light" onclick="window.location.href = '../admin/admin.php';">Dashboard</button>
            </div>
            <div class="sidebar-btn">
              <a href="../admin/add_product.php" class="btn btn-light">
                <i class="fas fa-plus"></i>
                Add Product
              </a>
            </div>
            <div class="sidebar-btn">
              <i class="fas fa-history"></i>
              <button type="button" class="btn btn-light" onclick="window.location.href = '../admin/order_history.php';">Order History</button>
            </div>
            <div class="sidebar-btn">
              <i class="fas fa-list"></i>
              <button type="button" class="btn btn-light" onclick="window.location.href = '../admin/existing_products.php';">Existing Products</button>
            </div>
            <div class="sidebar-btn">
              <i class="fas fa-envelope"></i>
              <button type="button" class="btn btn-light" onclick="window.location.href = '../admin/view_message.php';">View Message</button>
            </div>
            <div class="sidebar-btn">
              <i class="fas fa-reply"></i>
              <button type="button" class="btn btn-light" onclick="window.location.href = '../admin/respond.php';">Respond Message</button>
            </div>
            <div class="sidebar-btn">
              <i class="fas fa-clipboard"></i>
              <button type="button" class="btn btn-light" onclick="window.location.href = '../admin/inventory_control.php';">Inventory Control</button>
            </div>

            <div class="sidebar-btn">
              <i class="fas fa-sign-out-alt"></i>
              <button type="button" class="btn btn-light" onclick="displayLogoutMessage();">Logout</button>
            </div>
            
          </div>
        </div>
        <div class="col-md-9">
          <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
              <div class="card bg-primary text-white">
                <div class="card-body">
                  <h5 class="card-title">ADD PRODUCT</h5>
                  <i class="fas fa-plus fa-5x"></i>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card bg-success text-white">
                <div class="card-body">
                  <h5 class="card-title">EXISTING PRODUCTS</h5>
                  <i class="fas fa-list fa-5x"></i>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card bg-info text-white">
                <div class="card-body">
                  <h5 class="card-title">ORDER HISTORY</h5>
                  <i class="fas fa-history fa-5x"></i>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card bg-secondary text-white">
                <div class="card-body">
                  <h5 class="card-title">MESSAGE</h5>
                  <i class="fas fa-envelope fa-5x"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer goes here -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p>&copy; <?php echo date('Y'); ?> Metuan Online Butcher System. </p>
            <p>Designed by Noel Evod Lyamuya</p>
          </div>
        </div>
      </div>
    </footer>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
