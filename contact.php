<?php
// send_feedback.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $feedback = htmlspecialchars($_POST['feedback']);

    // Validate the data (you can add more validation if needed)
    if (empty($name) || empty($feedback)) {
        echo "All fields are required!";
        exit;
    }

    // Email parameters
    $to = "your_email@example.com";  // Replace with your email address
    $subject = "New Feedback from " . $name;
    $message = "You have received new feedback.\n\n".
               "Name: $name\n".
               "Feedback: $feedback";

    // Headers
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: no-reply@yourdomain.com\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your feedback!";
    } else {
        echo "Sorry, there was an issue sending your feedback.";
    }
} else {
    echo "Invalid request!";
}
?>
