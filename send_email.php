<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $phone = htmlspecialchars($_POST['Phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['Message']);

    // Set recipient email address
    $to = "ashlesha@napadance.in"; // Replace with your email address
    $email_subject = "New Enquiry Form Submission";

    // Compose email content
    $body = "
    <html>
    <head>
        <title>New Enquiry Form Submission</title>
    </head>
    <body>
        <h2>Contact Form Details</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong><br>$message</p>
    </body>
    </html>
    ";

    // Set email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Send email
    if (mail($to, $email_subject, $body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Thank you for contacting us! We will get back to you soon."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Sorry, there was an error sending your message. Please try again later."]);
    }
}
?>
