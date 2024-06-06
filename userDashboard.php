<?php
// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection settings
$db_host = "localhost";
$username = "root";
$password = "";
$db_name = "mcdb";

$success = false; // Initialize success variable

// Establish PDO connection
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection errors
    error_log("Connection error: " . $e->getMessage());
    die("Database connection failed");
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Check if the record exists in the userdashboard table
        $stmt = $pdo->prepare("SELECT * FROM users WHERE student_id = :student_id");
        $stmt->bindParam(':student_id', $_POST['student_id']);
        $stmt->execute();
        $existing_record = $stmt->fetch();

        if ($existing_record) {
            // If a record with the same student ID exists, update it
            $stmt = $pdo->prepare("UPDATE userdashboard 
                                   SET Full_Name = :Full_Name, Mobile_Number = :Mobile_Number, Address = :Address, Zip_Code = :Zip_Code, Country = :Country, State_Region = :State_Region
                                   WHERE student_id = :student_id");
        } else {
            // If no record with the same student ID exists, insert new information
            $stmt = $pdo->prepare("INSERT INTO userdashboard (student_id, Full_Name, Mobile_Number, Address, Zip_Code, Country, State_Region) 
                                   VALUES (:student_id, :Full_Name, :Mobile_Number, :Address, :Zip_Code, :Country, :State_Region)");
        }

        // Bind parameters
        $stmt->bindParam(':student_id', $_POST['student_id']);
        $stmt->bindParam(':Full_Name', $_POST['Full_Name']);
        $stmt->bindParam(':Mobile_Number', $_POST['Mobile_Number']);
        $stmt->bindParam(':Address', $_POST['Address']);
        $stmt->bindParam(':Zip_Code', $_POST['Zip_Code']);
        $stmt->bindParam(':Country', $_POST['Country']);
        $stmt->bindParam(':State_Region', $_POST['State_Region']);

        // Execute the statement
        if ($stmt->execute()) {
            $success = true; // Set success variable to true on successful save
        } else {
            echo "Failed to save profile.";
        }

        // Display alert if successful
        if ($success) {
            echo '<script>alert("Profile saved successfully");</script>';
        }
    } catch (PDOException $e) {
        // Handle database errors
        error_log("Database error: " . $e->getMessage());
        echo "An error occurred while saving the profile.";
    }
}

try {
    // Prepare SELECT statement for school_email and fullname
    $sql = "SELECT school_email, fullname FROM users LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Initialize email and name variables with default values
    $email = "noemail@example.com";
    $name = "No Name";

    // Fetch the row
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Get the email and name
        $email = $row["school_email"];
        $name = $row["fullname"];
    }

} catch (PDOException $e) {
    // Handle database connection errors
    error_log("Database error: " . $e->getMessage());
    echo "An error occurred while retrieving the profile information.";
}

// Close the connection (optional, PDO automatically closes when the script ends)
$pdo = null;
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userDashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" href="img/marketconnect_logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/marketconnect_logo.png"> 
</head>

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
                    <li class="nav-item" style="margin-right: 10px;"><a class="nav-link" href="foryou.php">FOR YOU</a></li> 
                    <li class="nav-item" style="margin-right: 10px;"><a class="nav-link" href="locatorplus.php">LOCATE</a></li>
                    <li class="nav-item" style="margin-right: 10px;"><a class="nav-link" href="logincode/loginBusiness.php"> BUS LOG IN/SIGN UP</a></li>
                    <li class="nav-item" style="margin-right: 10px;"><a class="nav-link" href="about.php">ABOUT</a></li>
                    <li class="nav-item" style="margin-right: 10px;"><a class="nav-link" href="contact.php">CONTACT</a></li>
                    <li class="nav-item" style="margin-right: 10px;"><a class="nav-link" href="userDashboard.php">MY PROFILE</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Close Header -->

<!-- Profile Section Start -->
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="../img/MBA.png">
                <span class="font-weight-bold"><?php echo htmlspecialchars($name); ?></span>
                <span class="text-black-50"><?php echo htmlspecialchars($email); ?></span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Edit Your Profile</h4>
                </div>
                <form action="userDashboard.php" method="POST">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Full Name</label><input type="text" class="form-control" placeholder="Enter Full Name" name="Full_Name" required></div>
                        <div class="col-md-6"><label class="labels">Student ID Number</label><input type="text" class="form-control" placeholder="Enter Student ID Number" name="student_id" required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="Enter Phone Number" name="Mobile_Number" required></div>
                        <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="Enter Address" name="Address" required></div>
                        <div class="col-md-12"><label class="labels">Zip Code</label><input type="text" class="form-control" placeholder="Enter Zip Code" name="Zip_Code" required></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" name="State_Region" placeholder="Enter State/Region" required></div>
                        <div class="col-md-6">
                            <label class="labels">Country</label>
                            <select id="countrySelect" class="form-control" name="Country" required>
                                <option value="" selected disabled>Select a country</option>
                                <option value="USA">USA</option>
                                <option value="UK">UK</option>
                                <option value="Canada">Canada</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Brazil">Brazil</option>
                                <!-- Add more countries as needed -->
                            </select>
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Populate Countries Script -->
<script>
  // Function to populate the dropdown with countries
  function populateCountries() {
    const countries = ["USA","UK","Canada", "Mexico", "Brazil"]; // Add more countries as needed
    const select = document.getElementById("countrySelect");
    countries.forEach(country => {
      const option = document.createElement("option");
      option.text = country;
      option.value = country;
      select.appendChild(option);
    });
  }

  // Call the function to populate the dropdown once DOM is loaded
  document.addEventListener("DOMContentLoaded", populateCountries);
</script>
</body>
</html>
