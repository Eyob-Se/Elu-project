<?php include '../../config/auth_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    
          <!-- Top Bar Search -->
      <div class="top-bar">
        <input type="text" id="notificationFilter" placeholder="🔍 Filter notifications" />
      </div>

      <!-- Notifications Section -->
      <section>
        <h3>Notifications</h3>
        <table class="user-table" id="notificationTable">
          <thead>
            <tr>
              <th>From</th>
              <th>Type</th>
              <th>Message</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Example Notification -->
            <tr>
              <td>Tenant: John Doe</td>
              <td>Rental Request</td>
              <td>Request to rent "Modern Villa"</td>
              <td>2025-05-20</td>
              <td><span class="status active">Pending</span></td>
              <td>
                <button class="btn approve-request">Approve</button>
                <button class="btn decline-request">Decline</button>
              </td>
            </tr>
            <!-- More notifications dynamically loaded -->
          </tbody>
        </table>
      </section>
    </div>
</div>
  <script src="../../assets/main.js">
  </script>
</body>
</html>