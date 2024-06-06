
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userDashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" href="img/mainMarket_Connect.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/mainMarket_Connect.png"> 
</head>
<body onload="load()">
<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow" style="padding: 10px;">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-success logo h1 align-self-center" href="index.php" style="width: 240px; height: 90px; background: url('img/mainMarket_Connect.png') no-repeat center center; background-size: contain;"></a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto" style="margin-bottom: 0;">
                    <li class="nav-item" style="margin-right: 10px;">
                        <a class="nav-link" href="foryou.php">FOR YOU</a>
                    </li> 
                    <li class="nav-item" style="margin-right: 10px;">
                        <a class="nav-link" href="locatorplus.php">LOCATE</a>
                    </li>
                    <li class="nav-item" style="margin-right: 10px;">
                        <a class="nav-link" href="logincode/loginUser.php">LOG IN/SIGN UP</a>
                    </li>
                    <li class="nav-item" style="margin-right: 10px;">
                        <a class="nav-link" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item" style="margin-right: 10px;">
                        <a class="nav-link" href="contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item" style="margin-right: 10px;">
                        <a class="nav-link" href="userDashboard.php">MY PROFILE</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Close Header -->











<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="background-color: #480898;">
    <div class="carousel-item active">
      <div class="container">
        <div class="row p-5">
          <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
            <img class="img-fluid" src="img/mainMarket_Connect.png" alt="" style="width: 600px; height: 300px;">
          </div>
          <div class="col-lg-6 mb-0 d-flex align-items-center">
            <div class="text-align-left align-self-center">
              <h1 class="h1" style="color: #ffffff;"><b>Welcome</b> to Market Connect!</h1>
              <h3 class="h2" style="color: #ffffff;">Your one-stop shop for advertising and buying. For students, by students. </h3>
              <p style="color: #ffffff;">
                We are committed to supporting the growth of student-owned businesses while also helping students find affordable products and services within the comfort of their college campus.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="container">
        <div class="row p-5">
          <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
            <img class="img-fluid" src="img/pexels-photo-17758247.jpeg" alt="Jay's Crochet Plushies" style="width: 500px; height: 500px;">
          </div>
          <div class="col-lg-6 mb-0 d-flex align-items-center">
            <div class="text-align-left align-self-center">
              <h1 class="h1" style="color: #ffffff;">JAY'S CROCHET PLUSHIES</h1>
              <h3 class="h2" style="color: #FFFFFF;">Drexel University</h3>
              <p style="color: #FFFFFF;">
                Carefully crocheted plushies made by students in Kelly Hall. Place Your Order Today!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="container">
        <div class="row p-5">
          <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
            <img class="img-fluid" src="img/painting.jpeg" alt="Jay's Crochet Plushies" style="width: 500px; height: 500px;">
          </div>
          <div class="col-lg-6 mb-0 d-flex align-items-center">
            <div class="text-align-left">
              <h1 class="h1" style="color: #FFFFFF;">PALETTE SCHOLAR</h1>
              <h3 class="h2" style="color: #FFFFFF;">Temple University</h3>
              <p style="color: #FFFFFF;">
                Get custom made paintings from Temple Owls!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
    <i class="fas fa-chevron-left" style="color: #FFFFFF;"></i>
  </a>
  <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
    <i class="fas fa-chevron-right" style="color: #FFFFFF;"></i>
  </a>
</div>
<!-- End Banner Hero -->



    <!-- Start "Select Your Campus" -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Select Your Campus</h1>
                <p>
                   Find affordable student owned products and services right from your dorm
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">

                <a href="./college-sections/drexel.php"><img src="./img/drexel_logo.png" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Drexel</h5>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">

                <a href="./college-sections/upenn.php"><img src="./img/penn_logo.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">UPenn</h2>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">

                <a href="./college-sections/temple.php"><img src="./img/temple_logo.png" class="rounded-circle img-fluid border"></a>


                <h2 class="h5 text-center mt-3 mb-3">Temple</h2>
            </div>
        </div>
    </section>
    <!-- End "Select Your Campus" -->



 
    <!-- Start Script -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/templatemo.js"></script>
    <script src="js/custom.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- End Script -->

</body>

</html>
