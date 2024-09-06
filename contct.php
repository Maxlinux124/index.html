<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $firstName = htmlspecialchars(trim($_POST['firstName']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // (Optional) Validate mobile number format
    if (!preg_match('/^\d{10}$/', $mobile)) {
        echo "Invalid mobile number format";
        exit;
    }

    // Prepare the email
    $to = "your-email@example.com"; // Change to your email address
    $subject = "New Contact Form Submission";
    $body = "First Name: $firstName\n".
            "Last Name: $lastName\n".
            "Email: $email\n".
            "Mobile: $mobile\n".
            "Message: $message\n";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully";
    } else {
        echo "Message failed to send";
    }
}
?>
