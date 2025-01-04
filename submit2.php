<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = ""; // Set your MySQL root password here
$dbname = "cloud_portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email']; // Correctly assign the email
$password1 = $_POST['password1']; // Correctly assign the password
$password2 = $_POST['password2'];
// Prepare SQL statement
$sql = "INSERT INTO sign_up (name,email, password1,password2) VALUES (?, ?,?,?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("ssss", $name,$email, $password1,$password2);

// Execute and check for success
if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
