<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcdb";

$success = false; // Initialize success variable

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Establish PDO connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the student ID already exists in the database
        $stmt = $pdo->prepare("SELECT * FROM businessdashboard WHERE Student_ID = :Student_ID");
        $stmt->bindParam(':Student_ID', $_POST['Student_ID']);
        $stmt->execute();
        $existing_record = $stmt->fetch();

        if ($existing_record) {
            // If a record with the same student ID exists, update it
            $stmt = $pdo->prepare("UPDATE businessdashboard 
                                   SET Full_Name = :Full_Name, Business_Name = :Business_Name, Description = :Description, University = :University, 
                                   Mobile_Number = :Mobile_Number, Address = :Address, Zip_Code = :Zip_Code, 
                                   State_Region = :State_Region, Country = :Country, School_Email = :School_Email 
                                   WHERE Student_ID = :Student_ID");
        } else {
            // If no record with the same student ID exists, insert new information
            $stmt = $pdo->prepare("INSERT INTO businessdashboard (Full_Name, Business_Name, Description, University, Student_ID, 
                                   Mobile_Number, Address, Zip_Code, State_Region, Country, School_Email) 
                                   VALUES (:Full_Name, :Business_Name, :Description, :University, :Student_ID, 
                                   :Mobile_Number, :Address, :Zip_Code, :State_Region, :Country, :School_Email)");
        }
// *** InMake a force log out for when the student tries to enter the student id to chnage info/ update products and it fails to enter it in correctly if it fails 3 times ***
        // Bind parameters
        $stmt->bindParam(':Full_Name', $_POST['Full_Name']);
        $stmt->bindParam(':Business_Name', $_POST['Business_Name']);
        $stmt->bindParam(':Description', $_POST['Description']);
        $stmt->bindParam(':University', $_POST['University']);
        $stmt->bindParam(':Student_ID', $_POST['Student_ID']);
        $stmt->bindParam(':Mobile_Number', $_POST['Mobile_Number']);
        $stmt->bindParam(':Address', $_POST['Address']);
        $stmt->bindParam(':Zip_Code', $_POST['Zip_Code']);
        $stmt->bindParam(':State_Region', $_POST['State_Region']);
        $stmt->bindParam(':Country', $_POST['Country']);
        $stmt->bindParam(':School_Email', $_POST['School_Email']);

        // Execute the statement
        $stmt->execute();

        $success = true; // Set success variable to true on successful save
        
        // Display alert if successful
        ?>
        <script>
        
        alert("Profile saved successfully");
        </script>
        <?php
    } catch (PDOException $e) {
        // Handle database connection errors
        echo "Error: " . $e->getMessage();
    }
}


// Fetch profile data to display
try {
    // Establish PDO connection again for the SELECT query
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SELECT statement for school_email
    $sql = "SELECT school_email FROM business_owners LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Initialize email variable
    $email = "noemail@example.com"; // Default email in case no result is found

    // Fetch the row
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Get the email
        $email = $row["school_email"];
    }

    // Prepare SELECT statement for fullname
    $sql = "SELECT fullname FROM business_owners LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Initialize name variable
    $name = "No Name"; // Default name in case no result is found

    // Fetch the row
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Get the name
        $name = $row["fullname"];
    }

} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
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

    <script>
    // Function to populate the dropdown with countries
    function populateCountries() {
        const countries = ["USA", "UK", "Canada", "Mexico", "Brazil"]; // Add more countries as needed
        const select = document.getElementById("countrySelect");
        countries.forEach(country => {
            const option = document.createElement("option");
            option.text = country;
            option.value = country;
            select.appendChild(option);
        });
    }

    // Call the function to populate the dropdown
    populateCountries();
    </script>

    <!-- JavaScript to show alert on successful form submission -->
    <!--
        <script>
    <?php if ($success) : ?>
    alert("Profile saved successfully");
    <?php endif; ?>
    </script> 
    -->
    

    <!-- Vertical nav bar -->
    <style>
        /* Additional CSS styles for the vertical navigation bar */
        .vertical-menu {
            width: 200px;
        }
        .vertical-menu a {
            background-color: #f8f9fa;
            color: #343a40;
            display: block;
            padding: 12px;
            text-decoration: none;
        }
        /* Change the hover color to light purple */
        .vertical-menu a:hover {
            background-color: #CBC3E3; /* Light purple */
            color: #343a40; /* Change text color back to the original */
        }
    </style>
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

<!--Profile Section Start-->
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
                    <h4 class="text-right">Edit Your Business</h4>
                </div>
                <form action="businessDashboard.php" method="POST">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Full Name</label><input type="text" class="form-control" placeholder="Full Name" name="Full_Name" required></div>
                        <div class="col-md-6"><label class="labels">Business Name</label><input type="text" class="form-control" placeholder="Business Name" name="Business_Name" required></div>
                        <div class="col-md-6"><label class="labels">Business Description</label><input type="text" class="form-control" placeholder="Business Description" name="Description" required></div>
                        
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">University</label><input type="text" class="form-control" placeholder="University" name="University" required></div>
                        <div class="col-md-6"><label class="labels">Student ID</label><input type="text" class="form-control" placeholder="Student ID" name="Student_ID" required></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="Mobile Number" name="Mobile_Number" required></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="Address" name="Address" required></div>
                        <div class="col-md-12"><label class="labels">Zip Code</label><input type="text" class="form-control" placeholder="Zip Code" name="Zip_Code" required></div>


                         </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" name="State_Region" placeholder="state"></div>
                </div>
                <div class="col-md-6">
  <label class="labels">Country</label>
  <select id="countrySelect" class="form-control" name = "Country" required>
    <option value="" selected disabled>Select a country</option>
    <option value="USA">USA</option>
    <option value="UK">UK</option>
    <option value="Canada">Canada</option>
    <option value="Mexico">Mexico</option>
    <option value="Brazil">Brazil</option>
    <!-- Add more countries as needed -->
    </select>
</div>
<div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>

        <div class="col-md-4">

    <!-- Vertical navigation bar -->
    <div class="vertical-menu">
        <a href="#" class="active">Business Dashboard</a>

        <!--<a href="myproductsinfo.php">My Products Info</a>-->

        <a href="insert_product.php">Add Products</a>
        <a href="myproducts.php">My Products</a>
        <a href="my_calendar.php">My Calendar</a>
    </div>
</div>

    
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!--Profile Section End-->
</body>
</html>
