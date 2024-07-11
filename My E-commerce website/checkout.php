<!DOCTYPE html>
<html lang="en">

<!--this is the checkout page-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PowerGuard Emporium</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="Main.css">
    <link rel="stylesheet" href="cart.css">
    
</head>
     <!-- a class that creates a logo -->
    <header class="main-header">
        <div class="main-div-logo">
            <img src="logo.png" alt="PowerGuard">
        </div>
        <!-- class that create a menu -->
        <nav class="main-nav">
            <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.php#products">PRODUCTS</a></li>
            <li><a href="index.php#about-us">ABOUT US</a></li>
            <li><a href="index.php#contact-us">CONTACT US</a></li>
            </ul>
        </nav>    
        <div class="login">
        </div>
    </header>

<body>
    <!--this class contaner include fetch_cart.php where the table is created-->
    <div class="cart-container">
        <?php include 'fetch_cart.php'; ?>
    </div>
    
    <!--form for user to enter shipping details-->
    <form action="place_order.php" method="post">
            <h2>Shipping Details</h2>
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required><br>

            <label for="phoneNumber">Phone Number:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" required><br>
            
            <label for="emailAddress">Email Address:</label>
            <input type="text" id="emailAddress" name="emailAddress" required><br>

            <label for="address">Home Address:</label>
            <input type="text" id="address" name="address" required><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required><br>

            <button type="submit">Place Order</button>
        </form>
    </div>
</body>
</html>