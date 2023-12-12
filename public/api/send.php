<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = 'Form from valitoimisto.fi';
    $toEmail = 'argo@roots.ee';
    $fromEmail = 'valitoimisto.fi <web@valitoimisto.fi>';

    // Set CSP headers
    header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self';");

    $headers = "From: $fromEmail\r\n";
    $headers .= "Reply-To: $fromEmail\r\n";
    $boundary = md5(uniqid(rand(), true));
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

    // Build email body
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";

    // Add sanitized text content from POST parameters
    foreach ($_POST as $key => $value) {
        $key = filter_var($key, FILTER_SANITIZE_STRING);
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        $body .= "$key:\r\n$value\r\n\r\n";
    }

    // Process file uploads
    foreach ($_FILES as $fileKey => $file) {
      $filename = filter_var($file['name'], FILTER_SANITIZE_STRING);
      $fileContent = chunk_split(base64_encode(file_get_contents($file['tmp_name'])));
      $body .= "--$boundary\r\n";
      $body .= "Content-Type: application/octet-stream\r\n";
      $body .= "Content-Disposition: attachment; filename=\"$filename\"\r\n";
      $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
      $body .= $fileContent . "\r\n";
    }

    // Close email body
    $body .= "--$boundary--\r\n";

    // Send email
    if (mail($toEmail, $subject, $body, $headers)) {
      header("Location: /send?result=ok");
      exit();
    } else {
      header("Location: /send?result=error");
      exit();
    }
} else {
    echo 'Invalid request method.';
}
?>
