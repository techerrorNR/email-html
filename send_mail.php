<?php
session_start();

function sanitizeInput($input, $filter) {
    return filter_input(INPUT_POST, $input, $filter);
}

function validateInputs($name, $email, $message) {
    return $name && $email && $message && filter_var($email, FILTER_VALIDATE_EMAIL);
}

function sendEmail($to, $subject, $body, $headers) {
    if (!mail($to, $subject, $body, $headers)) {
        error_log("Failed to send email: " . error_get_last()['message']);
        return false;
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation failed");
    }

    $name = sanitizeInput('name', FILTER_SANITIZE_STRING);
    $email = sanitizeInput('email', FILTER_SANITIZE_EMAIL);
    $message = sanitizeInput('message', FILTER_SANITIZE_STRING);

    if (!validateInputs($name, $email, $message)) {
        $_SESSION['mail_sent'] = false;
        $_SESSION['mail_error'] = "Invalid input. Please check your entries.";
        header("Location: index.php");
        exit();
    }

    $to = 'rakeshy4013@gmail.com';
    $subject = 'New Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    
    $headers = "From: yourwebsite@example.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (sendEmail($to, $subject, $body, $headers)) {
        $_SESSION['mail_sent'] = true;
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['mail_sent'] = false;
        $_SESSION['mail_error'] = "Email sending failed. Please try again later.";
        header("Location: index.php");
        exit();
    }
}

// If accessed directly without POST data, redirect to index
header("Location: index.php");
exit();
?>