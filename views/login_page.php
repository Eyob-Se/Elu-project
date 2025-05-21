<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/fonts/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-page">
        <form action="../controllers/login.php" method="POST" class="login-form">
        <h2>Login</h2>

        <?php if (isset($_GET['error'])): ?>
    <p class="error">Invalid email or password.</p>
<?php endif; ?>
          <?php if (isset($_GET['registered'])): ?>
    <p class="success">Registration successful! You can now log in.</p>
<?php endif; ?>


        <div class="form-container">
            <label for="email"><i class="fas fa-envelope"></i> <b>Email</b></label>
            <input type="email" placeholder="Enter your email" autocomplete="off" name="email" required>

            <label for="password"><i class="fas fa-lock"></i> <b>Password</b></label>
            <input type="password" placeholder="Enter your password" autocomplete="new password" name="password" required>

            <button type="submit">Login</button>
            <button type="button" class="cancelbtn" onclick="window.location.href='../index.php'">Cancel</button>
        </div>

        <div class="form-links">
            <a href="#">Forgot password?</a>
            <a href="register.php">Don't have an account? Register</a>
        </div>
        
    </form>
    </div>
    
</body>

</html>