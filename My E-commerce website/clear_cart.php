<?php
session_start();

// Ensuring that the user is logged in
if (!isset($_SESSION['id'])) {
    //show message if the user is not logged in
    echo "User not logged in.";
    exit();
}

// Getting the user ID from the session
$user_id = $_SESSION['id'];

// Database connection, this connection is created on db_connection.php
include_once 'db_connection.php';

// Deleting products from addcartproducts table for a user that is logged in
$sql_clear_cart = "DELETE FROM addcartproducts WHERE user_id = ?";
$stmt_clear_cart = $conn->prepare($sql_clear_cart);
$stmt_clear_cart->bind_param("i", $user_id);

if ($stmt_clear_cart->execute()) {
    //show message when cart is cleared
    echo "Cart cleared successfully.";
} else {
    echo "Error clearing cart: " . $stmt_clear_cart->error;
}

$stmt_clear_cart->close();
$conn->close();
?>
