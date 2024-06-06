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











  <head>
    <title>Locator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="locatorplus.css" rel="stylesheet">
    <script>
      const CONFIGURATION = {
        "locations": [
          {"title":"Kelly Hall","address1":"203 N 34th St","address2":"Philadelphia, PA 19104, USA","coords":{"lat":39.959311673409616,"lng":-75.19030409140167},"placeId":"ChIJr38UE1LGxokRmzp3fqDFoA4"},
          {"title":"Millennium Hall, Drexel University","address1":"223 N 34th St","address2":"Philadelphia, PA 19104, USA","coords":{"lat":39.95969500158926,"lng":-75.19043122209013},"placeId":"ChIJHR2Ob1LGxokRQeRCLxcJqco"},
          {"title":"North Hall","address1":"3200 Race St","address2":"Philadelphia, PA 19104, USA","coords":{"lat":39.958758864745725,"lng":-75.18833302023775},"placeId":"ChIJQc-K7E3GxokRdd_OzRXVJYY"},
          {"title":"Bentley Hall","address1":"3301 Arch St","address2":"Philadelphia, PA 19104, USA","coords":{"lat":39.95834604233192,"lng":-75.18972009325408},"placeId":"ChIJ-3TG5FPHxokRX_J-EKyT-ms"},
          {"title":"Towers Hall","address1":"101 N 34th St","address2":"Philadelphia, PA 19104, USA","coords":{"lat":39.95818602375051,"lng":-75.19073115092623},"placeId":"ChIJXUuFHlLGxokR6P2a3kW5eqY"},
          {"title":"Race Hall","address1":"Race Street Hall","address2":"3300 Race St, Philadelphia, PA 19104, USA","coords":{"lat":39.958657917553836,"lng":-75.18973560859833},"placeId":"ChIJUf0A9k3GxokRpEmd9bOvg6c"}
        ],
        "mapOptions": {"center":{"lat":38.0,"lng":-100.0},"fullscreenControl":true,"mapTypeControl":false,"streetViewControl":false,"zoom":4,"zoomControl":true,"maxZoom":17,"mapId":""},
        "mapsApiKey": "AIzaSyCWt5BVvZPzLz4sQjbbJBlYlMar5tCkM7s",
        "capabilities": {"input":true,"autocomplete":true,"directions":false,"distanceMatrix":true,"details":false,"actions":false}
      };

    </script>
    <script src="locatorplus.js" type="module"></script>
  </head>
  <body>
    
    <script type="module" src="https://unpkg.com/@googlemaps/extended-component-library@0.6"></script>


    <gmpx-api-loader key="AIzaSyCWt5BVvZPzLz4sQjbbJBlYlMar5tCkM7s" solution-channel="GMP_QB_locatorplus_v10_cABD"></gmpx-api-loader>
    <gmpx-store-locator map-id="DEMO_MAP_ID"></gmpx-store-locator>
  </body>

</html>

