<?php
// Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Database connection
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

// Get user email from database (assuming user is logged in and user_id is available)
$user_id = 1; // This should be dynamically set based on logged in user
$sql = "SELECT email FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user_email = '';

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_email = $row['email'];
}

// Get form data
$car_model = $_POST['car_model'];
$car_price = $_POST['car_price'];

// Prepare email
$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@example.com'; // SMTP username
    $mail->Password = 'your_password'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('your_email@example.com', 'Car Rental Service');
    $mail->addAddress($user_email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Car Rental Request Confirmation';
    $mail->Body    = "Thank you for requesting the car. Here are the details:<br><br>
                      Car Model: $car_model<br>
                      Price: $car_price";

    $mail->send();
    echo "Message has been sent";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Close connection
$conn->close();
?>
