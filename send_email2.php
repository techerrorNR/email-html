<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Require the Composer autoloader
require 'vendor/autoload.php';

// Function to sanitize input
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

// Function to send email
function sendEmail($to, $subject, $body, $fromEmail) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rakeshy4013@gmail.com'; // Your Gmail address
        $mail->Password   = 'RAMukesh4013@'; // Your Gmail password or App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($fromEmail);
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $message = sanitizeInput($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid input. Please check your entries.']);
        exit;
    }

    $to = 'rakeshy4013@gmail.com'; // Your email address
    $subject = 'New Contact Form Submission';
    $body = "Name: $name<br>Email: $email<br>Message:<br>$message";

    if (sendEmail($to, $subject, $body, $email)) {
        echo json_encode(['success' => true, 'message' => 'Email sent successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to send email. Please try again later.']);
    }
    exit;
}
?>