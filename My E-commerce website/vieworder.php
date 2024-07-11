<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders - PowerGuard Emporium</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="viewOrder.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="header-container">
        <h1>View Orders</h1>
    </div>
    <div class="container">
        <div class="tables-container">
            <div class="order-container">
                <h2>Order Items</h2>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    // Include PHP file to fetch orders
                    include_once 'fetch_orders.php';
                    
                    // Loop through each row in the order result set and display it
                    while ($row = mysqli_fetch_assoc($orderResult)) {
                        echo "<tr>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['user_surname'] . "</td>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td>R" . $row['price'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>

            <div class="shipping-container">
                <h2>Shipping Information</h2>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Address</th>
                        <th>City</th>
                    </tr>
                    <?php
                    // Include PHP file to fetch shipping information
                    include_once 'fetch_shipping.php';
                    
                    // Loop through each row in the shipping result set and display it
                    while ($row = mysqli_fetch_assoc($shippingResult)) {
                        echo "<tr>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['user_surname'] . "</td>";
                        echo "<td>0" . $row['phoneNumber'] . "</td>";
                        echo "<td>" . $row['emailAddress'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

        <!-- Clear Order Button -->
        <div class="clear-order-container">
            <form method="post" action="clear_order.php">
                <button type="submit" class="clear-order-button">Clear Order</button>
            </form>
        </div>
    </div>
</body>
</html>
