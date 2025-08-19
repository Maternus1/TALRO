<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Admin email
    $to = "info@talro.or.tz"; // replace with your email

    // Get form data
    $name = strip_tags(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $mobile = strip_tags(trim($_POST['mobile']));
    $message = trim($_POST['message']);

    // Validate required fields
    if(empty($name) || empty($email) || empty($mobile) || empty($message)){
        echo "Please fill all fields.";
        exit;
    }

    // Email subject and content
    $subject = "New Contact Form Submission from $name";
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Mobile: $mobile\n\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if(mail($to, $subject, $body, $headers)){
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong, please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
