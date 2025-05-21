<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/fonts/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
   <div class="register-page">
        <form  action="../controllers/register.php" method="POST" enctype="multipart/form-data" class="register-form">
        <h2>Register</h2>
        <div class="form-container">

<label for="role"><b>Describe yourself</b></label>
<select name="role" id="role" required>
    <option value="tenant">Tenant</option>
    <option value="owner">Owner</option> <!-- NOT landlord, backend expects 'owner' -->
</select>

<label for="full_name"><b>Full Name</b></label>
<input type="text" placeholder="Enter your full name" name="full_name" required>

<label for="email"><i class="fas fa-envelope"></i> <b>Email</b></label>
<input type="email" placeholder="Enter your email" name="email" required>

<label for="phone"><i class="fas fa-phone"></i> <b>Phone</b></label>
<input type="tel" placeholder="Enter your phone number" name="phone" required>

<label for="address"><b>Address</b></label>
<input type="text" placeholder="Enter your address" name="address" required>

<label for="password"><i class="fas fa-lock"></i> <b>Password</b></label>
<input type="password" placeholder="Enter your password" name="password" required>

<label for="confirm_password"><i class="fas fa-key"></i> <b>Confirm Password</b></label>
<input type="password" placeholder="Confirm your password" name="confirm_password" required>

<label for="id_photo"><b>Upload ID Photo</b></label>
<input type="file" name="id_photo" accept="image/*" required>

<label>
    <input type="checkbox" name="agreed_terms" required>
    I agree to the <a href="#" onclick="openTerms()">terms and conditions</a>.
</label>


<button type="submit">Register</button>
<button type="button" class="cancelbtn" onclick="window.location.href='../index.php'">Cancel</button>
        </div>

        <div class="form-links">
            <a href="login_page.php">Already have an account? Login</a>
        </div>
        
    </form>
   </div> 
   <!-- Modal -->
<div id="termsModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeTerms()">&times;</span>
    <h2>Terms and Conditions</h2>
    <p>
      <!-- Replace this with your actual terms -->
      By registering on our platform, you agree to provide valid information, comply with the rental system's policies, and respect the rights of other users...
    </p>
  </div>
</div>
</body>

<script src="../assets/main.js"></script>

</html>