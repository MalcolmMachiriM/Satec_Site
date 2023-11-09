<?php
// Replace these values with your actual database credentials
$servername = "satecoxb_Satec";
$username = "satecoxb_admin01";
$password = "t!n@shem";
$dbname = "satecoxb_Satec";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstname = test_input($_POST["firstname"]);
    $phonenumber = test_input($_POST["phonenumber"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO ContactForm (Name, Phonenumber, Email, Message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $phonenumber, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Send a success response
        echo "success";
    } else {
        // Send an error response
        echo "error";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If someone tries to access this file directly, handle accordingly
    echo "Direct access not allowed";
}

// Function to sanitize and validate input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>