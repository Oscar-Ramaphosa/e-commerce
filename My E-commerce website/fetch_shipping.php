<?php
// Include database connection
include_once 'db_connection.php';

// Fetching shipping information with user details from the database
$shippingQuery = "SELECT s.id, s.full_name, s.phoneNumber, s.emailAddress, s.address, s.city, su.name AS user_name, su.surname AS user_surname
                  FROM Shipping AS s
                  INNER JOIN signup AS su ON s.user_id = su.id";
$shippingResult = mysqli_query($conn, $shippingQuery);
?>
