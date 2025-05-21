<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Owner Dashboard</title>
  <link rel="stylesheet" href="../assets/style1.css" />
  <link rel="stylesheet" href="../assets/fonts/all.css">
</head>
<body>
<div class="prop_con">

<div class="navbar prop_nav">
            <p>Rental.</p>
            <button>
                <a href="login_page.php">Login</a>
            </button>
        </div>

<div class="container">
  <h2>Welcome, Owner</h2>
  <p>Manage your property listings</p>

  <div class="top-bar">
    <input type="text" id="filterInput" placeholder="🔍 Filter by location, price, etc.">
    <button class="btn" id="openFormBtn">+ Upload New House</button>
            <button class="btn" type="button" onclick="window.location.href='../controllers/logout.php'">Logout</button>
  </div>

  <!-- House Upload Form -->
  <div class="modal" id="houseFormModal">
    <div class="modal-content">
      <span class="close" id="closeFormBtn">&times;</span>
      <h3>Upload House</h3>
<form id="houseForm" method="POST" enctype="multipart/form-data" action="../controllers/house_upload.php">
  <label>Title</label>
  <input type="text" name="title" placeholder="House Title" required />

  <label>Location</label>
  <input type="text" name="address" placeholder="City, Area" required />

  <label>Price</label>
  <input type="number" name="price" placeholder="Monthly Rent" required />

  <label>Bedrooms</label>
  <input type="number" name="bedrooms" placeholder="e.g., 2" required />

  <label>Description</label>
  <textarea name="description" placeholder="Brief Description" rows="3" required></textarea>

  <label>Upload Image</label>
  <input type="file" name="photos[]" multiple accept="image/*" required />

  <button type="submit">Submit</button>
</form>
    </div>
  </div>

  <!-- Uploaded Houses -->
  <h3>Your Houses</h3>
  <table class="user-table" id="uploadedTable">
    <thead>
      <tr>
        <th>Title</th>
        <th>Location</th>
        <th>Price</th>
        <th>Bedrooms</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- Dynamically populated -->
      <tr>
        <td>Modern Villa</td>
        <td>Addis Ababa, Bole</td>
        <td>$1500</td>
        <td>3</td>
        <td><span class="status active">Available</span></td>
        <td class="actions">
          <i class="fas fa-edit edit"></i>
          <i class="fas fa-trash delete"></i>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- Rented Houses -->
  <h3>Rented Houses</h3>
  <table class="user-table" id="rentedTable">
    <thead>
      <tr>
        <th>Title</th>
        <th>Location</th>
        <th>Tenant</th>
        <th>Price</th>
        <th>Start Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <!-- Dynamically populated -->
      <tr>
        <td>Sunset Apartment</td>
        <td>Piassa, Addis Ababa</td>
        <td>Jane Doe</td>
        <td>$1200</td>
        <td>2025-05-01</td>
        <td><span class="status inactive">Rented</span></td>
      </tr>
    </tbody>
  </table>
</div>

</div>
 
<script src="../assets/main.js"></script>
</body>
</html>
