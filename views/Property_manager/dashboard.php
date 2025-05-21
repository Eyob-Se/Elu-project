<?php include '../../config/auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Property Manager Dashboard</title>
  <link rel="stylesheet" href="../../assets/style1.css" />
  <link rel="stylesheet" href="../assets/fonts/all.css" />
</head>
<body>
  <div class="prop_con">

    <div class="navbar prop_nav">
      <p>Rental.</p>
       <ul>
                <li><a href="notifications.php">Notifications</a></li>
                <li><a href="tenant-requests.php">Requests</a></li>
                <li><a href="house-approvals.php">Approvals</a></li>
                <li><a href="lease-agreements.php">Agreements</a></li>
                <li><a href="transactions-reports.php">Transactions</a></li>
            </ul>
            <button class="btn" type="button" onclick="window.location.href='../../controllers/logout.php'">Logout</button>
    </div>

    <div class="container">
      <h2>Welcome, Property Manager</h2>
      <p>Manage house approvals, tenant requests, reports & notifications</p>

    </div>
  </div>

  <script src="../../assets/main.js">
  </script>
</body>
</html>
