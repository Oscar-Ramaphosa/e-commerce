<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - PowerGuard Emporium</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="admin.css">
</head>


<body>
    <div class="container">
        <header>
            <h1>Add New Product</h1>
        </header>
        <!--a form to add products to the table-->
        <div class="form-container">
            <form action="add_product.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" required>
                </div>
                <div class="form-group">
                    <label for="product_price">Product Price:</label>
                    <input type="number" id="product_price" name="product_price" required>
                </div>
                <div class="form-group">
                    <label for="product_image">Product Image:</label>
                    <input type="file" id="product_image" name="product_image" accept="image/*" required>
                </div>
                <button type="submit" id="addProductButton">Add Product</button>
            </form>
        </div>
    </div>
</body>

</html>

