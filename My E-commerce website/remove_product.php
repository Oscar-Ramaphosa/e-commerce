<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Products - Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="removeProduct.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Remove Products</h1>
        </header>
        <div class="product-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include PHP file to fetch products
                    include_once 'fetch_products.php';
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['name']}</td>
                                    <td>{$row['price']}</td>
                                    <td>
                                        <form method='post' action='remove_product_handler.php'>
                                            <input type='hidden' name='product_id' value='{$row['id']}'>
                                            <button type='submit'>Remove</button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No products found.</td></tr>";
                    }

                    // Close the connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
