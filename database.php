<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=mcdb", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

try {
    $sql_code = file_get_contents(__DIR__ . "/sql/createUser.sql");
    $conn->exec($sql_code);    
} catch (PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
}

            // Send confirmation email
            /*$confirmation_token = uniqid();
            $to = $email;
            $subject = "Confirmation Email";
            $message = "Click the link to confirm your email: http://yourdomain.com/confirmEmail.php?token=$confirmation_token";
            $headers = "From: marketconnectbusiness@gmail.com";
            mail($to, $subject, $message, $headers);*/

/*
$server = "localhost";
$username = "root";
$password = "root";

$conn = new Pdo("mysql:host=$server;db")

echo "Test.afafa";


session_start();


// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}


// Registration process
if (isset($_POST['register'])) {
   $email = $_POST['email'];
   $password = $_POST['password']; // You should hash the password for security


   // Insert user data into the database
   $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
   if (mysqli_query($conn, $sql)) {
       // Send confirmation email
       $confirmation_token = uniqid();
       $to = $email;
       $subject = "Confirmation Email";
       $message = "Click the link to confirm your email: http://yourdomain.com/confirmEmail.php?token=$confirmation_token";
       $headers = "From: your@example.com";
       mail($to, $subject, $message, $headers);


       // Redirect to confirmation page
       header("Location: confirmation.php");
       exit();
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
}


mysqli_close($conn);*/
?>
