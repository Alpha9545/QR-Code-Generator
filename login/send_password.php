<?php
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!$conn) {
        die("Database connection failed: " . $conn->connect_error);
    }

    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // Check if email exists
    $stmt = $conn->prepare("SELECT name, password FROM reg WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($name, $password);
        $stmt->fetch();

        // Email details
        $to = $email;
        $subject = "Your Password Recovery";
        $message = "Hello $name,\n\nYour password is: $password\n\nPlease keep it secure.";
        $headers = "From: no-reply@yourdomain.com\r\n";
        $headers .= "Reply-To: no-reply@yourdomain.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            header("Location: login.php?msg=success");
            exit;
        } else {
            header("Location: forgot_password.php?msg=email_failed");
            exit;
        }
    } else {
        header("Location: forgot_password.php?msg=email_not_found");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>
