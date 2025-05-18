<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Management</title>
  <link rel="stylesheet" href="../assets/style1.css" />
  <link rel="stylesheet" href="../assets/fonts/all.css">
</head>
<body>
    <div class="prop_con">
        <div class="navbar prop_nav">
            <p>Rental.</p>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="available_house.php">Available house</a></li>
                <li><a href="about_us.php">About us</a></li>
            </ul>
            <button>
                <a href="login_page.php">Login</a>
            </button>
        </div>
  <div class="container">
    <h2>User Management</h2>
    <p>Manage users and their access to the system</p>

    <div class="top-bar">
      <input type="text" id="searchInput" placeholder="🔍 Search users...">
      <button class="btn" id="openModalBtn">+ Add New User</button>
    </div>

    <table class="user-table" id="userTable">
      <thead>
        <tr>
          <th>NAME</th>
          <th>USERNAME</th>
          <th>EMAIL</th>
          <th>USER TYPE</th>
          <th>STATUS</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>Admin User</strong></td>
          <td>admin</td>
          <td>admin@cors.gov.et</td>
          <td>Administrator</td>
          <td><span class="status active">Active</span></td>
          <td class="actions">
            <i class="fas fa-edit edit"></i>
            <i class="fas fa-trash delete"></i>
          </td>
        </tr>
        <tr>
          <td><strong>John Doe</strong></td>
          <td>john.doe</td>
          <td>john@example.com</td>
          <td>Standard</td>
          <td><span class="status active">Active</span></td>
          <td class="actions">
            <i class="fas fa-edit edit"></i>
            <i class="fas fa-trash delete"></i>
          </td>
        </tr>
        <tr>
          <td><strong>Jane Smith</strong></td>
          <td>jane.smith</td>
          <td>jane@example.com</td>
          <td>Standard</td>
          <td><span class="status inactive">Inactive</span></td>
          <td class="actions">
            <i class="fas fa-edit edit"></i>
            <i class="fas fa-trash delete"></i>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div class="modal" id="userModal">
    <div class="modal-content">
      <span class="close" id="closeModal">&times;</span>
      <h3>Add New User</h3>
      <label>Name</label>
      <input type="text" placeholder="Full Name">
      <label>Username</label>
      <input type="text" placeholder="Username">
      <label>Email</label>
      <input type="email" placeholder="Email">
      <label>User Type</label>
      <select>
        <option>Administrator</option>
        <option>Standard</option>
      </select>
      <label>Status</label>
      <select>
        <option>Active</option>
        <option>Inactive</option>
      </select>
      <button>Add User</button>
    </div>  
</div>
            <div class="footer">
      <div class="footer-container">
        
        <div class="footer-top">
          <p>&copy; 2025 Rental System. All rights reserved.</p>
          
          <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms</a>
            <a href="#">Contact</a>
          </div>
        </div>
    
        <div class="footer-social">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-x-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
    
        <div class="footer-newsletter">
          <form action="#" method="post">
            <input type="email" placeholder="Your email address" required>
            <button type="submit"><i class="fa fa-paper-plane"></i> Subscribe</button>
          </form>
        </div>
        
      </div>

  <script src="../assets/main.js"></script>

</body>
</html>