<?php
session_start();

// Ensuring the user is logged in
if (!isset($_SESSION['id'])) {
    echo "User not logged in.";
    exit();
}

// Getting the user ID from the session
$user_id = $_SESSION['id'];

// Database connection
include_once 'db_connection.php';

// Get the total number of products in the addcartproducts table for the user who is logged in
$sql = "SELECT COUNT(*) as totalProducts FROM addcartproducts WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($totalProducts);
$stmt->fetch();
$stmt->close();

echo $totalProducts;
?>
