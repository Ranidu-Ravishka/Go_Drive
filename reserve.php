<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "godrive";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$location = $_POST['location'];
$pick_up_date = $_POST['pick_up_date'];
$return_date = $_POST['return_date'];

// Insert data into database
$sql = "INSERT INTO reservations (location, pick_up_date, return_date) VALUES ('$location', '$pick_up_date', '$return_date')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
