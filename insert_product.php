<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcdb";

try {
    // Establish PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    echo json_encode(["success" => false, "error" => "Connection failed: " . $e->getMessage()]);
    exit;
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data with default values
    $productIdToUpdate = $_POST['product_id'] ?? null;
    $productName = $_POST['productName'] ?? '';
    $productCategory = $_POST['productCategory'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '0.00';
    $image = $_POST['image'] ?? '';

    if ($productIdToUpdate) {

        try {
            // Prepare SQL statement to update product information
            $stmt = $conn->prepare("UPDATE products SET productName = :name, productCategory = :category, description = :description, price = :price, image = :image WHERE product_id = :id");
            // Bind parameters to the prepared statement
            $stmt->bindParam(':product_id', $productIdToUpdate);
            $stmt->bindParam(':name', $productName);
            $stmt->bindParam(':category', $productCategory);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);
            // Execute the prepared statement
            $stmt->execute();
            // Send a success response back to the frontend
            echo json_encode(["success" => true, "message" => "Product updated successfully"]);
        } catch (PDOException $e) {
            // If an error occurs, send an error response back to the frontend
            echo json_encode(["success" => false, "error" => $e->getMessage()]);
        }
        // Insert new product
        
    } else {
        // Update existing product
          // Insert new product
          try {
            // Prepare SQL statement to insert data into the products table
            $stmt = $conn->prepare("INSERT INTO products (productName, productCategory, description, price, image) VALUES (:name, :category, :description, :price, :image)");
            // Bind parameters to the prepared statement
            $stmt->bindParam(':name', $productName);
            $stmt->bindParam(':category', $productCategory);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);
            // Execute the prepared statement
            $stmt->execute();
            // Get the last inserted product ID
            $productId = $conn->lastInsertId();
            // Send a success response back to the frontend with the product ID
            echo json_encode(["success" => true, "productId" => $productId]);
        } catch (PDOException $e) {
            // If an error occurs, send an error response back to the frontend
            echo json_encode(["success" => false, "error" => $e->getMessage()]);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userDashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" href="../img/mainMarket_Connect.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/mainMarket_Connect.png"> 
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

<!-- Insert Product Section Start -->
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right"></div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Add or Update a Product</h4>
                </div>
                <form id="productForm" action="" method="POST">
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Product ID (Leave blank for new product)</label>
                            <input type="text" class="form-control" name="productIdToUpdate" placeholder="Enter Product ID">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Product Name</label>
                            <input type="text" class="form-control" name="productName" placeholder="Enter Product Name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Product Category</label>
                            <select class="form-select" name="productCategory" required>
                                <option selected disabled>Select Category</option>
                                <option value="art">Art</option>
                                <option value="beauty">Beauty</option>
                                <option value="food">Food</option>
                                <option value="jewelry">Jewelry</option>
                                <option value="tech">Tech</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Enter Product Description" required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Price</label>
                            <input type="number" step="0.01" class="form-control" name="price" placeholder="Enter Product Price" required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Image URL</label>
                            <input type="text" class="form-control" name="image" placeholder="Enter Image URL">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

