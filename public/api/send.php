<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate form data
    $subject = filter_var($_POST['subject'] ?? 'Form Submission', FILTER_SANITIZE_STRING);
    $toEmail = 'recipient@example.com'; // Change this to the recipient's email address
    $fromEmail = filter_var($_POST['email'] ?? 'sender@example.com', FILTER_SANITIZE_EMAIL);
    $fromEmail = filter_var($fromEmail, FILTER_VALIDATE_EMAIL) ? $fromEmail : 'sender@example.com';

    // Set CSP headers
    header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self';");

    // Build email headers
    $headers = "From: $fromEmail\r\n";
    $headers .= "Reply-To: $fromEmail\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=boundary\r\n";

    // Build email body
    $body = "--boundary\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";

    // Add sanitized text content from POST parameters
    foreach ($_POST as $key => $value) {
        $key = filter_var($key, FILTER_SANITIZE_STRING);
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        $body .= "$key: $value\r\n";
    }

    // Process file uploads
    foreach ($_FILES as $fileKey => $file) {
        $filename = filter_var($file['name'], FILTER_SANITIZE_STRING);
        $fileContent = file_get_contents($file['tmp_name']);
        $body .= "--boundary\r\n";
        $body .= "Content-Type: application/octet-stream\r\n";
        $body .= "Content-Disposition: attachment; filename=\"$filename\"\r\n\r\n";
        $body .= $fileContent . "\r\n";
    }

    // Close email body
    $body .= "--boundary--\r\n";

    // Send email
    if (mail($toEmail, $subject, $body, $headers)) {
        echo 'Email sent successfully.';
    } else {
        echo 'Error sending email.';
    }
} else {
    echo 'Invalid request method.';
}
?>
