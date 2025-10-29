<?php
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete user from database
    $sql = "DELETE FROM reg WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('User deleted successfully.');
                window.location.href = 'fetch_users.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting user.');
                window.location.href = 'fetch_users.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
