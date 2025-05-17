<?php
$back = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../index.php'; // fallback to homepage or page it was redirected from
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-page">
        <form action="POST" class="login-form">
        <h2>Login</h2>
        <div class="form-container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter your email" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>

            <button type="submit">Login</button>
            <button type="button" class="cancelbtn" onclick="window.location.href='<?php echo $back; ?>'">Cancel</button>
        </div>

        <div class="form-links">
            <a href="#">Forgot password?</a>
            <a href="register.php">Don't have an account? Register</a>
        </div>
        
    </form>
    </div>
    
</body>
</html>