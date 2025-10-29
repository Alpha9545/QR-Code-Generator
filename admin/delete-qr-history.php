<?php
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sr_no'])) {
    $sr_no = $_POST['sr_no'];

    // Delete record from database
    $sql = "DELETE FROM `user-info` WHERE `sr.no` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sr_no);

    if ($stmt->execute()) {
        echo "<script>
                alert('Record deleted successfully.');
                window.location.href = 'admin_panel.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting record.');
                window.location.href = 'history.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
