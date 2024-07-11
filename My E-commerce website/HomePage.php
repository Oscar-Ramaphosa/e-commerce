<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<!--the home page html code-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PowerGuard Emporium</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="Main.css">
    
</head>
     <!-- a class that creates a logo -->
    <header class="main-header">
        <div class="main-div-logo">
            <img src="logo.png" alt="PowerGuard">
        </div>
        <!-- class that create a menu -->
        <nav class="main-nav">
            <ul>
                <li><a href="HomePage.php">HOME</a></li>
                <li><a href="#products">PRODUCT</a></li>
                <li><a href="#about-us">ABOUT US</a></li>
                <li><a href="#contact-us">CONTACT US</a></li>
            </ul>
        </nav>    
        
        <!-- a class that create the log in and sign in buttons and the session if user logs in-->
        <div class="login">
            <?php if (isset($_SESSION['username'])): ?>
                <p>Welcome  <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
                 <a href="logout.php">Logout</a>
           <?php else: ?>
            <button id="loginBtn">Log In</button>
            <p>Don't have an account? <a href="signup.php" class="signup-link">Sign Up</a></p>
        <?php endif; ?>
        <script src="signup.js"></script>
        <script src="logInSript.js"></script>
        
        </div>
    </header>
   
    <body>
         <!-- The top message that is visible on the main page -->
        <h1> This is the right place to be!</h1>
        
        <h4>Welcome to PowerGuard Emporium, your unltimate destination for reliable 
            Unterrupted Power Supply. At PowerGuard, we understand the importance of
            keeping your electronics powered up and protected, whether it’s your home,
            office, or business. With our range of top UPS units, you can rest assured that 
            your devices stay powered. Explore our selection and experience the peace 
            of mind that comes with powerguard quality</h4>

           <!-- the class that creates the cart label and cart count-->
            <div class = "Cart">
                <img src="shopping-cart.png" alt="Cart Icon">
                <label id="cartLabel">Cart: 0</label>
                <button id="viewCartBtn">View Cart</button>
                <script src="ViewCart.js"></script> 
            </div>

            <div class="content">
                <h4>Discover the difference with PowerGuard Emporium. With our commitment to excellence and customer satisfaction,
                    we strive to provide not only superior products but also exceptional service. Our team is here 
                    to assist you every step of the way, from selecting the perfect UPS for your needs to ensuring a 
                    seamless shopping experience. Join the PowerGuard community today and never worry about 
                    power interruptions again.</h4>
            </div>

            
            <?php
                // Database connection
                include_once 'db_connection.php';

                // retrieving products from the database table
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                ?>
             <!-- defferent containers that hold the products and buttons -->
            <section id="products">
            <div class="container">
            <?php
            // list of the products that are beign retreived from the database table
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="product">
                        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
                        <h2>R<?php echo $row['price']; ?></h2>
                        <p><?php echo $row['name']; ?></p>
                        <form id="productForm<?php echo $row['id']; ?>" action="add_to_cart.php" method="post">
                            <input type="hidden" name="productName" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="productPrice" value="<?php echo $row['price']; ?>">
                            <button type="button" onclick="addToCart('productForm<?php echo $row['id']; ?>')" class="AddToCartButton">Add To Cart</button>
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
            </section>

            <script src="CartCount.js"></script>
            <div id="notificationContainer"></div>

            <!--creating the footer-->
            <footer class="main-footer">
            <div class="footer-section about-us">
                <section id="about-us">
                     <h3>About Us</h3>
                    <p>At PowerGuard Emporium, we are dedicated to providing top-quality Uninterrupted Power Supply (UPS) units
                       for all your power needs. Our mission is to ensure that your home, office, and business stay powered 
                       and protected. We believe in delivering excellence and customer satisfaction through our superior 
                       products and exceptional service. Join the PowerGuard community today and experience the peace of 
                       mind that comes with reliable power solutions.</p>
                </section> 
            </div>
        <div class="footer-section contact-us">
        <section id="contact-us"></section>
            <h3>Contact Us</h3>
            <p>Email: <a href="mailto:powerguard@emporium.co.za">powerguard@emporium.co.za</a></p>
            <p>Phone: <a href="tel:+27794396391">079 439 6391</a></p>
            <p>Address: 18 Lalapalm Street, Alveda Park, Johannesburg South</p>
        </section>    
        </div>
        
        <div class="footer-section business-hours">
            <h3>Business Hours</h3>
            <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
            <p>Saturday: 10:00 AM - 4:00 PM</p>
            <p>Sunday: Closed</p>
        </div>
        
        <div class="footer-section social-media">
            <h3>Follow Us</h3>
            <a href="#"><img src="facebook.png" alt="Facebook" class="social-icon"></a>
            <a href="#"><img src="twitter.png" alt="Twitter" class="social-icon"></a>
            <a href="#"><img src="instagram.png" alt="Instagram" class="social-icon"></a>
        </div>
    </footer>

    </footer>
    </body>
</html>