<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/ee9a1e9257.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo">DesignX</label>
            <ul>
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Feedback</a></li>
            </ul>
        </nav>
<?php
        session_start();

if(isset($_SESSION["user_id"])) {
    $PDO = require __DIR__ . "/db.php";
    $sql = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([$_SESSION["user_id"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);    
} 
?>

<?php if (isset($user)): ?>

<p>Hello <?= htmlspecialchars($user["naam"]) ?></p>
<p><a href="logout.php">Log out</a></p>

<?php else: ?>

 <p><a href="login.php">Login </a> or <a href="signup.html">Sign up</a></p>

<?php endif; ?>
        <div class="container">
            <div class="box">
                <div class="icon">01</div>  
                <div class="content">
                    <h3>Speel</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis 
                        laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                        <a class="boxbtn" href="#">Read more</a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon">02</div>  
                        <div class="content">
                            <h3>Speel</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis 
                                laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                                <a class="boxbtn" href="#">Read more</a>
                                </div>
                            </div>
                            <div class="box">
                                <div class="icon">03</div>  
                                <div class="content">
                                    <h3>Speel</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis 
                                        laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                                         <a class="boxbtn" href="#">Read more</a>
                                        </div>
                                    </div>
                                </div>

                                <footer class="footer">
                                    <div class="fcontainer">
                                        <div class="row">
                                            <div class="footer-col">
                                                <h4>company</h4>
                                                <ul>
                                                    <li><a href="#">about us</a></li>
                                                    <li><a href="#">our services</a></li>
                                                    <li><a href="#">privacy policy</a></li>
                                                    <li><a href="#">affiliate program</a></li>
                                                </ul>
                                            </div>
                                            <div class="footer-col">
                                                <h4>get help</h4>
                                                <ul>
                                                    <li><a href="#">FAQ</a></li>
                                                    <li><a href="#">shipping</a></li>
                                                    <li><a href="#">returns</a></li>
                                                    <li><a href="#">order status</a></li>
                                                    <li><a href="#">payment options</a></li>
                                                </ul>
                                            </div>
                                            <div class="footer-col">
                                                <h4>online shop</h4>
                                                <ul>
                                                    <li><a href="#">watch</a></li>
                                                    <li><a href="#">bag</a></li>
                                                    <li><a href="#">shoes</a></li>
                                                    <li><a href="#">dress</a></li>
                                                </ul>
                                            </div>
                                            <div class="footer-col">
                                                <h4>follow us</h4>
                                                <div class="social-links">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                    <p class="copyright">Made by Mohammed el Malki © 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                               </footer>
                            
    </body>
</html>