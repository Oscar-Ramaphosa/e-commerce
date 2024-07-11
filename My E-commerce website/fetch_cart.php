
<?php
session_start();

// Ensuring that the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Database connection,
include_once 'db_connection.php';

$user_id = $_SESSION['id'];

//select products from the addcartproduct table using the id of the user that is logged in
$sql = "SELECT name, price FROM addcartproducts WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

//creating a table for the cart page and inserting the values from what we have selected
if ($result->num_rows > 0) {
    echo "<h1>Your Cart</h1>";
    echo "<table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
            </tr>";
    //get the total price
    $TotalPrice = 0;
    while ($row = $result->fetch_assoc()) {
        $TotalPrice += $row['price'];
        echo "<tr>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>R" . number_format($row['price'], 2) . "</td>
              </tr>";
    }

    echo "<tr>
            <td class='total'>Grand Total</td>
            <td class='total'>R" . number_format($TotalPrice, 2) . "</td>
          </tr>";
    echo "</table>";
} else {
    echo "<h1>Your Cart</h1>";
    //show this message if the cart is empty
    echo "<p>Your cart is empty.</p>";
}

$stmt->close();
$conn->close();
?>
