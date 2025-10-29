


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    text-align: center;
  }

  h1 {
    color: #333;
    margin-bottom: 20px;
  }

  table {
    width: 100%;
    max-width: 1000px;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
  }

  th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #007BFF;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  tr:nth-child(even) {
    background-color: #f8f8f8;
  }

  tr:hover {
    background-color: #e9ecef;
  }

  .btn-danger {
    display: inline-block;
    background-color: #dc3545;
    color: white;
    padding: 12px 20px;
    text-decoration: none;
    font-size: 16px;
    border-radius: 5px;
    margin-top: 20px;
    transition: background 0.3s ease-in-out;
  }

  .btn-danger:hover {
    background-color: #c82333;
  }

  @media screen and (max-width: 768px) {
    table {
      width: 90%;
    }

    th, td {
      padding: 10px;
    }
  }
</style>

</head>
<body>
  <h1>Admin Panel</h1>

  <!-- Display User Registration Details -->
  <?php include 'fetch_users.php'; ?>

  <!-- Display QR Code History -->
  <?php include 'fetch_qr_history.php'; ?>

  <a href="logout.php" class="btn btn-danger">Logout</a>
</body>



</html>