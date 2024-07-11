<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

include_once 'db_connection.php';

$user_id = $_SESSION['id'];
$fullName = $_POST['fullName'];
$phoneNumber = $_POST['phoneNumber'];
$emailAddress = $_POST['emailAddress'];
$address = $_POST['address'];
$city = $_POST['city'];

// Insert shipping details into the shipping table
$sql_order = "INSERT INTO shipping (user_id, full_name, phoneNumber, emailAddress,address, city) VALUES (?, ?, ?, ?, ?, ?)";
$stmt_order = $conn->prepare($sql_order);
$stmt_order->bind_param("isssss", $user_id, $fullName, $phoneNumber ,$emailAddress ,$address, $city);

if ($stmt_order->execute()) {
    // Get the inserted shipping id
    $shipping_id = $stmt_order->insert_id;

    
   // Insert each cart item into the orderitems table
    $sql_items = "INSERT INTO orderitems (user_id, product_id, product_name, price) SELECT ?, id, name, price FROM addcartproducts WHERE user_id = ?";
    $stmt_items = $conn->prepare($sql_items);
    $stmt_items->bind_param("ii", $user_id, $user_id);

    if ($stmt_items->execute()) {
        // Redirect to order confirmation page
        header("Location: confirmation.php");
        exit();
    } else {
        echo "Error: " . $stmt_items->error;
    }
} else {
    echo "Error: " . $stmt_order->error;
}

$stmt_order->close();
$stmt_items->close();
$conn->close();
?>