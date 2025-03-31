<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $phone = htmlspecialchars($_POST['Phone']);
    $message = htmlspecialchars($_POST['Message']);

    // Set the recipient email address (your email)
    $to = "youremail@example.com"; // Replace with your email address
    $subject = "New Contact Form Submission";

    // Compose the email content
    $body = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
    </head>
    <body>
        <h2>Contact Form Details</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Message:</strong><br>$message</p>
    </body>
    </html>
    ";

    // Set email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us! We will get back to you soon.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>
