<!DOCTYPE html>
<html lang="en">

<head>
    <title>MarketConnect - ForYou Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="img/mainMarket_Connect.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/mainMarket_Connect.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo.css">
    <link rel="stylesheet" href="foryou.css">
    

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
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





<!-- Start Content -->
<div class="wrapper">
    <div class="sidebar">
        <button id="toggleSearch">Toggle Search</button>
        <div id="search_container" class="hidden-search">
            <input type="search" id="search-input" placeholder="Search business here" />
            <button id="search">Search</button>
        </div>
        <div id="buttons">
            <button class="button-value" data-category="All">All</button>
            <button class="button-value" data-category="Drexel">Drexel</button>
            <button class="button-value" data-category="UPenn">UPenn</button>
            <button class="button-value" data-category="Temple">Temple</button>
            <button class="button-value" data-category="Fashion">Fashion</button>
            <button class="button-value" data-category="Beauty">Beauty</button>
            <button class="button-value" data-category="Art">Art</button>
        </div>
    </div>

    <div id="products">
        <div class="product" data-category="Drexel Art All">
            <img src="img/pexels-photo-17758247.jpeg" alt=" Jay's Crochet Plushies">
            <h3>Jay's Crochet Plushies</h3>
        </div> 



        <div class="product" data-category="UPenn Art All">
        <a href="shop-single.html">
            <img src="img/painting.jpeg" alt="Palette Scholar">
        </a>
            <h3>Palette Scholar</h3>
        </div>


        <div class="product" data-category="Drexel Fashion All">
            <img src="img/LIB.jpeg" alt="LIB clothing Inc">
            <h3>LIB clothing Inc</h3>
            
        </div>

        
        <div class="product" data-category="Temple Beauty All">
            <img src="img/makeup.jpeg" alt="Makeup">
            <h3> Makeup Inc.</h3>
        </div>
        
        <!-- Add more products with data-category attribute -->
    </div>
</div>
<!-- End Content -->





    <!-- Start Script -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/templatemo.js"></script>
    <script src="js/custom.js"></script>
    <script src="foryou.js"></script>
    <!-- End Script -->
</body>

</html>