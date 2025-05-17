<?php
$back = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../index.php'; // fallback to homepage or page redirected from
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
   <div class="register-page">
        <form action="POST" class="register-form">
        <h2>Register</h2>
        <div class="form-container">

            <label for="role"><b>Describe yourself</b></label>
                <select name="role" id="role" required>
                    <option value="tenant">Tenant</option>
                    <option value="landlord">Landlord</option>
                </select>
            </label>

            <label for ="first_name"><b>First Name</b></label>
            <input type="text" placeholder="Enter your first name" name="first_name" required>
            <label for ="last_name"><b>Last Name</b></label>
            <input type="text" placeholder="Enter your last name" name="last_name" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter your email" name="email" required>
            <label for="phone"><b>Phone</b></label>
            <input type="tel" placeholder="Enter your phone number" name="phone" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>
            <label for="confirm_password"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm your password" name="confirm_password" required>
            
            <button type="submit">Register</button>
            <button type="button" class="cancelbtn" onclick="window.location.href='../index.php'">Cancel</button>
        </div>

        <div class="form-links">
            <a href="login_page.php">Already have an account? Login</a>
        </div>
        
    </form>
   </div> 
   
</body>
</html>