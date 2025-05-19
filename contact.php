<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email settings
    $to = "godrivecontact@gmail.com"; // Your email address
    $subject = "Contact Form Submission from $firstName $lastName";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email body
    $body = "You have received a new message from the contact form on your website.\n\n";
    $body .= "First Name: $firstName\n";
    $body .= "Last Name: $lastName\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Your message is on its way! Thank you for reaching out to us.');</script>";
    } else {
        echo "<script>alert('Failed to send message. Please try again later.');</script>";
    }

    // Redirect back to the home page
    header("Location: homepage.html");
    exit();
} else {
    // Redirect back to the contact page if the request method is not POST
    header("Location: contact.html");
    exit();
}
?>
