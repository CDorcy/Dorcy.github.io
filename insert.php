<?php
// Database connection
$host = "localhost";
$dbname = "users";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact (fname, lname, email, message) VALUES ('$fname', '$lname', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Contact added successfully";
    } else {
        echo "Error: " . $conn->error;
    }
    

    $conn->close();
}
?>
