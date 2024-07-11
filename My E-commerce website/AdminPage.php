<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerGuard Emporium</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Admin Dashboard</h1>
        </header>
        <div class="button-container">
            <div class="button-box">
                <p>Add product to your website</p>
                <button onclick="location.href='AddProduct.php'">Add Products</button>
            </div>
            <div class="button-box">
                <p>View and manage customer orders</p>
                <button onclick="location.href='vieworder.php'">View Orders</button>
            </div>
            <div class="button-box">
                <p>Remove products from your website</p>
                <button onclick="location.href='remove_product.php'">Remove Products</button>
            </div>
        </div>
    </div>
</body>

</html>
