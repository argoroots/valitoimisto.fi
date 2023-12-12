<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $subject = $_POST['subject'] ?? 'Form Submission';
    $toEmail = 'argo@roots.ee'; // Change this to the recipient's email address
    $fromEmail = $_POST['email'] ?? 'sender@example.com'; // Change this to a default sender email or adjust the form field name

    // Build email headers
    $headers = "From: $fromEmail\r\n";
    $headers .= "Reply-To: $fromEmail\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=boundary\r\n";

    // Build email body
    $body = "--boundary\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";

    // Add text content from POST parameters
    foreach ($_POST as $key => $value) {
        $body .= "$key: $value\r\n";
    }

    // Process file uploads
    foreach ($_FILES as $fileKey => $file) {
        $filename = $file['name'];
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
