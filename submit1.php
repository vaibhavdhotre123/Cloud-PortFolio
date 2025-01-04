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
$email = $_POST['email']; // Correctly assign the email
$password = $_POST['password']; // Correctly assign the password

// Prepare SQL statement
$sql = "INSERT INTO login (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("ss", $email, $password);

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
