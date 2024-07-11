<?php
// Include database connection
include_once 'db_connection.php';

// Fetching order items with user details from the database
$orderQuery = "SELECT oi.product_id, oi.product_name, oi.price, s.name AS user_name, s.surname AS user_surname
               FROM orderitems AS oi 
               INNER JOIN signup AS s ON oi.user_id = s.id";
$orderResult = mysqli_query($conn, $orderQuery);
?>
