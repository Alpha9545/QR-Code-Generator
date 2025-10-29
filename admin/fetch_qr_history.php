<?php
include 'db.php'; // Include database connection

// Fetch QR code history
$sql = "SELECT * FROM `user-info`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>QR Code History</h2>";
    echo "<table border='1'>
            <tr>
                <th>Sr no</th>
                <th>Email</th>
                <th>Message</th>
                <th>Creation Date</th>
                <th>Creation Time</th>
                <th>Action</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["sr.no"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["message"] . "</td>
                <td>" . $row["created_at"] . "</td>
                <td>" . $row["created_time"] . "</td>
                <td>
                    <form method='POST' action='delete-qr-history.php' onsubmit='return confirm(\"Are you sure you want to delete this record?\");'>
                        <input type='hidden' name='sr_no' value='" . $row["sr.no"] . "'>
                        <button type='submit' style='background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;'>Delete</button>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No QR code history found.";
}

$conn->close();
?>
