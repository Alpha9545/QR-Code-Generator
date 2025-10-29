<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $phone = trim($_POST["phone"]);

    // Debugging: Print the received phone number
    file_put_contents("debug.txt", "Received phone: " . $phone . PHP_EOL, FILE_APPEND);

    // Ensure phone number is a string
    $phone = (string) preg_replace('/\D/', '', $phone);

    // Debugging: Print after removing non-numeric characters
    file_put_contents("debug.txt", "Processed phone: " . $phone . PHP_EOL, FILE_APPEND);

    // Validate phone number length (10-15 digits)
    if (!ctype_digit($phone) || strlen($phone) < 10 || strlen($phone) > 15) {
        echo "<script>
                alert('Phone number must be 10-15 digits.');
                window.location.href = 'index.html';
              </script>";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Invalid email format.');
                window.location.href = 'index.html';
              </script>";
        exit();
    }

    // Ensure no fields are empty
    if (empty($name) || empty($email) || empty($password) || empty($phone)) {
        echo "<script>
                alert('All fields are required.');
                window.location.href = 'index.html';
              </script>";
        exit();
    }

    // Store phone as a string
    $stmt = $conn->prepare("INSERT INTO reg (name, email, password, phone) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssss", $name, $email, $password, $phone);

    if ($stmt->execute()) {
        echo "<script>
                alert('Registration Successful! Sign in now.');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . addslashes($stmt->error) . "' );
                window.location.href = 'index.html';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
