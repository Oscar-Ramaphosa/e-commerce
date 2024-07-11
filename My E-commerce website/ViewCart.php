<!DOCTYPE html>
<html lang="en">


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
    <div class="cart-container">
        <?php include 'fetch_cart.php'; ?>
    </div>
    
    <div class="cart-buttons">
        <button class="btn" id="checkoutBtn">Checkout</button>
        <button class="btn" id="continueShoppingBtn">Continue Shopping</button>
        <button class="btn" id="clearCartBtn">Clear Cart</button>
    </div>

    <script src="viewCart.js"></script>
    <script src="checkout.js"></script>
    <script src="clearCart.js"></script>
    <script src="continueShopping.js"></script>
    
</body>

</html>