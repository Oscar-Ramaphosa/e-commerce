<?php
include_once 'db_connection.php';

// Fetching products from the database
$sql = "SELECT id, name, price FROM Products";
$result = $conn->query($sql);
?>
