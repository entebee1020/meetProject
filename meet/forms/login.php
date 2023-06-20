
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="" href="../style/fonts/all.min.css">
    <script src="../style/bootstrap/js/bootstrap.bundle.js" ></script>


    <title>Online Butcher</title>
</head>
<body> 
    <!--login form starts here-->
    <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form method="post" action="../backend/login.handler.php">
        <h2>Login</h2>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="rememberMe">
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary" name="loginButton">Login</button>
        <p class="mt-3">Don't have an account? <a href="#signupModal" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</a></p>
      </form>
    </div>
  </div>
</div>

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../backend/signup.handler.php">
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail" name="email" placeholder="Enter email">
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="signupPassword" name="password" placeholder="Enter password">
          </div>
          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmpassword" placeholder="Confirm password">
          </div>
          <button type="submit" class="btn btn-primary" name="signupButton">Sign up</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>