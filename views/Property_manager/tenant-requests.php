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
    
          <!-- Tenant Rental Requests Review -->
      <section>
        <h3>Tenant Rental Requests</h3>
        <table class="user-table" id="tenantRequestsTable">
          <thead>
            <tr>
              <th>Tenant</th>
              <th>House</th>
              <th>Request Date</th>
              <th>Owner Approval</th>
              <th>Manager Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Doe</td>
              <td>Modern Villa</td>
              <td>2025-05-20</td>
              <td><span class="status inactive">Waiting</span></td>
              <td><span class="status inactive">Pending</span></td>
              <td>
                <button class="btn send-to-owner">Send to Owner</button>
                <button class="btn approve-tenant">Approve</button>
                <button class="btn decline-tenant">Decline</button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>

    </div>
</div>
  <script src="../../assets/main.js">
  </script>
</body>
</html>