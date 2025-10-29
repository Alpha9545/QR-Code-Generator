<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        echo "<script>
            alert('Please enter email and password!');
            window.location.href = 'login.php';
        </script>";
        exit();
    }

    if (!isset($conn)) {
        die("Database connection error!");
    }

    $stmt = $conn->prepare("SELECT id, name, password FROM reg WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result(); // Store result before fetching

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $db_password);
        $stmt->fetch();

        // Check if password matches
        if ($password === $db_password) { 
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            echo "<script>
                alert('Login successful! $phone');
                window.location.href = '../qr/index.html';
            </script>";
            exit();
        } else {
            echo "<script>
                alert('Invalid password');
                window.location.href = 'index.html'; // Redirect back to login page
            </script>";
            exit();
        }
    } else {
        echo "<script>
            alert('Email not found! Sign up first.');
            window.location.href = 'index.html';
        </script>";
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
