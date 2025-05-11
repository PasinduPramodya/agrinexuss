<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $tour_type  = $_POST['tour_type'];
    $number     = $_POST['number'];
    $from_date  = $_POST['from_date'];
    $to_date    = $_POST['to_date'];
    $people     = $_POST['people'];

    // Email setup
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'maxpps123@gmail.com';       // 🔁 Replace with your Gmail
        $mail->Password   = 'max123';         // 🔁 Use App Password (not Gmail password)
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('maxpps123@gmail.com', 'Tour Booking'); // sender
        $mail->addAddress('maxpps123@gmail.com');              // recipient (your inbox)

        $mail->isHTML(true);
        $mail->Subject = "New Tour Booking by $name";
        $mail->Body    = "
            <h3>New Booking Request</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Tour Type:</strong> $tour_type</p>
            <p><strong>Phone Number:</strong> $number</p>
            <p><strong>From:</strong> $from_date</p>
            <p><strong>To:</strong> $to_date</p>
            <p><strong>People Going:</strong> $people</p>
        ";

        $mail->send();
        echo "<h3>Success! Booking details sent to your email.</h3>";
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>
