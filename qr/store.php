<?php
session_start();
header("Content-Type: text/plain"); 

if (!isset($_SESSION['email'])) {
    exit("Session expired. Please log in again.");
}

$email = $_SESSION['email']; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['info']) || empty($_POST['info'])) {
        exit("Invalid input.");
    }

    $info = trim($_POST['info']);

    $conn = new mysqli("localhost", "root", "", "qr");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO `user-info` (email, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $info);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error";
    }

    $stmt->close();
    $conn->close();
}
?>
