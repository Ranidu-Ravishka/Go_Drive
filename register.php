<?php
session_start();

$host = 'localhost';
$db = 'godrive';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users_for_login (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Congratulations! You have successfully signed up! Welcome aboard!');</script>";
        header("Location: homepage.html");
        exit();
    } else {
        echo "<script>alert('Error: Could not register. Please try again.');</script>";
    }
}

$conn->close();
?>
