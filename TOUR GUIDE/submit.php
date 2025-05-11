<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name       = htmlspecialchars($_POST['name']);
    $email      = htmlspecialchars($_POST['email']);
    $tour_type  = htmlspecialchars($_POST['tour_type']);
    $number     = htmlspecialchars($_POST['number']);
    $from_date  = htmlspecialchars($_POST['from_date']);
    $to_date    = htmlspecialchars($_POST['to_date']);
    $people     = htmlspecialchars($_POST['people']);

    // Receiver email address
    $to = "pasindupramodya20@yahoo.com"; // <-- change this to your actual email

    // Subject line
    $subject = "New Tour Booking Request from $name";

    // Message body
    $message = "
    New booking request details:\n\n
    Name: $name
    Email: $email
    Tour Type: $tour_type
    Phone Number: $number
    From Date: $from_date
    To Date: $to_date
    Number of People: $people
    ";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<h3>Thank you! Your booking details were sent successfully.</h3>";
    } else {
        echo "<h3>Oops! Something went wrong, and we couldn't send your request.</h3>";
    }
} else {
    echo "Invalid request.";
}
?>
