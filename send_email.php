<?php
// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $data = json_decode(file_get_contents("php://input"), true);

    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $message = htmlspecialchars($data['message']);
    $phonenumber = htmlspecialchars($data['phonenumber']);


    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(["message" => "Invalid email address."]);
        exit;
    }

    // Email parameters
    $to = "ssesay88@gmail.com"; // Replace with your email
    $subject = "New message from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message\nPhone Number: $phoneNumber";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["message" => "Email sent successfully!"]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to send email."]);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["message" => "Only POST requests are allowed."]);
}
?>
