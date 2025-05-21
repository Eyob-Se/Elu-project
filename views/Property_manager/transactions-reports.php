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
    
          <!-- Transactions & Reports -->
      <section>
        <h3>Transactions & Reports</h3>
        <table class="user-table" id="transactionsTable">
          <thead>
            <tr>
              <th>Tenant</th>
              <th>House</th>
              <th>Amount Paid</th>
              <th>Tax</th>
              <th>Date</th>
              <th>Generate Report</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Doe</td>
              <td>Modern Villa</td>
              <td>$1500</td>
              <td>$150</td>
              <td>2025-05-21</td>
              <td><button class="btn generate-report">Generate</button></td>
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