<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "qr");

if ($conn->connect_error) {
    die("❌ Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Fetch user from database
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["user_email"] = $email; // Store session
    
        echo "<script>
                alert('Login Successful! .');
                window.location.href = 'admin_panel.php';
              </script>";
        exit();
    }
    else {
        echo "<script>
                alert('❌ Invalid email or password! .');
                window.location.href = 'login.php';
              </script>";
    }
}

$conn->close();
?>
