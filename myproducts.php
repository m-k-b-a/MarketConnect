<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcdb";

// Fetch product data
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest product (without ordering)
$sql = "SELECT productName, productCategory, description, price, image FROM products LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $productName = $row['productName'];
    $productCategory = $row['productCategory'];
    $productDescription = $row['description'];
    $productPrice = $row['price'];
    $productImage = $row['image'];
} else {
    // Default values if no product is found
    $productName = "No Product Available";
    $productCategory = "N/A";
    $productDescription = "No description available.";
    $productPrice = "0.00";
    $productImage = "assets/images/default-product.jpg"; // Ensure this path is correct
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Banner</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
  <link rel="stylesheet" href="assets/css/owl-carousel.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
  <style>
      .hero {
          position: relative;
          background: url('<?php echo htmlspecialchars($productImage); ?>') no-repeat center center;
          background-size: cover;
          height: 100vh;
          color: white;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          text-align: center;
          padding: 20px;
          box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.5);
      }
      .hero h1 {
          font-size: 4rem;
          margin: 0;
      }
      .hero p {
          font-size: 1.5rem;
      }
      .hero span {
          font-size: 2rem;
          font-weight: bold;
      }
  </style>
</head>
<body>

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

<!-- Hero Section -->
<div class="hero">
  <h1><?php echo htmlspecialchars($productName); ?></h1>
  <p><?php echo htmlspecialchars($productDescription); ?></p>
  <span>$<?php echo htmlspecialchars($productPrice); ?></span>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/isotope.js"></script>
<script src="assets/js/accordions.js"></script>
</body>
</html>
