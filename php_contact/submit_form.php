<?php
// Database connection details
$host = "10.30.28.15";
$dbname = "forms";
$username = "ssesay";
$password = "FormSQL88!";

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define variables and initialize with empty values
    $name_err = $email_err = $phoneNumber_err = $event_date_err = $event_type_err = $message_err = "";

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Get the form data
        $event_date = htmlspecialchars($_POST["calendar"]);
        $event_type = htmlspecialchars($_POST["event_type"]);
        $phoneNumber = htmlspecialchars($_POST["phoneNumber"]);
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);

        // Check if the form responses are empty
        // Check if event date is empty
        if(empty(trim($_POST["calendar"]))){
            $event_date_err = "Please enter the date of the event.";
        } else{
            $event_date = trim($_POST["calendar"]);
        }
        
        // Check if event_type is empty
        if(empty(trim($_POST["event_type"]))){
            $event_type_err = "Please select the event type.";
        } else{
            $event_type = trim($_POST["event_type"]);
        }
        
        // Check if name is empty
        if(empty(trim($_POST["name"]))){
            $name_err = "Please enter your name.";
        } else{
            $name = trim($_POST["name"]);
        }

        // Check if email is empty
        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter an email address.";
        } else{
            $email = trim($_POST["email"]);
        }

        // Check if phoneNumber is empty
        if(empty(trim($_POST["phoneNumber"]))){
            $phoneNumber_err = "Please enter a phoneNumber.";
        } else{
            $phoneNumber = trim($_POST["phoneNumber"]);
        }

        // Check if messages is empty
        if(empty(trim($_POST["message"]))){
            $message_err = "Please add more information about the event.";
        } else{
            $message = trim($_POST["message"]);
        }

        if (empty($event_type)){
            echo "<script>alert('Please fill out the event type field!'); window.history.back();</script>";
            exit;
        }


        // If all information is present then update database
        if(empty($event_date_err) && empty($event_type_err) && empty($name_err) && empty($email_err) && empty($phoneNumber_err) && empty($message_err) ){
         
            // Prepare the SQL query
            $sql = "INSERT INTO contact_us (event_date, event_type, name, email, phone_number, message) VALUES (:event_date, :event_type, :name, :email, :phoneNumber, :message)";
            $stmt = $pdo->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':event_date', $event_date);
            $stmt->bindParam(':event_type', $event_type);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':message', $message);


            // Execute the query
            $stmt->execute();


            // Email parameters
            $to = "day2dayeventz@gmail.com";
            $fromForm = "samuel.sesay@sbsdyn.com";
            $subject = "New Inquiry - Form Submission!";
            $body = "Event Date: $event_date\nEvent Type: $event_type\n\nName: $name\nEmail: $email\nTelephone: $phoneNumber\n\nMessage:\n$message";
            $headers = "From: $fromForm\r\n";

            // Send the email
            mail($to, $subject, $body, $headers);

            echo "<script>alert('Form submitted successfully! We will be in touch shortly!'); window.location.href = 'index.html#contactus';</script>";
            return true;

        }

    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
