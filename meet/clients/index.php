<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="" href="../style/fonts/all.min.css">
    <script src="../style/bootstrap/js/bootstrap.bundle.js"></script>
    <title>Welcome to Digital Butcher</title>
</head>
<body>
     
<!-- start menubar here-->
<nav class="navbar navbar-expand-lg text-bg-primary p-3">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Metuan Butcher</a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" style="color: white;">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="service.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../forms/login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- starting body content here-->
<!-- simple explanation of our websites -->
<div class="container">
    <div class="row">
        <div id="carouselExampleCaptions" class="carousel slide py-1 my-1">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../images/meet.png" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../images/chicken.jpg" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../images/octopus.jpg" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
  
    <!-- Added div elements for the cards -->
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
            <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">About Us</h2>
                <p class="card-text text-justify">
                    At Metuan Butcher, we are passionate about providing the highest quality meats to our customers. With years of experience in the industry, we take pride in offering a wide selection of fresh and carefully sourced meat cuts.
                </p>
                <p class="card-text text-justify">
                    Our team of skilled butchers is dedicated to ensuring that every cut of meat meets our rigorous standards for taste, texture, and freshness. We work closely with local farmers and suppliers to ensure that our meats are ethically sourced and of the highest quality.
                </p>
                <p class="card-text text-justify">
                    From juicy steaks to tender roasts, we have a wide range of options to satisfy every taste and preference. We believe in providing exceptional customer service and are always ready to assist you with any questions or special requests.
                </p>
                <p class="card-text text-justify">
                    Whether you're a seasoned home cook or a professional chef, we strive to be your go-to destination for premium meats. Visit our store today and experience the difference of Metuan Butcher and other Local Butchers.
                </p>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
            <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">How to Use Our System</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Step 1: Browse Our Products</h5>
                                <p class="card-text">Explore our wide range of fresh meats, poultry, and seafood available for purchase by signing up with the system.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Step 2: Add to Cart</h5>
                                <p class="card-text">Select the desired items and add them to your shopping cart for easy checkout.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Step 3: Review and Confirm</h5>
                                <p class="card-text">Review your order details, make any necessary adjustments, and confirm your purchase.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Step 4: Make Payment</h5>
                                <p class="card-text">Proceed to the secure payment gateway and complete your transaction.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-text text-justify">
                    Our system is designed to provide a seamless and user-friendly experience. Simply follow these steps to enjoy our high-quality meats delivered to your doorstep.
                </p>
                <p class="card-text text-justify">
                    If you have any questions or need assistance at any point, our customer support team is available to help. We strive to make your online meat shopping experience convenient and enjoyable.
                </p>
                <p class="card-text text-justify">
                    Start exploring our products and place your order today!
                </p>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
            <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Meet the Team</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="../images/blackbutcher.webp"card-img-top rounded-circle" alt="Team Member 1">
                            <div class="card-body">
                                <h5 class="card-title">Elia Machua</h5>
                                <p class="card-text">Butcher</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="../images/delivery.jpg" class="card-img-top" alt="Team Member 2">
                            <div class="card-body">
                                <h5 class="card-title">Jescah Mark</h5>
                                <p class="card-text">Delivery Person</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="../images/noel.jpg" class="card-img-top" alt="Team Member 3">
                            <div class="card-body">
                                <h5 class="card-title">Noel Evod</h5>
                                <p class="card-text">Master Butcher</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-text text-justify">
                    Our team at Metuan Butcher consists of experienced professionals who are passionate about delivering the finest quality meats to our customers. Each member of our team brings a unique skill set and expertise to ensure that every cut of meat meets the highest standards of excellence.
                </p>
                <p class="card-text text-justify">
                    From our skilled butchers who meticulously prepare each cut, to our knowledgeable delivery guy who can deliver the meat on time without delays, and our master butcher who oversees the entire process, our team is committed to delivering exceptional quality and service.
                </p>
                <p class="card-text text-justify">
                    We take pride in our craftsmanship and dedication to the art of butchery. Meet our team in person and let us assist you in finding the perfect cut for your culinary creations. We look forward to serving you at Metuan Butcher.
                </p>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>

    

    <!-- starting footer here -->
    <footer class="bg-primary text-white py-2 body2">
        <div class="container">
            <div class="row text-center">
                <p>All rights are reserved &copy; Noel Digital butcher</p>
            </div>
        </div>
    </footer>
</body>
</html>

<script>
  // JavaScript code to automatically move the carousel
  var carousel = document.getElementById('carouselExampleCaptions');
  var carouselItems = carousel.querySelectorAll('.carousel-item');
  var currentIndex = 0;

  function moveCarousel() {
    // Remove the 'active' class from all items
    for (var i = 0; i < carouselItems.length; i++) {
      carouselItems[i].classList.remove('active');
    }

    // Add the 'active' class to the next item
    currentIndex++;
    if (currentIndex >= carouselItems.length) {
      currentIndex = 0;
    }
    carouselItems[currentIndex].classList.add('active');
  }

  // Move the carousel every 3 seconds
  setInterval(moveCarousel, 5000);
</script>
