<?php include '../config/auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Government Report Page</title>
  <link rel="stylesheet" href="../assets/style1.css" />
</head>
<body>
  <div class="prop_con">
 
    <div class="container">
    <h2>Government Report Dashboard</h2>
    <p>Overview of reports submitted by property managers</p>

    <table class="user-table">
      <thead>
        <tr>
          <th>Manager Name</th>
          <th>Report Type</th>
          <th>Date Submitted</th>
          <th>Status</th>
          <th>View</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Property Co.</td>
          <td>Monthly Tax Summary</td>
          <td>2025-05-01</td>
          <td><span class="status active">Reviewed</span></td>
          <td><button class="btn viewReportBtn">View</button></td>
        </tr>
        <tr>
          <td>BlueSky Rentals</td>
          <td>Occupancy Report</td>
          <td>2025-05-15</td>
          <td><span class="status pending">Pending</span></td>
          <td><button class="btn viewReportBtn">View</button></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Modal for Detailed Report -->
  <div class="modal" id="reportDetailModal">
    <div class="modal-content" id="reportContent">
      <span class="close" id="closeDetailModal">&times;</span>
      <h3>Report Details</h3>
      <div class="report-details">
        <p><strong>Manager:</strong> John Property Co.</p>
        <p><strong>Report Type:</strong> Monthly Tax Summary</p>
        <p><strong>Submitted On:</strong> 2025-05-01</p>
        <hr>
        <h4>House Info</h4>
        <p><strong>Title:</strong> Sunrise Villa</p>
        <p><strong>Location:</strong> Addis Ababa, Bole</p>
        <p><strong>Price:</strong> $1,500/month</p>
        <p><strong>Bedrooms:</strong> 3</p>
        <hr>
        <h4>Tax Summary</h4>
        <p><strong>Monthly Tax:</strong> $150</p>
        <p><strong>Status:</strong> Paid</p>
        <hr>
        <h4>Transactions</h4>
        <ul>
          <li>2025-04-01: $1,500 (Rent)</li>
          <li>2025-04-15: $150 (Tax)</li>
        </ul>
      </div>
      <button class="btn" id="downloadReportBtn">Download PDF</button>
    </div>
  </div>

  </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script>
    const modal = document.getElementById("reportDetailModal");
    const closeBtn = document.getElementById("closeDetailModal");
    const viewButtons = document.querySelectorAll(".viewReportBtn");
    const downloadBtn = document.getElementById("downloadReportBtn");

    viewButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        modal.style.display = "flex";
      });
    });

    closeBtn.onclick = () => {
      modal.style.display = "none";
    };

    window.onclick = (e) => {
      if (e.target === modal) modal.style.display = "none";
    };

    // Download as PDF
    downloadBtn.addEventListener("click", () => {
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();
      doc.text("Government Report", 10, 10);
      const reportText = document.querySelector(".report-details").innerText;
      doc.text(reportText, 10, 20);
      doc.save("house_report.pdf");
    });
  </script>
</body>
</html>
