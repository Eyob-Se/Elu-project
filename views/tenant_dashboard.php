<?php
include '../config/auth_check.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/fonts/all.css">

    <title>Available house</title>
</head>
<body>
    <div class="prop_con">
        
        <div class="navbar prop_nav">
            <p>Rental.</p>
            <ul>
                <li><a href="available_house.php">Available house</a></li>
                <li><a href="about_us.php">About us</a></li>
            </ul>
            <button class="btn" type="button" onclick="window.location.href='../controllers/logout.php'">Logout</button>
        </div>
        <div class="cards">
            <div class="card c1">
                <img src="../assets/prop_img/h1.jpg" alt="House 1">
                <h3>House 1</h3>
                <h4><i class="fas fa-location-dot"></i> City Center</h4>
                <div class="spec">
                    <p>bedroom <br><i class="fas fa-bed"></i> </i></p>
                    <p>bathroom <br><i class="fas fa-shower"></i></p>
                    <p>area <br><i class="fas fa-ruler-combined"></i></p>
                </div>
            </div>
            <div class="card c2">
                <img src="../assets/prop_img/h2.jpg" alt="House 2">
                <h3>House 2</h3>
                <h4><i class="fas fa-location-dot"></i> Suburb</h4>
                 <div class="spec">
                    <p>bedroom <br><i class="fas fa-bed"></i></p>
                    <p>bathroom <br><i class="fas fa-shower"></i></p>
                    <p>area <br><i class="fas fa-ruler-combined"></i></p>
                </div>
               
            </div>
            <div class="card c3">
                <img src="../assets/prop_img/h3.jpg" alt="House 3">
                <h3>House 3</h3>
                <h4><i class="fas fa-location-dot"></i> <i class="fas fa-location-dot"></i> Downtown</h4>
                 <div class="spec">
                    <p>bedroom <br><i class="fas fa-bed"></i></p>
                    <p>bathroom <br><i class="fas fa-shower"></i></p>
                    <p>area <br><i class="fas fa-ruler-combined"></i></p>
                </div>
               
            </div>
            <div class="card c4">
                <img src="../assets/prop_img/h4.jpg" alt="House 3">
                <h3>House 3</h3>
                <h4> <i class="fas fa-location-dot"></i> Downtown</h4>
                 <div class="spec">
                    <p>bedroom <br><i class="fas fa-bed"></i></p>
                    <p>bathroom <br><i class="fas fa-shower"></i></p>
                    <p>area <br><i class="fas fa-ruler-combined"></i></p>
                </div>
               
            </div><div class="card c5">
                <img src="../assets/prop_img/h5.jpg" alt="House 3">
                <h3>House 3</h3>
                <h4><i class="fas fa-location-dot"></i> Downtown</h4>
                 <div class="spec">
                    <p>bedroom <br><i class="fas fa-bed"></i></p>
                    <p>bathroom <br><i class="fas fa-shower"></i></p>
                    <p>area <br><i class="fas fa-ruler-combined"></i></p>
                </div>
               
            </div>
            <div class="card c6">
                <img src="../assets/prop_img/h6.jpg" alt="House 3">
                <h3>House 3</h3>
                <h4><i class="fas fa-location-dot"></i> Downtown</h4>
                 <div class="spec">
                    <p>bedroom <br><i class="fas fa-bed"></i></p>
                    <p>bathroom <br><i class="fas fa-shower"></i></p>
                    <p>area <br><i class="fas fa-ruler-combined"></i></p>
                </div>
               
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
    </div>

      </div>

        <!-- dd your content here -->
    </div>
    

</body>
</html>